<?php

/**
 * 文件缓存类,通过文件名的为key的缓存
 */
class fileHander extends cache_interface {

    public $conf = array(
        "path" => '',
    );

    public function __construct($conf) {
        $this->conf = array_merge($this->conf, $conf);
    }

    public function __get($var) {
        
    }

    public function get($key) {
        $filename = $this->conf['path'] . $key;

        if (is_file($filename)) {
            $var = file_get_contents($filename);
            $time = substr($var, 0, 19);
            if (time() > strtotime($time)) {
                return false;
            }
            return substr($var, 20);
        }
        return false;
    }

    public function set($key, $var, $life = 0) {
        $filename = $this->conf['path'] . $key;

        if (is_file($filename) && is_writable($filename)) {
            if ($life === 0) {
                $life = 86400 * 365;
            }
            $time = date("Y-m-d H:i:s", time() + $life);
            return file_put_contents($filename, $time . $var);
        }
        return false;
    }

    public function update($key, $val, $life = 0) {
        return $this->set($key, $var, $life);
    }

    public function delete($key) {
        $filename = $this->conf['path'] . $key;

        if (is_file($filename)) {
            $rs = @unlink($filename);
            return $rs;
        }
        return true;
    }

}
