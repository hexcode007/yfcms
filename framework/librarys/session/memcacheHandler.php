<?php

/**
 * Redis存储session
 */
class Session_RedisHandler extends Session_Handler {

    private $_cache_key_prefix = 'session:';
    private $_redis_handler;

    public function __construct($config) {
        $redis_config = array(
            'tcp' => $config->redis->tcp,
            'host' => $config->redis->host,
            'port' => $config->redis->port,
            'database' => $config->redis->database,
        );

        $this->_redis_handler = Cache::getInstance($redis_config);

        //session前缀
        if (isset($config->redis->cache_key_prefix)) {
            $this->_cache_key_prefix = $config->redis->cache_key_prefix;
        }

        parent::__construct();
    }

    /**
     * 是否使用自定义函数
     */
    public function getUseCustomStorage() {
        return true;
    }

    private function calculateKey($id) {
        return $this->_cache_key_prefix . $id;
    }

    public function readSession($id) {
        $data = $this->_redis_handler->get($this->calculateKey($id));
        return $data === false ? '' : $data;
    }

    public function writeSession($id, $data) {
        try {
            $this->_redis_handler->setex($this->calculateKey($id), $this->getTimeout(), $data);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function destroySession($id) {
        try {
            $this->_redis_handler->delete($this->calculateKey($id));
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

}
