<?php

class BaseService {

    private static $_instanceCache = null;
    public $error='';

    protected static function _instance($className, $cache = true) {
        if (true == $cache) {
            if (isset(self::$_instanceCache[$className]) &&
                    is_subclass_of(self::$_instanceCache[$className], __CLASS__)) {//�Ѿ�ʵ��������
                return self::$_instanceCache[$className];
            } elseif (class_exists($className)) {//û��ʵ�������Ҵ��������
                self::$_instanceCache[$className] = new $className();
                return self::$_instanceCache[$className];
            }
        } else {
            return new $className();
        }

        throw new Exception($className . 'Service�಻����.');
    }
    
    /**
     * �ļ��ϴ�
     * @param  [type] $file_info $_FILES['uploadId']
     * @param  array  $config  
     *         example
     *         $config = array(
     *              'max_size' => 20,           //��λK 
     *              'max_width' => 100,         //ͼƬʱ����Ч
     *              'max_height' => 100,        //ͼƬʱ����Ч
     *              'allowed_types' => "jpg|png|gif|jpeg|bmp",  //��׺��
     *              'upload_path' => "/store/upload/",          //�ϴ�·��
     *              'cat_path' => "header",                     //�����ļ���
     *         );
     * @return [type]            [description]
     */
    public function upload($file_info,$config=array()){
        $upload = Upload::instance();
        $file = $upload->doUpload($file_info);
        if ($upload->getError() != '') {
            $this->setError($upload->getError());
            Log::instance()->info('upload', $upload->getError());
            return false;
        } 
        
        $data = array(
            "photoId" => $file['raw_name'],
            "fileMd5" => $file['file_md5'],
            "fileName" => $file['relative_path'] . $file['file_name'],
            "createTime" => time(),
        );
        if($this->mPhotos->insert($data)){
            return $data;
        }
        $this->setError("ͼƬ���ʧ��");
        return false;
    }
    
    public function __get($name) {
        if (preg_match("/^m[A-Z]$/i", substr($name, 0, 2))) {
            $model_name = substr($name, 1) . "Model";
            $this->$name = $model_name::instance();
            return $this->$name;
        } else {
            return null;
        }
    }
    
    public function setError($msg){
        $this->error = $msg;
        return true;
    }
    
    public function getError(){
        return  $this->error;
    }

}
