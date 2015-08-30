<?php

class ArticleController extends BaseController {
    
    public $audit_list = array(0=>'未审核',1=>'<font color=green>通过</font>',2=>'<font color=red>未通过</font>');

    public function __construct() {
        parent::__construct();
    }


    public function IndexAction() {
        $article_list = $this->sArticles->getSearchList($this->getParams(),$this->_offset,$this->_pagesize);
        $article_count = $this->sArticles->getSearchCount($this->getParams());
        $data = array(
            'params' => $this->getParams(),
            'article_list' => $article_list,
            'article_type' => $this->sCommon->getArticleCats(),
            'audit_list' => $this->audit_list,
            'page' => Page::create($article_count,$this->_pagesize),
        );
        //print_r($data);die();
        $this->view("index", $data);
    }

    public function DetailAction($article_id) {
        $article = $this->sArticles->getArticleDetail($article_id);
        $data = array(
            'params' => $this->getParams(),
            'article' => $article,
            'article_type' => $this->sCommon->getArticleCats(),
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
