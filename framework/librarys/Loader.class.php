<?php

/**
 * @abstract  自动加载文件
 * @copyright Sohu-inc Team.
 * @author    Rady (yifengcao@sohu-inc.com)
 * @date      2014-04-21 16:11:26
 * @version   Crm 1.0
 */
class Loader {

    /**
     * 自动加载类方法
     */
    public static function autoload($class, $dirs = null) {
        //检查类名,不符合要求抛出异常
        self::_checkClassname($class);

        //如果类存在就不加载,返回空
        if (class_exists($class, false) || interface_exists($class, false)) {
            return $class;
        }

        //如果文件夹不是null  字符串,返回错误
        if ((null !== $dirs) && !is_string($dirs)) {
            throw new Exception('参数错误');
        }


        if (strpos($class, 'Controller') !== false) {
            return require APPPATH . 'controllers' . '/' . $class . '.php';
        } else if (strpos($class, 'Model') !== false) {
            if (file_exists(SYSPATH . 'models' . '/' . $class . '.php'))
                return require SYSPATH . 'models' . '/' . $class . '.php';
            return require APPPATH . 'models' . '/' . $class . '.php';
        }
        else if (strpos($class, 'Service') !== false) {
            if (file_exists(SYSPATH . 'services' . '/' . $class . '.php'))
                return require SYSPATH . 'services' . '/' . $class . '.php';
            return require APPPATH . 'services' . '/' . $class . '.php';
        }


        $_file = str_replace('_', '/', $class) . ".class.php";

        if (!empty($dirs) && is_string($dirs)) {
            $_file = $dirs . $_file;
        }

        $filepath = SYSPATH . 'librarys/' . $_file;
        if (file_exists($filepath))
            return require ($filepath);
        $filepath = APPPATH . 'librarys/' . $_file;
        if (file_exists($filepath))
            return require ($filepath);

        //echo "自动加载不成功".$filepath."<br>";
    }

    /**
     * 注册自动加载,移交到autoload方法
     */
    public static function registerAutoload($class = 'Loader', $enabled = true) {
        if (!function_exists('spl_autoload_register')) {
            throw new Exception("spl_autoload_register does not exist in this PHP installation");
        }

        if ($enabled === true) {
            spl_autoload_register(array($class, 'autoload'));
        } else {
            spl_autoload_unregister(array($class, 'autoload'));
        }
    }

    /**
     * 检测自动加载的类名不能包含特殊字符
     */
    protected static function _checkClassname($filename) {
        if (preg_match('/[^a-z0-9_-]/i', $filename)) {
            throw new Exception('类名不能包含特殊字符');
        }
    }

}
