<?php

/**
 * 用法:  Log::instance()->info('log','日志内容');
 */
interface LogHandler {

    public function write($name, $msg);
}

class FileHandler implements LogHandler {
    public $path;
    
    public function __construct($config=array()) {
        $this->path = isset($config['path']) ? $config['path'] : '';
    }

    public function write($file, $msg) {
        error_log($msg, 3, $this->path.'/'.$file . '_' . date("Ymd") . '.txt');
    }

}

class Log {

    private $handler = null;
    private $level = 15;
    private static $instance = null;

    private function __construct($handler = null) {
        $log_type = Config::get('log.type');
        $handler = $log_type . 'Handler';
        $config = Config::get('log.'.$log_type);
        if ($handler === 'Handler') {
            $this->__setHandle(new FileHandler());
        }else{
            $this->__setHandle(new $handler($config));
        }
        $level = $config['level'];
        if ($level) {
            $this->__setLevel($level);
        }
    }

    private function __clone() {
        
    }

    public static function instance() {
        if (!self::$instance instanceof self) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __setHandle($handler) {
        $this->handler = $handler;
    }

    private function __setLevel($level) {
        $this->level = $level;
    }

    public function DEBUG($file, $msg) {
        self::$instance->write(1, $file, $msg);
    }

    public function WARN($file, $msg) {
        self::$instance->write(4, $file, $msg);
    }

    public function ERROR($file, $msg) {
        $debugInfo = debug_backtrace();
        $stack = "[";
        foreach ($debugInfo as $key => $val) {
            if (array_key_exists("file", $val)) {
                $stack .= "file:" . $val["file"];
            }
            if (array_key_exists("line", $val)) {
                $stack .= ",line:" . $val["line"];
            }
            if (array_key_exists("function", $val)) {
                $stack .= ",function:" . $val["function"];
            }
        }
        $stack .= "]";
        self::$instance->write(8, $file, $stack . $msg);
    }

    public function INFO($file, $msg) {
        self::$instance->write(2, $file, $msg);
    }

    private function getLevelStr($level) {
        switch ($level) {
            case 1:
                return 'debug';
                break;
            case 2:
                return 'info';
                break;
            case 4:
                return 'warn';
                break;
            case 8:
                return 'error';
                break;
            default:
        }
    }

    protected function write($level, $file, $msg) {
        if (($level & $this->level) == $level) {
            $msg = '[' . date('Y-m-d H:i:s') . '][' . $this->getLevelStr($level) . '] ' . $msg . "\n";
            $this->handler->write($file, $msg);
        }
    }

}
