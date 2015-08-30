<?php

class LoginController extends BaseController {

    public function indexAction() {
        $this->addJs('jquery.md5.js');
        $this->view("index");
    }

    public function regAction() {
        $this->addJs('reg.js');
        $data = array(
            "product_cat" => json_encode($this->sProductCat->getProductCat())
            );
        $this->view("reg",$data);
    }

    public function regsaveAction() {
        if($this->sMembers->memberReg($this->getParams())){
            $this->responseOK();
        }
        $error = $this->sMembers->getError();
        $this->responseFail($error);
    }

    public function checkUsernameAction() {
        $username = $this->getParams("username");
        if ($this->sMembers->isExistMemberUsername($username)) {
            $this->responseFail();
        }
        $this->responseOK();
    }
    
    public function outAction() {
        $_SESSION['member_info']=null;
        $this->responseOK();
    }
    
    public function inAction() {
        $params = $this->getParams();
        if (!$this->sMembers->memberLogin($params)) {
            $error = $this->sMembers->getError();
            $this->responseFail($error);
        }
        $this->responseOK();
    }

}
