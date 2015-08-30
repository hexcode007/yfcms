<?php

return array(
    'db' => array(
        'type' => 'mysql',
        'mysql' => array(
            'charset' => 'utf8',
            'master' => array(
                'host' => 'localhost',
                'username' => 'root',
                'password' => '123456',
                'database' => 'yunsaochu',
                'port' => '3306',
            ),
            'slave' => array(
                'host' => 'localhost',
                'username' => 'hexcode',
                'password' => '123456',
                'database' => 'yunsaochu',
                'port' => '3306',
            )
        )
    ),
    'view' => array(
        'type' => 'smarty',
        'smarty' => array(
            "debugging" => false,
            "caching" => false,
            "cache_lifetime" => 0,
            "template_dir" => APPPATH . "views/",
            "compile_dir" => APPPATH . "/storge/smarty/template/",
            "config_dir" => APPPATH . "/storge/smarty/configs/",
            "cache_dir" => APPPATH . "/storge/smarty/cache/",
            "left_delimiter" => "{{",
            "right_delimiter" => "}}",
            "debugging_ctrl" => 'URL', //允许动态启动smarty调试控制台,实现方式url加参数"&SMARTY_DEBUG"
            //"compile_id" => MD5($url),
            //"auto_literal" = false,
            //"plugins_dir" => "",
            //"debug_tpl" => ""
        )
    ),
    // 缓存服务器的配置，支持: memcache|ea|apc|redis，
    // 分布式部署我们建议采用以下两种方案，用来简化程序
    // 1. 局域网内多台 cache server, 本机(127.0.0.1)，写操作通过UDP同步来保持一致性（Memcached UDP组播服务，可能存在安全性问题）。
    // 2. 单台 proxy 管理多台 worker。
    'cache' => array(
        'enable' => 0,
        'type' => 'memcache',
        'memcache' => array(
            'multi' => 0,
            'host' => '127.0.0.1',
            'port' => '11211',
        )
    ),
    'log' => array(
        'type' => 'file',
        'file' => array(
            'level' => 15,  // 1:debug 2:info 4:warn 8:error
            'path' => APPPATH . "storge/logs/" 
        )
    ),
    'static_url' => '/static/',
    'app_url' => '/',
);


