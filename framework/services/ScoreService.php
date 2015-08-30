<?php

class ScoreService extends BaseService {

    /**
     * 单例对象
     * @return type
     */
    public static function instance($cache = true) {
        return parent::_instance(__CLASS__, $cache);
    }

    public function getSearchList($where=array(),$offset=0,$size=10){
        $white_list = array('productCatId','productCatId2');
        $where = DBHelp::getWhiteItem($where,$white_list); 
        $condition = DBHelp::buildWhere($where);
        $sql = "select * from {tbname} where $condition limit {$offset},{$size}";
        $rs =  $this->mScoreDetail->getAll($sql,$where);
        foreach($rs as $k => $v){
            $member_info = $this->mMembers->findByPk($v['memberId']);
            $rs[$k]['member_name'] = $member_info['truename'];
        }
        return $rs;
    }

    public function getSearchCount($where=array()){
        $white_list = array('productCatId','productCatId2');
        $where = DBHelp::getWhiteItem($where,$white_list); 
        $condition = DBHelp::buildWhere($where);
        $sql = "select count(0) from {tbname} where $condition ";
        return $this->mScoreDetail->getSingle($sql,$where);
    }
}
