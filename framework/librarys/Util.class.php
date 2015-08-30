<?php

class Util {

    /**
     * 打印功能
     */
    public static function P($var, $dump = false) {
        $color_bg = "RGB(" . rand(100, 255) . "," . rand(100, 255) . "," . rand(100, 255) . ")";
        echo "<pre style='font-size:13px;padding:5px;border-bottom:2px solid #0066cc;font-family:Trebuchet MS,Verdana,Helvetica,Arial,sans-serif !important;color:black;line-height:130%;text-align:left;background-color:{ $color_bg }'>";
        if (!$dump)
            print_r($var);
        else
            var_dump($var);
        echo "</pre>";
    }
    
    /**
     * 下划线形式转驼峰
     */
    public static function toCamelName($name){
        if (strpos($name,'_')===false) {
            return $name;
        }
        
        $camels = explode('_', $name);
        foreach ($camels as $k=>$v) {
            if (strlen($v) == 0) {
                continue;
            } else {
                $camels[$k] = ucfirst($v);
            }
        }
        return lcfirst(implode('', $camels));
    }

    /**
     * 创建目录
     */
    public static function mkpath($path, $mode = 0777) {
        umask(0);
        $path = str_replace("\\", "|", $path);
        $path = str_replace("/", "|", $path);
        $path = str_replace("||", "|", $path);
        $dirs = explode("|", $path);
        $path = $dirs[0];
        $is_ok = true;
        for ($i = 1; $i < count($dirs); $i++) {
            $path .= "/" . $dirs[$i];
            if (@!is_dir($path)) {
                if (@!mkdir($path, $mode)) {
                    $is_ok = false;
                }
            }
        }
        if ($is_ok) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 格式化JSON字符串
     *
     * @param Mixed $value
     * @return String
     */
    public static function prettyJsonEncode($value) {
        $tab = "  ";
        $new_json = "";
        $indent_level = 0;
        $in_string = false;

        $json = json_encode($value);
        $len = strlen($json);

        for ($c = 0; $c < $len; $c++) {
            $char = $json[$c];
            switch ($char) {
                case '{' :
                case '[' :
                    if (!$in_string) {
                        $new_json .= $char . "\n" . str_repeat($tab, $indent_level + 1);
                        $indent_level++;
                    } else {
                        $new_json .= $char;
                    }
                    break;
                case '}' :
                case ']' :
                    if (!$in_string) {
                        $indent_level--;
                        $new_json .= "\n" . str_repeat($tab, $indent_level) . $char;
                    } else {
                        $new_json .= $char;
                    }
                    break;
                case ',' :
                    if (!$in_string) {
                        $new_json .= ",\n" . str_repeat($tab, $indent_level);
                    } else {
                        $new_json .= $char;
                    }
                    break;
                case ':' :
                    if (!$in_string) {
                        $new_json .= ": ";
                    } else {
                        $new_json .= $char;
                    }
                    break;
                case '"' :
                    if ($c > 0 && $json[$c - 1] != '\\') {
                        $in_string = !$in_string;
                    }
                default :
                    $new_json .= $char;
                    break;
            }
        }

        return $new_json;
    }

    /**
     * 编码转换 GBK 转 UTF8
     * @param mix(string array) $str
     * @return mix
     */
    public static function gbkToutf8($str) {
        if (is_array($str) && $str) {
            foreach ($str as $_k => $_v) {
                if (is_array($_v)) {
                    $str[$_k] = self::gbkToutf8($_v);
                } else {
                    $str[$_k] = @iconv('GB18030', 'UTF-8', $_v);
                }
            }
        } else {
            $str = @iconv('GB18030', 'UTF-8', $str);
        }
        return $str;
    }

    /**
     * 编码转换 UTF8 转  GBK
     * @param mix(string array) $str
     * @return mix
     */
    public static function utf8Togbk($str) {
        if (is_array($str) && $str) {
            foreach ($str as $_k => $_v) {
                if (is_array($_v)) {
                    $str[$_k] = self::utf8Togbk($_v);
                } else {
                    $str[$_k] = @iconv('UTF-8', 'GB18030', $_v);
                }
            }
        } else {
            $str = @iconv('UTF-8', 'GB18030', $str);
        }
        return $str;
    }

    /**
     * 字符串过滤,防止XSS漏洞
     */
    public static function escStr($params) {
        if (is_array($params) && $params) {
            foreach ($params as $_k => $_v) {
                if (is_array($_v)) {
                    $params[$_k] = self::escStr($_v);
                } else {
                    $params[$_k] = htmlspecialchars(strip_tags($_v));
                }
            }
        } else if (is_string($params) && $params) {
            $params = htmlspecialchars(strip_tags($params));
        }
        return $params;
    }

    /**
     * 模仿JS的alert功能，尽量不要使用php的header进行跳转     原alert
     * @param string $msg 抛出信息
     * @param string $location 跳转地址
     */
    public static function ShowMessage($msg = '', $location = '') {
        @header('Content-Type: text/html; charset=gbk');
        $location = trim($location);
        if (!empty($msg) && !empty($location)) {
            if ($location == "back") {
                echo"<script type=\"text/javascript\">alert(\"{$msg}\");parent.history.go(-1);</script>";
            } else {
                echo"<script type=\"text/javascript\">alert(\"{$msg}\");parent.location.href=\"{$location}\"</script>";
            }
            exit;
        }

        if (empty($msg) && !empty($location)) {
            if ($location == "back") {
                echo"<script type=\"text/javascript\">parent.history.go(-1);</script>";
            } else {
                echo"<script type=\"text/javascript\">parent.location.href=\"{$location}\"</script>";
            }
            exit;
        }

        if (!empty($msg) && empty($location)) {
            echo"<script type=\"text/javascript\">alert(\"{$msg}\")</script>";
            exit;
        }
        throw new SysException("参数错误");
        exit;
    }

    /**
     * 执行JS函数
     * @param string $strFunction 要执行的js
     */
    public static function execJs($strFunction = '') {
        @header('Content-Type: text/html; charset=utf-8');
        if (!empty($strFunction)) {
            echo "<script type=\"text/javascript\">" . $strFunction . "</script>";
            exit;
        }
        exit;
    }

    /*
     * 对变量进行 JSON 编码(支持中文)
     *
     * @param mix $value                   待编码的 value ，除了resource 类型之外，可以为任何数据类型
     * return string                        编码成功则返回一个以 JSON 形式表示的 string
     */

    public static function jsonEncodeEx($value) {
        return json_encode(Util::gbkToutf8($value));
    }

    /*
     * 对 JSON 格式的字符串进行解码(支持中文)
     *
     * @param string $value json格式的字符串
     * @param bool $assoc(When TRUE, returned objects will be converted into associative arrays. )
     * return mix
     */

    public static function jsonDecodeEx($value, $assoc = true) {
        $value = json_decode($value, $assoc);
        return Util::utf8Togbk($value);
    }

    /**
     * 过滤字符
     *
     * @param string $subject
     * @param int $enter  $enter=0 为默认允许回车换行符,1为不允许
     * @param string $allowable_tags 允许保留的标签,如'<p><div>'
     * @return string $subject
     */
    public static function filterSubject($subject, $allowable_tags = false) {
        if (is_array($subject)) {
            foreach ($subject as $k => $v) {
                $subject[$k] = Util::filterSubject($subject[$k], $allowable_tags = false);
            }
        }
        //去除空格
        $subject = trim($subject);
        //过滤script
        $pattern = array('/<script.*\/script>/ism', '/<script[^>]*>/ism', '/<\/script>/ism');
        $subject = preg_replace($pattern, '', $subject);
        //过滤onclick
        $subject = preg_replace('/onclick\s?=[\'"]?[^\s>]*[>\s]?/ism', ' ', $subject);
        //过滤HTML
        if ($allowable_tags) {
            $subject = strip_tags($subject);
        }
        return $subject;
    }

    /**
     * 获得用户IP地址
     *
     * @return string $user_ip
     */
    public static function GetUserIP() {
        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            $user_ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else {
            $user_ip = $_SERVER["REMOTE_ADDR"];
        }
        return $user_ip;
    }

    /**
     * 获取用户的浏览器信息
     * @return 浏览器类型
     */
    public static function GetUserExplorer() {
        $os = $_SERVER['HTTP_USER_AGENT']; // 浏览者操作系统及浏览器
        if (strpos($os, 'NetCaptor'))
            $explorer = 'NetCaptor';
        elseif (strpos($os, 'Opera'))
            $explorer = 'Opera';
        elseif (strpos($os, 'Firefox'))
            $explorer = 'Firefox';
        elseif (strpos($os, 'MSIE 9'))
            $explorer = 'MSIE 9.x';
        elseif (strpos($os, 'MSIE 8'))
            $explorer = 'MSIE 8.x';
        elseif (strpos($os, 'MSIE 7'))
            $explorer = 'MSIE 7.x';
        elseif (strpos($os, 'MSIE 6'))
            $explorer = 'MSIE 6.x';
        elseif (strpos($os, 'MSIE 5'))
            $explorer = 'MSIE 5.x';
        elseif (strpos($os, 'MSIE 4'))
            $explorer = 'MSIE 4.x';
        elseif (strpos($os, 'Netscape'))
            $explorer = 'Netscape';
        else
            $explorer = 'Other';
        return $explorer;
    }

    /**
     * 获取用户的操作系统
     * @return 操作系统类型
     */
    public static function GetUserOs() {
        $os = $_SERVER['HTTP_USER_AGENT']; // 浏览者操作系统及浏览器
        // 分析操作系统
        if (strpos($os, 'Windows NT 5.0'))
            $os = 'Windows 2000';
        elseif (strpos($os, 'Windows NT 5.1'))
            $os = 'Windows XP';
        elseif (strpos($os, 'Windows NT 5.2'))
            $os = 'Windows 2003';
        elseif (strpos($os, 'Windows NT'))
            $os = 'Windows NT';
        elseif (strpos($os, 'Windows 9'))
            $os = 'Windows 98';
        elseif (strpos($os, 'unix'))
            $os = 'Unix';
        elseif (strpos($os, 'linux'))
            $os = 'Linux';
        elseif (strpos($os, 'SunOS'))
            $os = 'SunOS';
        elseif (strpos($os, 'BSD'))
            $os = 'FreeBSD';
        elseif (strpos($os, 'Mac'))
            $os = 'Mac';
        else
            $os = 'Other';
        return $os;
    }

    /**
     * 是否是有效用户名
     * @param unknown_type $str
     */
    public static function IsUsername($str) {
        $str = trim($str);
        $pattern = '/^\w{2,20}$/';
        if (preg_match($pattern, $str))
            return true;
        return false;
    }

    /**
     * 是否是有效邮箱
     * @param string $str
     * @return bool
     */
    public static function IsEmail($str) {
        $flag = false;
        $str = trim($str);
        $pattern = '/^(\d|[a-zA-Z])+(-|\.|\w)*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/';
        if (preg_match($pattern, $str)) {
            $flag = true;
        }
        return $flag;
    }

    /**
     * 是否是有效QQ
     * @param string $str
     * @return bool
     */
    public static function IsQQ($str) {
        $flag = false;
        $str = trim($str);
        $pattern = '/^[1-9][0-9]{4,12}$/';
        if (preg_match($pattern, $str)) {
            $flag = true;
        }
        return $flag;
    }

    /**
     * 是否是有效密码
     * @param string $str
     * @return bool
     */
    public static function IsPassword($str) {
        $flag = false;
        $str = trim($str);
        $pattern = '/^[\w]{6,16}$/';
        if (preg_match($pattern, $str)) {
            $flag = true;
        }
        return $flag;
    }

    /**
     * 是否是有效邮编
     *
     * @param string $str
     * @return bool
     */
    public static function IsPostalCode($str) {
        $flag = false;
        $str = trim($str);
        $pattern = '/(^[0-9]{6}$)/';
        if (preg_match($pattern, $str)) {
            $flag = true;
        }
        return $flag;
    }

    /**
     * 是否是有效电话
     *
     * @param string $str
     * @return bool
     */
    public static function IsPhone($str) {
        $flag = false;
        $str = trim($str);
        $pattern = '/(^[0-9]{3,4}\-[0-9]{3,8}$)|(^[0-9]{3,8}$)|(^\([0-9]{3,4}\)[0-9]{3,8}$)/';
        if (preg_match($pattern, $str)) {
            $flag = true;
        }
        return $flag;
    }

    /**
     * 是否是有效手机号
     *
     * @param string $str
     * @return bool
     */
    public static function IsMobile($str) {
        $flag = false;
        $str = trim($str);
        $pattern = '/(^0{0,1}1[0-9]{10}$)/';
        if (preg_match($pattern, $str)) {
            $flag = true;
        }
        return $flag;
    }

    //设置计时开始函数
    public static function TimeStart() {
        global $StartTime;
        $StartTime = microtime(true);
        echo "开始计时\n";
    }

    //设置计时结束函数
    public static function TimeEnd() {
        global $StartTime;
        $EndTime = microtime(true);
        $UseTime = $EndTime - $StartTime;
        echo "计时终止，共耗时 $UseTime 秒 [" . intval($UseTime / 3600) . "时" . intval($UseTime % 3600 / 60) . "分" . intval($UseTime % 3600 % 60 % 60) . "秒]\n";
        unset($StartTime, $EndTime, $UseTime);
    }

    /**
     * 判断并转换字符编码，需 mb_string 模块支持。
     * @param mixed $str 数据
     * @param string $encoding 要转换成的编码类型
     * @return mixed 转换过的数据
     */
    public static function encodingConvert($str, $encoding = 'UTF-8') {
        if (is_array($str)) {
            $arr = array();
            foreach ($str as $key => $val) {
                $arr[$key] = self::encodingConvert($val, $encoding);
            }

            return $arr;
        }

        $_encoding = mb_detect_encoding($str, array('ASCII', 'UTF-8', 'GB2312', 'GBK', 'BIG5'));
        if ($_encoding == $encoding) {
            return $str;
        }

        return mb_convert_encoding($str, $encoding, $_encoding);
    }

    /**
     * 截取字符串GBK
     */
    static function fbkSubstr($str, $start, $len, $replace) {
        $tmpstr = "";
        $strlen = $start + $len;
        for ($i = 0; $i < $strlen; $i++) {
            if (ord(substr($str, $i, 1)) > 0xa0) {
                $tmpstr .= substr($str, $i, 2);
                $i++;
            } else
                $tmpstr .= substr($str, $i, 1);
        }
        if (strlen($str) > $len) {
            $tmpstr .= $replace;
        }
        return $tmpstr;
    }

    /**
     * 去掉小数后面的零
     * @param unknown_type $num
     * @return float $returnNum
     */
    public static function delzero($num) {
        $num = floatval($num);
        $numArr = explode(".", $num);
        $returnNum = $numArr[0];
        if (!isset($numArr[1]))
            return $returnNum;
        $dotNum = strlen($numArr[1]) - 1;
        for ($i = $dotNum; $i >= 0; $i--) {
            if ($numArr[1][$i] > 0) {
                $returnNum .='.' . substr($numArr[1], 0, $i + 1);
                break;
            }
        }
        return floatval($returnNum);
    }

    /**
     * Excel 导出头部输出
     * @param type $filename
     */
    public static function excelHead($filename) {
        if (!$filename) {
            $filename = date("YmdHis");
        }
        header("Content-type: application/vnd.ms-excel");
        header("Content-disposition: attachment; filename=" . $filename . ".xls");
    }

    /**
     * 解析变量字符串，提取变量。
     *
     * @param string $__str__
     * @return array
     */
    public static function evalVars($__str__) {
        eval($__str__);
        $vars = get_defined_vars();
        unset($vars['__str__']);
        return $vars;
    }

    /**
     * CSV文件导入,第一行默认不处理,成功返回数组.
     * @return
     */
    public static function importCsv() {
        if (!empty($_FILES)) {
            $tempFile = $_FILES['filecsv']['tmp_name'];
            $fileTypes = array('csv'); // File extensions
            $fileParts = pathinfo($_FILES['filecsv']['name']);
            if (in_array($fileParts['extension'], $fileTypes)) {
                $handle = fopen($tempFile, "r");
                $row = 0;
                $rs = array();
                while ($data = fgetcsv($handle, 1000, ',')) {
                    $row++;
                    if ($row == 1) {
                        continue;
                    }
                    if (is_array($data)) {
                        $rs[] = $data;
                    }
                }
                fclose($handle);
                return $rs;
            } else {
                return 1;  //文件类型不正确
            }
        }
        return 2; //没有上传文件
    }

    /**
     * CSV文件转数组.
     * @return
     */
    public static function csvToArr($file) {
        $rs = array();
        if (file_exists($file)) {
            echo 123;
            $handle = fopen($file, "r");
            while ($data = fgetcsv($handle, 1000, ',')) {
                if (is_array($data)) {
                    $rs[] = $data;
                }
            }
            fclose($handle);
            return $rs;
        }

        return $rs;
    }

}
