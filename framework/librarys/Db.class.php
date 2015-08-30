<?php

/**
 * 数据库操作类
 */
class Db {

    private static $_instance;

    /**
     * 获取DB实例
     *
     */
    public static function getInstance() {
        $db_type = Config::get('db.type');
        if (!isset(self::$_instance[$db_type])) {
            //获取当前db使用方式
            $handler = $db_type . 'Handler';
            require 'db/' . $handler . '.php';
            self::$_instance[$db_type] = new $handler(Config::get('db.' . $db_type));
        }

        return self::$_instance[$db_type];
    }

}
