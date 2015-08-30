<?php

/**
 * 全局类自动加载器
 */
class AutoLoader {

    /**
     * 载入composer自动加载文件
     */
    public static function init() {
        require_once(__DIR__ . '/vendor/autoload.php');
    }

}
