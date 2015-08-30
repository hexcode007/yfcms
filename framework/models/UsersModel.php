<?php
class UsersModel extends BaseModel {

    protected function __construct() {
        $this->tbname = 'users';
        $this->pk = 'id';
        parent::__construct();
    }

    /**
     * 单例对象
     * @return type
     */
    public static function instance($cache=true){
        return parent::_instance(__CLASS__,$cache);
    }

	/**
     * 登陆验证
     * @param str $email
     * @param str $pass
     * @return array
     */
    public function checkLogin($name,$pass){
        $sql = "select * from {$this->tbname} where username=:username";
        $rs = $this->db->getOne($sql,array('username'=>$name));
        if ($rs['password']!=$pass){
            $this->rtn['info'] = "用户名或密码错误";
            return false;
        }
        return $rs;
    }

    public function getUserInfoByPk($id){
        return $this->db->findByPk($id);
    }



}