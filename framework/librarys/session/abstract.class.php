<?php

/**
 * 自定义Session存储方式
 */
abstract class session_abstract {

    protected function __construct() {
        //注册
        if ($this->getUseCustomStorage()) {
            session_set_save_handler(
                    array($this, 'openSession'), array($this, 'closeSession'), array($this, 'readSession'), array($this, 'writeSession'), array($this, 'destroySession'), array($this, 'gcSession')
            );
        }
        session_start();
        ini_set('session.gc_maxlifetime', 3600);
    }

    public function openSession($savePath, $sessionName) {
        return true;
    }

    public function closeSession() {
        return true;
    }

    public function readSession($id) {
        return '';
    }

    public function writeSession($id, $data) {
        return true;
    }

    public function destroySession($id) {
        return true;
    }

    public function gcSession($maxLifetime) {
        return true;
    }

    public function getTimeout() {
        return (int) ini_get('session.gc_maxlifetime');
    }

    public function setTimeout($value) {
        ini_set('session.gc_maxlifetime', $value);
    }

    public function getSessionID() {
        return session_id();
    }

    public function get($key, $defaultValue = null) {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : $defaultValue;
    }

    public function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public function remove($key) {
        if (isset($_SESSION[$key])) {
            $value = $_SESSION[$key];
            unset($_SESSION[$key]);
            return $value;
        } else
            return null;
    }

    public function clear() {
        foreach (array_keys($_SESSION) as $key)
            unset($_SESSION[$key]);
    }

    public function getSavePath() {
        return session_save_path();
    }

    public function setSavePath($path) {
        if (is_dir($path) && is_writable($path))
            session_save_path($path);
    }

}
