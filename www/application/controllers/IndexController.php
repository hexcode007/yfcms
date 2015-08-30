<?php

class IndexController extends BaseController {

    public function indexAction() {
        $this->addJs('jquery.md5.js');
        $data = array(
            "channel" => 'index',
            "member_top"=>$this->sMembers->getTopList(),
            "member_new"=>$this->sMembers->getNewList(),
            'domain_list' => $this->sDomain->getNewDomainList(10),
            'article_recommen' => $this->sArticles->getRecommenList(6)
        );
        $this->view("index", $data);
    }

}
