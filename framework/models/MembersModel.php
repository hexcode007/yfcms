<?php
class MembersModel extends BaseModel {

    protected function __construct() {
        $this->tbname = 'members';
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
        $rs = $this->getOne($sql,array('username'=>$name));
        if ($rs['password']!=$pass){
            $this->rtn['info'] = "用户名或密码错误";
            return false;
        }
        return $rs;
    }


    //根据用户Id,批量获取用户信息
    public function getMembersByIds($ids){
        $sql = "select username,truename,id,photoId from {tbname}  where id in(".implode(',', $ids).")";
        $rs =  $this->getAll($sql);

        foreach($rs as $k=>$v){
            $member[$v['id']] = $v;
        }

        return $member;
    }

}