<?php

class MembersService extends BaseService {

    /**
     * 单例对象
     * @return type
     */
    public static function instance($cache = true) {
        return parent::_instance(__CLASS__, $cache);
    }

    /**
     * 获取活跃用户列表
     * @return [type] [description]
     */
    public function getTopList(){
        $members = $this->mMembers->getAll("select id,truename,username,totalScore,photoId from {tbname} order by totalScore desc limit 6"); 
        foreach($members as $k=>$m){
            $members[$k]['photo'] = $this->mPhotos->getPhotoPath($m['photoId']);
            $members[$k]['push_count'] = $this->mPushFile->getSingle("select count(0) from {tbname} where memberId='{$m['id']}'");
            $members[$k]['report_count'] = $this->mReportDomains->getSingle("select count(0) from {tbname} where memberId='{$m['id']}'");;
        }
        return $members;
    }
    
    /**
     * 获取最新注册的用户列表
     * @return [type] [description]
     */
    public function getNewList(){
        $members = $this->mMembers->getAll("select id,truename,username,totalScore,photoId from {tbname} order by id desc limit 12");
        foreach($members as $k=>$m){
            $members[$k]['photo'] = $this->mPhotos->getPhotoPath($m['photoId']);
        }
        return $members;
    }

    /**
     * 用户注册
     * @return [type] [description]
     */
    public function memberReg($params){
        $data = array(
            "username" => $params['username'],
            "password" => md5(md5($params['password'])),
            "mobile" => $params['mobile'],
            "email" => $params['email'],
            "qq" => $params['qq'],
            "weixin" => $params['weixin'],
            "companyName" => $params['companyName'],
            "productCatId" => $params['productCat'],
            "productCatId2" => $params['productCat2'],
            "defineCatName" => $params['defineCatName'],
            "createTime" => time()
        );

        $count = $this->mMembers->getSingle("select count(*)  from {$this->mMembers->tbname} where username=:username", array("username" => $params['username']));

        if ($count > 0) {
            $this->setError("用户名已经存在");
            return false;
        }

        return $this->mMembers->insert($data);
    }

    /**
     * 用户是否注册
     * @return [type] [description]
     */
    public function isExistMemberUsername($username){
        $count = $this->mMembers->getSingle("select count(*)  from {tbname} where username=:username", array("username" => $username));

        if ($count > 0) {
            return false;
        }
        return true;
    }

    public function memberLogin($params){
        $rs = $this->mMembers->getOne("select * from {tbname} where username=:username", array("username" => $params['username']));
        if ($rs) {
            if ($rs['password'] != $params['password']) {
                $this->setError('用户名或密码错误');
                return false;
            }
            if ($rs['status'] != 1) {
                $this->setError('用户已被禁用');
                return false;
            }
            $rslog = $this->mMemberLogs->getOne("select * from {tbname} where memberId={$rs['id']} order by createTime desc");
            $_SESSION['member_info'] = array(
                'id' => $rs['id'],
                'username' => $rs['username'],
                'truename' => $rs['truename'],
                'mobile' => $rs['mobile'],
                'email' => $rs['email'],
                'weixin' => $rs['weixin'],
                'photoId' => $rs['photoId'],
                'companyName' => $rs['companyName'],
                'productCatId' => $rs['productCatId'],
                'productCatId2' => $rs['productCatId2'],
                'defineCatName' => $rs['defineCatName'],
                'totalScore' => $rs['totalScore'],
                'lastTime' => $rslog ? date("Y-m-d H:i:s",$rslog['createTime']) : '',
            );
            $data = array(
                'memberId' => $rs['id'],
                'ip' => $_SERVER['REMOTE_ADDR'],
                'city' => '',
                'createTime' => time(),
            );
            $this->mMemberLogs->insert($data);
            return  true;
        }
        $this->setError('用户名或密码错误');
        return false;
    }

    public function getCountAllMember(){
        $sql = "select count(*) from {tbname} ";
        return $this->mMembers->getSingle($sql);
    }

    public function getSearchList($where=array(),$offset=0,$size=10){
        $white_list = array('productCatId','productCatId2');
        $where = DBHelp::getWhiteItem($where,$white_list); 
        $condition = DBHelp::buildWhere($where);
        $sql = "select * from {tbname} where $condition limit {$offset},{$size}";
        $rs =  $this->mMembers->getAll($sql,$where);
        return $rs;
    }

    public function getSearchCount($where=array()){
        $white_list = array('productCatId','productCatId2');
        $where = DBHelp::getWhiteItem($where,$white_list); 
        $condition = DBHelp::buildWhere($where);
        $sql = "select count(0) from {tbname} where $condition ";
        return $this->mMembers->getSingle($sql,$where);
    }

    public function getMemberInfoByPk($id){
        $data = $this->mMembers->findByPk($id);
        $data['photo'] = $this->mPhotos->getPhotoPath($data['photoId']);
        return $data;
    }

    public function EditSave($member_id,$params) {
        $white_list = array('truename','qq','weixin','mobile','email','companyName','productCatId','productCatId2','status','reason','defineCatName','totalScore');
        $params = DBHelp::getWhiteItem($params,$white_list);
        return $this->mMembers->update("update {$this->mMembers->tbname} set" . DBHelpbuildUpData($params) . " where id='{$member_id}'", $params);
    }
}
