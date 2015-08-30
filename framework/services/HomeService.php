<?php

class HomeService extends BaseService {

    /**
     * 单例对象
     * @return type
     */
    public static function instance($cache = true) {
        return parent::_instance(__CLASS__, $cache);
    }

    public function insertReport($member_id,$params,$file_info) {
        if($rs = $this->upload($file_info)){
            $data = array(
                'siteUrl' => $params['siteUrl'],
                'productCatId' => $params['productCat'],
                'productCatId2' => $params['productCat2'],
                'photos' =>$rs['photoId'],
                'reason' => $params['reason'],
                'memberId' => $member_id,
                'createTime' => time()
            );
            return $this->mReportDomains->insert($data);
        }
        return false;
        
    }

    public function getHomeCommonInfo($member_id) {
        $member_id = (int) $member_id;
        $report_num = $this->mReportDomains->getSingle("select count(*) from {$this->mReportDomains->tbname} where memberId={$member_id}");
        $article_num = $this->mArticles->getSingle("select count(*) from {$this->mArticles->tbname} where memberId={$member_id}");
        $pushfile_num = $this->mPushFile->getSingle("select count(*) from {$this->mPushFile->tbname} where memberId={$member_id}");
        $member_info = $this->mMembers->getOne("select photoId,totalScore from {$this->mMembers->tbname} where id={$member_id}");
        return array(
            'report_num' => $report_num,
            'article_num' => $article_num,
            'pushfile_num' => $pushfile_num,
            'score_num' => $member_info['totalScore'],
            'photo' => $this->mPhotos->getPhotoPath($member_info['photoId']),
        );
    }

    public function updateMemberInfo($member_id, $params) {
        $member_id = (int) $member_id;
        
        $data = array(
            'truename' => $params['truename'],
            'qq' => $params['qq'],
            'weixin' => $params['weixin'],
            'mobile' => $params['mobile'],
            'email' => $params['email'],
            'companyName' => $params['companyName'],
            'productCatId' => $params['productCat'],
            'productCatId2' => $params['productCat2']
        );
        return $this->mMembers->update("update {$this->mMembers->tbname} set" . DBHelpbuildUpData($data) . " where id='{$member_id}'", $data);
    }

    public function updateMemberPhoto($member_id,$file_info) {
        $upload = Upload::instance();
        $file = $upload->doUpload($file_info);
        if ($upload->getError() != '') {
            $this->setError($upload->getError());
            Log::instance()->info('homeServiceUpdateMemberPhoto', $upload->getError());
            return false;
        } 
        
        $data = array(
            "photoId" => $file['raw_name'],
            "fileMd5" => $file['file_md5'],
            "fileName" => $file['relative_path'] . $file['file_name'],
            "createTime" => time(),
        );
        $this->mPhotos->insert($data);
        $this->mMembers->update("update {$this->mMembers->tbname} set photoId='{$file["raw_name"]}' where id='{$member_id}'");
        return true;
    }
    
    public function InsertTg($member_id,$params){
         $data = array(
            'title'=>$params['title'],
            'content'=>$params['content'],
            'catId'=>(int)$params['catId'],
            'author'=>$params['author'],
            'memberId'=>$member_id,
            'createTime'=>time()
        );
        return $this->mArticles->insert($data);
    }

}
