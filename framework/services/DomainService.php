<?php

class DomainService extends BaseService {

    /**
     * 单例对象
     * @return type
     */
    public static function instance($cache = true) {
        return parent::_instance(__CLASS__, $cache);
    }

    //获取网站最新分析动态 分析+举报
    public function getNewDomainList($limit){
        $data1 = array();
        $data2 = array();
        $sql = "select id,memberId,siteUrl,createTime,score,isAudit from {tbname}  order by id desc limit {$limit}";
        $report =  $this->mReportDomains->getAll($sql);
        foreach($report as $k=>$v){
            $v['reportCount'] = $this->mReportDomains->getCountByDomain($v['siteUrl']);
            $v['type'] = 1;
            $data1[$v['createTime']] = $v;
            $member_ids[$v['memberId']] = $v['memberId'];
        }

        $sql = "select id,memberId,isAnalyze,createTime,isAudit,score,star0,star1,star2,star3,star4,star5 from {tbname}  order by id desc limit {$limit}";
        $pushfile =  $this->mPushFile->getAll($sql);

        foreach($pushfile as $k=>$v){
            $v['type'] = 2;
            $data2[$v['createTime']] = $v;
            $member_ids[$v['memberId']] = $v['memberId'];
        }

        $data = $data1 + $data2;
        krsort($data);

        $data =  array_slice($data,0,$limit,true);

        $members = $this->mMembers->getMembersByIds($member_ids);

        foreach($data as $k=>$v){
            $data[$k]['memberName'] = $members[$v['memberId']]['truename'];
            $data[$k]['memberPhoto'] = $this->mPhotos->getPhotoPath($members[$v['memberId']]['photoId']);
        }

        return $data;
    }

    /**
     * 获取单个用户的提交列表
     * @param  [type] $member_id [description]
     * @param  [type] $limit     [description]
     * @return [type]            [description]
     */
    public function getMemberDomainList($member_id,$limit){
        $data1 = array();
        $data2 = array();
        $sql = "select id,memberId,siteUrl,createTime,score,isAudit from {tbname}  where memberId='{$member_id}' order by id desc limit {$limit}";
        $report =  $this->mReportDomains->getAll($sql);
        foreach($report as $k=>$v){
            $v['reportCount'] = $this->mReportDomains->getCountByDomain($v['siteUrl']);
            $v['type'] = 1;
            $data1[$v['createTime']] = $v;
        }

        $sql = "select id,memberId,isAnalyze,createTime,isAudit,score,star0,star1,star2,star3,star4,star5 from {tbname} where memberId='{$member_id}'  order by id desc limit {$limit}";
        $pushfile =  $this->mPushFile->getAll($sql);

        foreach($pushfile as $k=>$v){
            $v['type'] = 2;
            $data2[$v['createTime']] = $v;
        }

        $data = $data1 + $data2;
        krsort($data);

        $data =  array_slice($data,0,$limit,true);

        return $data;
    }

    public function getCountAllReportDomain(){
        $sql = "select count(*) from {tbname} group by siteUrl";
        return $this->mReportDomains->getSingle($sql);
    }

    //获取分析网址的总条数
    public function getCountAllAnalyzeDomain(){
        $sql = "select count(*) from {tbname}";
        return $this->mDomainsAnalyze->getSingle($sql);
    }

    //根据分数段获取分析网址条数
    public function getCountAnalyzeDomainByScore(){
        $level1_score = 10;
        $level2_score = 30;
        $level3_score = 50;
        $level4_score = 70;
        $sql1 = "select count(*) from {tbname} where avgScore <= {$level1_score}";
        $data[1] = $this->mDomainsAnalyze->getSingle($sql);
        $sql2 = "select count(*) from {tbname} where avgScore > {$level1_score} and avgScore <= {$level2_score}";
        $data[2] = $this->mDomainsAnalyze->getSingle($sql);
        $sql3 = "select count(*) from {tbname} where avgScore > {$level2_score} and avgScore <= {$level3_score}";
        $data[3] = $this->mDomainsAnalyze->getSingle($sql);
        $sql4 = "select count(*) from {tbname} where avgScore > {$level3_score} and avgScore <= {$level4_score}";
        $data[4] = $this->mDomainsAnalyze->getSingle($sql);
        $sql5 = "select count(*) from {tbname} where avgScore > {$level4_score}";
        $data[5] = $this->mDomainsAnalyze->getSingle($sql);

        return $data;
    }

    public function getSearchList($where=array(),$offset=0,$size=10){
        $white_list = array('productCatId','productCatId2');
        $where = DBHelp::getWhiteItem($where,$white_list);
        $condition = DBHelp::buildWhere($where);
        $sql = "select * from {tbname} where $condition limit {$offset},{$size}";
        $rs =  $this->mDomainsAnalyze->getAll($sql,$where);
        if(is_array($rs)){
            foreach($rs as $k=>$v){

            }
        }
        return $rs;
    }

    public function getSearchCount($where=array()){
        $white_list = array('productCatId','productCatId2');
        $where = DBHelp::getWhiteItem($where,$white_list);
        $condition = DBHelp::buildWhere($where);
        $sql = "select count(0) from {tbname} where $condition ";
        return $this->mDomainsAnalyze->getSingle($sql,$where);
    }





}
