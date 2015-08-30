<?php

class CheatController extends BaseController {

    public function indexAction() {
        $data = array(
            "channel" => 'cheat',
            "member_top"=>$this->sMembers->getTopList(),
            "member_new"=>$this->sMembers->getNewList(),
            "domain_list" => $this->sDomain->getNewDomainList(10),
            "report_domain_count" => $this->sDomain->getCountAllReportDomain(),
            "analyze_domain_count" => $this->sDomain->getCountAllAnalyzeDomain(),
            "member_count" => $this->sMembers->getCountAllMember(),
            "product_cat" => $this->sProductCat->getProductCat(),
            "member_info"=> $this->sMembers->getMemberInfoByPk($this->member_id)
        );

        $this->view("index", $data);
    }

}
