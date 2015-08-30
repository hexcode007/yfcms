<?php
class reportDomainsModel extends BaseModel {

    protected function __construct() {
        $this->tbname = 'report_domains';
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

    //获取单个网址被举报次数
    public function getCountByDomain($url){
        $sql = "select count(*) from {tbname} where siteUrl='{$url}'";
        return $this->getSingle($sql);
    }

}