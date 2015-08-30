<?php

class BaseModel {

    private static $_instanceCache = null;
    public $db;
    public $tbname;
    public $error;

    protected function __construct() {
        $this->db = Db::getInstance();
        ;
    }

    protected static function _instance($className, $cache = true) {
        if (true == $cache) {
            if (isset(self::$_instanceCache[$className]) &&
                    is_subclass_of(self::$_instanceCache[$className], __CLASS__)) {//已经实例化过了
                return self::$_instanceCache[$className];
            } elseif (class_exists($className)) {//没有实例化而且存在这个类
                self::$_instanceCache[$className] = new $className();
                return self::$_instanceCache[$className];
            }
        } else {
            return new $className();
        }

        throw new Exception($className . 'Model类不存在.');
    }

    public function insert($data = array()) {
        return $this->db->insert($this->tbname, $data);
    }

    public function lastId() {
        return $this->db->lastId();
    }

    public function findByPk($id) {
        return $this->db->findByPk($this->tbname, $this->pk, $id);
    }

    public function deleteByPk($id) {
        return $this->db->deleteByPk($this->tbname, $this->pk, $id);
    }

    public function update($sql, $bindings = array()) {
        $sql = $this->replaceSql($sql);
        return $this->db->update($sql, $bindings);
    }

    public function delete($sql, $bindings = array()) {
        $sql = $this->replaceSql($sql);
        return $this->db->delete($sql, $bindings);
    }

    public function getOne($sql, $bindings = array()) {
        $sql = $this->replaceSql($sql);
        return $this->db->getOne($sql, $bindings);
    }
    
    public function getSingle($sql, $bindings = array()) {
        $sql = $this->replaceSql($sql);
        $rs = $this->db->getOne($sql, $bindings);
        if($rs){
            $val = array_values($rs);
            return $val[0];
        }
        return false;
    }

    public function getAll($sql, $bindings = array()) {
        $sql = $this->replaceSql($sql);
        return $this->db->getAll($sql, $bindings);
    }

    public function begin() {
        $this->db->beginTransaction();
    }

    public function rollBack() {
        $this->db->rollBack();
    }

    public function commit() {
        $this->db->commit();
    }
    
    private function replaceSql($sql){
        return str_replace('{tbname}', $this->tbname, $sql);
    }

}
