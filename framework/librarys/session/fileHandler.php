<?php

/**
 * Redis存储session
 */
class Session_FileHandler extends Session_Handler {

    public function __construct($config) {
        parent::__construct();
    }

    /**
     * 是否使用自定义函数
     */
    public function getUseCustomStorage() {
        return false;
    }

}
