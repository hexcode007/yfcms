<?php

class FilelistController extends BaseController {
    public $audit_list = array(0=>'未审核',1=>'<font color=green>通过</font>',2=>'<font color=red>未通过</font>');
    public $analyze_list = array(0=>'未分析',1=>'<font color=green>已分析</font>');

    public function __construct() {
        parent::__construct();
    }


    public function IndexAction() {
        $push_list = $this->sPushFile->getSearchList($this->getParams(),$this->_offset,$this->_pagesize);
        $push_count = $this->sPushFile->getSearchCount($this->getParams());
        $data = array(
            'params' => $this->getParams(),
            'push_list' => $push_list,
            'audit_list' => $this->audit_list,
            'analyze_list' => $this->analyze_list,
            'page' => Page::create($push_count,$this->_pagesize),
            "product_cat" => json_encode($this->sProductCat->getProductCat()),
            "product_cat2" => $this->sProductCat->getProductCat(2),
        );
        $this->view("index", $data);
    }

    public function DetailAction($push_id) {
        $domian_list = $this->sPushDetail->getSearchList($push_id,$this->getParams(),$this->_offset,$this->_pagesize);
        $domian_count = $this->sPushDetail->getSearchCount($push_id,$this->getParams());
        $data = array(
            'params' => $this->getParams(),
            'domain_list' => $domian_list,
            'page' => Page::create($domian_count,$this->_pagesize)
        );
        $this->view("detail", $data);
    }

    public function AuditSaveAction() {
        if($this->sPushFile->auditSave($this->getParams())){
            $this->responseOk();
        }
        $error = $this->sPushFile->getError();
        $this->responseFail($error);
    }

}
