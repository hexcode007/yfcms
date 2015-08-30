<?php

/**
 * 通过PDO方式连接mysql
 */
class mysqlHandler extends db_abstract {

    public $_conf;
    public $_pdo;
    private static $_instance = array();

    /**
     * 获取表前缀信息
     */
    public function getPrefix() {
        return $this->_prefix;
    }

    /**
     * 设置pdo实例及表前缀
     */
    public function __construct($conf) {
        $this->_conf = $conf;
    }

    private function _getConnect($type) {
        try {
            if (empty($this->_conf['slave'])) {
                $this->_conf['slave'] = $this->_conf['master'];
            }

            if ($type === 'slave') {
                $key = MD5($this->_conf['slave']['database'] . $this->_conf['slave']['host'] . $this->_conf['slave']['port'] . $this->_conf['slave']['username'] . $this->_conf['slave']['password']);
                if (isset(self::$_instance[$key])) {
                    $this->_pdo = self::$_instance[$key];
                    return;
                }
                $dsn = "mysql:dbname=" . $this->_conf['slave']['database'] . ";host=" . $this->_conf['slave']['host'] . ';port=' . $this->_conf['slave']['port'];
                $username = $this->_conf['slave']['username'];
                $password = $this->_conf['slave']['password'];
            } else {
                $key = MD5($this->_conf['master']['database'] . $this->_conf['master']['host'] . $this->_conf['master']['port'] . $this->_conf['master']['username'] . $this->_conf['master']['password']);
                if (isset(self::$_instance[$key])) {
                    $this->_pdo = self::$_instance[$key];
                    return;
                }
                $dsn = "mysql:dbname=" . $this->_conf['master']['database'] . ";host=" . $this->_conf['master']['host'] . ';port=' . $this->_conf['master']['port'];
                $username = $this->_conf['master']['username'];
                $password = $this->_conf['master']['password'];
            }

            self::$_instance[$key] = new PDO($dsn, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . $this->_conf['charset']));
            $this->_pdo = self::$_instance[$key];

            $this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // 设置错误模式为exceptions异常。
            $this->_pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); //禁用预处理语句的模拟
        } catch (PDOException $e) {
            throw new Exception('连接数据库失败：' . $e->getMessage());
        }
    }

    /**
     * pdo执行语句
     */
    public function query($sql, $bindings) {
        $sql = trim($sql);
        if (stripos($sql, 'insert') !== false || stripos($sql, 'update') !== false || stripos($sql, 'delete') !== false) {
            $this->_getConnect('master');
            $do = 'write';
        } else {
            $this->_getConnect('slave');
            $do = 'read';
        }
        //file_put_contents(APPPATH.'storge/logs/query_'.Router::getUri().'.txt', $sql."\r\n",FILE_APPEND);
        if(isset($_GET['sql'])){
            echo $sql;
        }
        
        $sth = $this->_pdo->prepare($sql);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute($bindings);
        if ($do === 'read') {
            $error_info = $sth->errorInfo();
            if (!empty($error_info[2])) {
                throw new Exception('查询失败：' . $error_info[2] . '----> SQL: ' . $sql . '  Bind: ' . json_encode($bindings, JSON_UNESCAPED_UNICODE));
            }

            return $sth;
        } else {
            $error_info = $sth->errorInfo();
            if ($count = $sth->rowCount() || $error_info[0] == '00000') {
                return true;
            }

            if (!empty($error_info[2])) {
                throw new Exception('执行失败：' . $error_info[2] . '----> SQL: ' . $sql . '  Bind: ' . json_encode($bindings, JSON_UNESCAPED_UNICODE));
            }
        }
    }

    /**
     * 快速获取单条记录
     */
    public function getOne($sql, $bindings = array()) {
        return $this->query($sql, $bindings)->fetch();
    }

    /**
     * 快速获取多条记录
     */
    public function getAll($sql, $bindings = array()) {
        return $this->query($sql, $bindings)->fetchAll();
    }

    /**
     * 删除记录
     */
    public function delete($sql, $bindings = array()) {
        return $this->query($sql, $bindings);
    }

    /**
     * 修改记录
     */
    public function update($sql, $bindings = array()) {
        return $this->query($sql, $bindings);
    }

    public function deleteByPk($tbname, $pk, $id = "") {
        if (!empty($id)) {
            $sql = "DELETE FROM " . $tbname . " WHERE " . $pk . "= :" . $pk . " LIMIT 1";
            return $this->query($sql, array($pk => $id));
        }
    }

    public function findByPk($tbname, $pk, $id = "") {
        if (!empty($id)) {
            $sql = "SELECT * FROM " . $tbname . " WHERE " . $pk . "= :" . $pk . " LIMIT 1";
            return $this->getOne($sql, array($pk => $id));
        }
    }

    /**
     * 添加记录
     */
    public function insert($tbname, $bindings) {
        if (is_array($bindings)) {
            $sql = "insert into {$tbname} ";
            foreach ($bindings as $k => $v) {
                $item[] = $k;
                $bind[] = ":" . $k;
            }
            $sql .= '(' . implode(',', $item) . ') values (' . implode(',', $bind) . ')';
            return $this->query($sql, $bindings);
        }
        return false;
    }

    /**
     * 获取最后插入的ID
     */
    public function lastId() {
        $this->_getConnect('master');
        return $this->_pdo->lastInsertId();
    }

    /**
     * 开启事务
     */
    public function beginTransaction() {
        $this->_getConnect('master');
        return $this->_pdo->beginTransaction();
    }

    /**
     * 提交事务
     */
    public function commit() {
        $this->_getConnect('master');
        return $this->_pdo->commit();
    }

    /**
     * 回滚事务
     */
    public function rollBack() {
        $this->_getConnect('master');
        return $this->_pdo->rollBack();
    }

    function __destruct() {
        foreach (self::$_instance as &$value) {
            $value = null;
        }
        $this->_pdo = null;
    }

}
