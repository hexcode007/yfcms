<?php

class MembersController extends BaseController {

    public function indexAction() {
        $member_list = $this->sMembers->getSearchList($this->getParams(),$this->_offset,$this->_pagesize);
        $member_count = $this->sMembers->getSearchCount($this->getParams());
        $data = array(
            'params' => $this->getParams(),
            'member_list' => $member_list,
            'page' => Page::create($member_count,$this->_pagesize),
            "product_cat" => json_encode($this->sProductCat->getProductCat()),
            "product_cat2" => $this->sProductCat->getProductCat(2),
        );
        $this->view("index", $data);
    }

    public function scoreAction() {
        $score_list = array();

        $data = array(
            'params' => $this->getParams(),
            'score_list' => $score_list,
            'page' => '',
        );
        $this->view("score", $data);
    }

    public function EditAction($member_id) {
        $rs = $this->sMembers->getMemberInfoByPk($member_id);
        if($rs){
            $this->_json['data'] = $rs;
            $this->responseOk();
        }
        $error = $this->sMembers->getError();
        $this->responseFail($error);
    }

    public function EditSaveAction() {
        if($this->sMembers->EditSave($this->getParams('id'),$this->getParams())){
            $this->responseOk();
        }
        $error = $this->sMembers->getError();
        $this->responseFail($error);
    }

}
