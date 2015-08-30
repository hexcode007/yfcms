<?php

class PushFileService extends BaseService {

    public static function instance($cache = true) {
        return parent::_instance(__CLASS__, $cache);
    }

    public function getSearchList($where=array(),$offset=0,$size=10){
        $white_list = array('productCatId','productCatId2');
        $where = DBHelp::getWhiteItem($where,$white_list); 
        $condition = DBHelp::buildWhere($where);
        $sql = "select * from {tbname} where $condition limit {$offset},{$size}";
        $rs =  $this->mPushFile->getAll($sql,$where);
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
        $white_list = array('productCatId','productCatId2');
        $where = DBHelp::getWhiteItem($where,$white_list); 
        $condition = DBHelp::buildWhere($where);
        $sql = "select count(0) from {tbname} where $condition ";
        return $this->mPushFile->getSingle($sql,$where);
    }

    /**
     * 审核文件
     * @param  参数
     * @return bool
     */
    public function auditSave($params){
        $white_list = array('id','isAudit','reason');
        $binds = DBHelp::getWhiteItem($params,$white_list,false);
        $time = time();
        $sql = "update {tbname} set isAudit=:isAudit,auditTime='{$time}',reason=:reason where id=:id ";
        return $this->mPushFile->update($sql,$binds);
    }

    public function insert($params,$file){
    	$config = array(
            'max_size' => 0,
            'allowed_types' => "csv",
            'cat_path' => "domain/",
        );
        $upload = upload::instance($config);
        $file_data = $upload->doUpload($file);
        if($file_data){
            $data = array(
                'startTime' => strtotime($params['startTime']),
                'endTime' => strtotime($params['endTime']),
                'productCatId' => (int)$params['productCatId'],
                'productCatId2' => (int)$params['productCatId2'],
                'memberId' => $_SESSION['member_info']['id'],
                'fileName' => $file_data['file_name'],
                'clientName' => $file_data['client_name'],
                'createTime' => time(),
            );
            if(!$this->mPushFile->insert($data)){
                $this->setError('写入数据库失败');
                return false;
            }
            return true;
        }else{
            $this->setError($upload->getError());
            return false;
        }
    	
    }

}
