<?php

abstract class db_abstract {

    abstract public function __construct($conf);

    abstract public function getOne($sql, $bindings);

    abstract public function getAll($sql, $bindings);

    abstract public function insert($tbname, $data);

    abstract public function update($sql, $bindings);

    abstract public function delete($sql, $bindings);

    abstract public function query($sql, $bindings);

    abstract public function lastId();
}
