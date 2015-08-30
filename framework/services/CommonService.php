<?php

class CommonService extends BaseService {

    /**
     * 单例对象
     * @return type
     */
    public static function instance($cache = true) {
        return parent::_instance(__CLASS__, $cache);
    }

    public function getArticleCats() {
        return array(
                '1' => '文章栏目一',
                '2' => '文章栏目二',
                '3' => '文章栏目三'
            );
    }
    
    public function getScoreType(){
        return array(
            '-1' => '下载扣除',
            '1' => '注册赠送',
            '2' => '上传文件获取',
            '3' => '举报获取',
            '4' => '充值 '
        );
    }


}
