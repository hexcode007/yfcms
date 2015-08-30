<?php

class PushDetailService extends BaseService {

    public static function instance($cache = true) {
        return parent::_instance(__CLASS__, $cache);
    }

    public function getSearchList($push_id,$where=array(),$offset=0,$size=10){
        $white_list = array();
        $where = DBHelp::getWhiteItem($where,$white_list); 
        $condition = DBHelp::buildWhere($where);
        $sql = "select * from {tbname} where pushId='{$push_id}' and $condition limit {$offset},{$size}";
        $rs =  $this->mPushDetail->getAll($sql,$where);
        if(is_array($rs)){
            foreach($rs as $k=>$v){

            }
        }
        return $rs;
    }

    public function getSearchCount($push_id,$where){
        $white_list = array();
        $where = DBHelp::getWhiteItem($where,$white_list); 
        $condition = DBHelp::buildWhere($where);
        $sql = "select count(0) from {tbname} where pushId='{$push_id}' and $condition ";
        return $this->mPushDetail->getSingle($sql,$where);
    }

}
