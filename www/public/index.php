<?php

header("Content-Type: text/html; charset=utf-8");
date_default_timezone_set('Asia/Shanghai');
setlocale(LC_ALL, 'en_US.utf-8');
ini_set('session.hash_function', 1);
session_start();

version_compare(PHP_VERSION, '5.3', '<') and exit('need PHP 5.3 or newer.');

define('DEBUG', true);
define('START_TIME', microtime(TRUE));
define('START_MEMORY', memory_get_usage());

if (DEBUG === true) {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
    error_reporting(E_ALL & ~E_STRICT & ~E_NOTICE);
}


define('DOCROOT', str_replace('\\', '/', realpath(dirname(__FILE__))) . "/");
define('SYSPATH', DOCROOT . '../../framework/');
define('APPPATH', DOCROOT . '../application/');

require SYSPATH . 'librarys/Loader.class.php';

try {
    Loader::registerAutoload();
    Xhprof::start();
    Request::instance()->start()->execute();
    Xhprof::end();
} catch (Exception $e) {
    if (DEBUG === true) {
        echo "错误代码：" . $e->getCode()
        . "<br>错误信息：" . $e->getMessage()
        . '<br>文件：' . $e->getFile()
        . '<br>行号：' . $e->getLine()
        . '<br>堆栈信息：' . $e->getTraceAsString();
    } else {
        //Util::ShowMessage('', "/error.html");
    }
}
