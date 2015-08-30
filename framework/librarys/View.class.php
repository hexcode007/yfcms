<?php

class View {

    private $smarty;
    private $config;
    public static $_instance = null;

    public static function instance($config) {
        if (!is_object(self::$_instance)) {
            self::$_instance = new self($config);
        }
        return self::$_instance;
    }

    private function __construct($config) {
        require "Smarty/libs/Smarty.class.php";
        $this->smarty = new Smarty();
        $this->config = $config;
        $this->config();
    }

    public function config() {
        foreach ($this->config as $k => $v) {
            $this->smarty->{$k} = $v;
        }
    }

    public function assign($data) {
        if (is_array($data) && !empty($data)) {
            foreach ($data as $k => $v) {
                $this->smarty->assign($k, $v);
            }
        }
    }

    public function display($file = null, $data = null, $layout = null, $print = true) {
        if ($file == null)
            throw new Exception('模板文件错误');
        $file = Router::getController() . "/" . $file;
        $this->smarty->assign('main', $file . '.html');
        if (is_array($data) && !empty($data)) {
            foreach ($data as $k => $v) {
                $this->smarty->assign($k, $v);
            }
        }
        if ($layout == null) {
            $layout = 'layout/default_layout.html';
        }
        if ($print) {
            ob_start();
            $this->smarty->display($layout);
            ob_end_flush();
        } else {
            return $this->smarty->fetch($layout);
        }
    }

    public function displaySingle($file = null, $data = null, $print = true) {
        if ($file == null)
            throw new Exception('模板文件错误');
        $file = Router::getController() . "/" . $file;
        if (is_array($data)) {
            foreach ($data as $k => $v) {
                $this->smarty->assign($k, $v);
            }
        }
        if ($print) {
            ob_start();
            $this->smarty->display($file . ".html");
            ob_end_flush();
            return;
        } else {
            return $this->smarty->fetch($file . ".html");
        }
    }

}
