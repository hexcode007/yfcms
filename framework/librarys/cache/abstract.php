<?php

abstract class cache_abstract {

    abstract public function __construct($conf);

    abstract public function get($key);

    abstract public function set($key, $data, $life = 0);

    abstract public function update($key, $data);

    abstract public function delete($key);
}

?>