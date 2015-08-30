<?php

/**
 * session操作类
 */
class HttpSession {

    private static $_instance;

    public static function getInstance() {
        if (null == self::$_instance) {
            //读取session配置
            $config = new Yaf_Config_Ini(APPLICATION_PATH . '/conf/session.ini', CURRENT_ENV);

            //获取当前session使用方式
            $handler_name = 'Session_' . ucfirst($config->handler->name) . 'Handler';

            self::$_instance = new $handler_name($config);
        }

        return self::$_instance;
    }

}
