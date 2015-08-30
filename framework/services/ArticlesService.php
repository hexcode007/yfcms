<?php

class ArticlesService extends BaseService {

    /**
     * 单例对象
     * @return type
     */
    public static function instance($cache = true) {
        return parent::_instance(__CLASS__, $cache);
    }

    public function getArticleList($where = array(), $offset = 0, $size = 10) {
        $sql = "select * from {tbname} where isAudit=1 order by id desc limit {$offset},{$size}";
        return $this->mArticles->getAll($sql);
    }
    
    public function getArticleCount($where = array()) {
        $sql = "select count(*) from {tbname} where isAudit=0";
        return $this->mArticles->getSingle($sql);
    }
    
    public function getSearchList($where=array(),$offset=0,$size=10){
        $white_list = array('catId');
        $where = DBHelp::getWhiteItem($where,$white_list); 
        $condition = DBHelp::buildWhere($where);
        $sql = "select * from {tbname} where $condition limit {$offset},{$size}";
        $rs =  $this->mArticles->getAll($sql,$where);
        if(is_array($rs)){
            foreach($rs as $k=>$v){
                $sql = "select truename from {tbname} where id='{$v['memberId']}'";
                $member_name = $this->mMembers->getSingle($sql);
                $rs[$k]['memberName'] = $member_name;
            }
        }
        return $rs;
    }

    public function getSearchCount($where=array()){
        $white_list = array('catId');
        $where = DBHelp::getWhiteItem($where,$white_list); 
        $condition = DBHelp::buildWhere($where);
        $sql = "select count(0) from {tbname} where $condition ";
        return $this->mArticles->getSingle($sql,$where);
    }
    
    public function getArticleDetail($id) {
        $id = (int)$id;
        $sql = "select * from {tbname} where id='{$id}'";
        return $this->mArticles->getOne($sql);
    }

    public function getRecommenList($limit){
        $limit = (int)$limit;
        $sql = "select * from {tbname} order by id desc limit {$limit}";
        $data = $this->mArticles->getAll($sql);
        foreach($data as $k=>$v){
            $member = $this->mMembers->findByPk($v['memberId']);
            $data[$k]['memberName'] = $member['truename'];
        }
        return $data;
    }

    public function getMemberArticleList($member_id,$offset,$size){
        $member_id = (int)$member_id;
        $offset = (int)$offset;
        $size = (int)$size;

        $sql = "select * from {tbname} where memberId='{$member_id}' order by id desc limit  {$offset},{$size}";
        $data = $this->mArticles->getAll($sql);
        return $data;
    }

}
