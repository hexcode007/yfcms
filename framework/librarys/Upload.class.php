<?php

class Upload {

    private static $instance = null;
    private $_error;

    public static function instance($config = array()) {
        $sys_config = Config::get("upload");
        if (is_array($sys_config)) {
            $config = array_merge($sys_config,$config);
        }
        return new self($config);
    }

    public function __construct($config = array()) {
        $defaults = array(
            //配置项
            'max_size' => 0,
            'max_width' => 0,
            'max_height' => 0,
            'allowed_types' => "jpg|png|gif|jpeg|bmp|csv",
            'upload_path' => "",
            'cat_path' => "",
            //以下是返回值
            'file_temp' => "",  //临时文件名
            'file_name' => "",  //文件全路径+重命名后的文件名
            'file_size' => "",  //文件大小
            'file_ext' => "",     //后缀名 .jpg
            'relative_path'=>'',  //相对路径
            'client_name' => '', //客户端文件名
            'raw_name' => '',    //重命名后的文件名
            'file_md5'=>'',      //filemd5
            'isImage' => false,  //是否是图片,如果是图片才存在以下返回值
            'image_width' => '', //图片宽度
            'image_height' => '',//图片高度
            'image_type' => '',  //图片类型
        );


        foreach ($defaults as $key => $val) {
            if (isset($config[$key])) {
                $method = 'set' . ucfirst(Util::toCamelName($key));
                if (method_exists($this, $method)) {
                    $this->$method($config[$key]);
                } else {
                    $this->$key = $config[$key];
                }
            } else {
                $this->$key = $val;
            }
        }
    }

    public function doUpload($file_info = array()) {
        if (empty($file_info)) {
            $this->setError('没有文件上传');
            return false;
        }

        //检查路径
        if (!$this->validateUploadPath()) {
            return false;
        }

        //按日期创建路径
        if (!$this->getRealUploadPath()) {
            return false;
        }

        if (!is_uploaded_file($file_info['tmp_name'])) {

            $error = (!isset($file_info['error'])) ? 4 : $file_info['error'];
            switch ($error) {
                case 1: // UPLOAD_ERR_INI_SIZE
                    $this->setError('上传文件太大');
                    break;
                case 2: // UPLOAD_ERR_FORM_SIZE
                    $this->setError('上传文件太大');
                    break;
                case 3: // UPLOAD_ERR_PARTIAL
                    $this->setError('文件只有部分被上传');
                    break;
                case 4: // UPLOAD_ERR_NO_FILE
                    $this->setError('没有文件上传');
                    break;
                case 6: // UPLOAD_ERR_NO_TMP_DIR
                    $this->setError('没有临时文件');
                    break;
                case 7: // UPLOAD_ERR_CANT_WRITE
                    $this->setError('不能写入文件');
                    break;
                case 8: // UPLOAD_ERR_EXTENSION
                    $this->setError('上传中断,出现异常');
                    break;
                default : $this->setError('没有文件上传');
                    break;
            }

            return false;
        }
        $this->file_temp = $file_info['tmp_name'];
        $this->file_size = $file_info['size'];
        $this->client_name = $file_info['name'];
        $this->file_ext = $this->getExtension($this->client_name);
        $this->file_name = $this->getTargetFilename();

        //检测类型
        if (!$this->isAllowedFiletype()) {
            return false;
        }

        if ($this->file_size > 0) {
            $this->file_size = round($this->file_size / 1024, 2);
        }

        //检测大小
        if (!$this->isAllowedFilesize()) {
            $this->setError('图片大小不符合要求');
            return false;
        }

        //检测宽高
        if (!$this->isAllowedDimensions()) {
            $this->setError('图片尺寸不符合规格');
            return false;
        }

        if (!@move_uploaded_file($this->file_temp, $this->upload_path . $this->file_name)) {
            $this->setError('图片转移失败');
            return false;
        }
        $this->setImageProperties($this->upload_path . $this->file_name);
        return $this->data();
    }

    private function data() {
        return array(
            'file_name' => $this->file_name,
            'file_path' => $this->upload_path,
            'relative_path'=>$this->relative_path,
            'raw_name' => str_replace($this->file_ext, '', $this->file_name),
            'client_name' => $this->client_name,
            'file_md5' => md5_file($this->upload_path.$this->file_name),
            'file_ext' => $this->file_ext,
            'file_size' => $this->file_size,
            'is_image' => $this->isImage(),
            'image_width' => $this->image_width,
            'image_height' => $this->image_height,
            'image_type' => $this->image_type,
        );
    }

    public function setError($msg) {
        $this->_error = $msg;
    }

    public function getError() {
        return $this->_error;
    }

    private function validateUploadPath() {
        if ($this->upload_path == '') {
            $this->setError('上传路径不能为空');
            return false;
        }

        if (function_exists('realpath') AND @ realpath($this->upload_path) !== false) {
            $this->upload_path = str_replace("\\", "/", realpath($this->upload_path));
        }

        if (!@is_dir($this->upload_path)) {
            $this->setError('上传路径不存在');
            return false;
        }

        if (!is_writable($this->upload_path)) {
            $this->setError('上传路径不可写');
            return false;
        }

        $this->upload_path = preg_replace("/(.+?)\/*$/", "\\1/", $this->upload_path);
        return true;
    }

    private function getRealUploadPath() {
        $path = $this->upload_path.$this->cat_path . date("Ym").'/';
        $this->relative_path = $this->cat_path . date("Ym").'/';
        if (@is_dir($path)) {
            $this->upload_path = $path;
            return true;
        }
        if (@mkdir($path, 0777)) {
            $this->upload_path = $path;
            return true;
        }
        $this->setError('上传路径不可写');
        return false;
    }

    public function isAllowedFiletype($ignore_mime = false) {
        if ($this->allowed_types == '*') {
            return true;
        }

        if (count($this->allowed_types) == 0 || !is_array($this->allowed_types)) {
            $this->setError('不支持任何上传类型');
            return false;
        }

        if (!$this->file_ext) {
            $this->setError('文件后缀名不正确');
            return false;
        }
        $ext = strtolower(ltrim($this->file_ext, '.'));

        if (!in_array($ext, $this->allowed_types)) {
            $this->setError('文件后缀不支持');
            return false;
        }

        // Images get some additional checks
        $image_types = array('gif', 'jpg', 'jpeg', 'png', 'jpe');

        if (in_array($ext, $image_types)) {
            if (getimagesize($this->file_temp) === false) {
                $this->setError('图片信息不正确');
                return false;
            }
        }

        if($ignore_mime==true){
            //检测mime信息,暂无实现
        }
        return true;
    }

    //检测文件大小
    private function isAllowedFilesize() {
        if ($this->max_size != 0 AND $this->file_size > $this->max_size) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    //检测文件尺寸
    private function isAllowedDimensions() {
        if (!$this->isImage()) {
            return true;
        }
        if (function_exists('getimagesize')) {
            $D = @getimagesize($this->file_temp);
            if ($this->max_width > 0 AND $D['0'] > $this->max_width) {
                return false;
            }
            if ($this->max_height > 0 AND $D['1'] > $this->max_height) {
                return false;
            }
            return true;
        }
        return true;
    }

    //生成随机文件名
    private function getTargetFilename() {
        return (microtime(true) * 10000) . $this->file_ext;
    }

    //获取文件后缀
    private function getExtension($filename) {
        if (strpos($filename, '.') !== false) {
            $x = explode('.', $filename);
            return '.' . end($x);
        }
        return false;
    }

    //设置限制的文件类型
    private function setAllowedTypes($types) {
        if (!is_array($types) && $types == '*') {
            $this->allowed_types = '*';
            return;
        }
        $this->allowed_types = explode('|', $types);
    }

    //检查是否是图片
    private function isImage() {
        $filename = $this->upload_path . $this->file_name;
        $types = '.gif|.jpeg|.png|.bmp';//定义检查的图片类型
        if(file_exists($filename)){
            $info = getimagesize($filename);
            $ext = image_type_to_extension($info['2']);
            return (bool)stripos($types,$ext);
        }
        return false;
    }

    //如果是图片,设置图片的额外信息(长,宽,类型)
    public function setImageProperties($path = '') {
        if (!$this->isImage()) {
            return;
        }

        if (function_exists('getimagesize')) {
            if (false !== ($D = @getimagesize($path))) {
                $types = array(1 => 'gif', 2 => 'jpeg', 3 => 'png');

                $this->image_width = $D['0'];
                $this->image_height = $D['1'];
                $this->image_type = (!isset($types[$D['2']])) ? 'unknown' : $types[$D['2']];
            }
        }
    }

}
