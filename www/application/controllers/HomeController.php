<?php

class HomeController extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->view->assign(array("home_info" => $this->sHome->getHomeCommonInfo($this->member_id)));
    }

    public function indexAction() {
        $data = array(
            "channel" => 'home',
            "home_channel" => 'index',
            'domain_list' => $this->sDomain->getNewDomainList(10),
        );
        $this->view("index", $data);
    }

    public function auditAction() {
        $data = array(
            "channel" => 'home',
            "home_channel" => 'audit',
            'my_article_list' => $this->sArticles->getMemberArticleList($_SESSION['member_info']['id'],0,15),
        );
        $this->view("audit", $data);
    }

    public function headAction() {
        $this->addJs('jquery.Jcrop.min.js');
        $data = array(
            "channel" => 'home',
            "home_channel" => 'index'
        );
        $this->view("head", $data);
    }

    public function infoAction() {
        $rs = $this->mMembers->findByPk($_SESSION['member_info']['id']);
        $data = array(
            "channel" => 'home',
            "home_channel" => 'info',
            "product_cat" => json_encode($this->sProductCat->getProductCat()),
            "info" => $rs
        );
        $this->view("info", $data);
    }

    public function reportAction() {
        $data = array(
            "channel" => 'home',
            "home_channel" => 'report'
        );
        $this->view("report", $data);
    }

    public function tgAction() {
        $data = array(
            "channel" => 'home',
            "home_channel" => 'tg',
            "artice_cats" => $this->sCommon->getArticleCats()
        );
        $this->view("tg", $data);
    }

    public function tgSaveAction() {
        $this->checkParams();
        if ($_SESSION['authnum_session'] != $this->getParams('yzm')) {
            $this->responseFail('验证码错误');
        }
        if ($this->sHome->InsertTg($this->member_id, $this->getParams())) {
            $this->responseOk();
        }
        $this->responseFail();
    }

    public function infoSaveAction() {
        $this->checkParams();

        if ($this->sHome->updateMemberInfo($this->member_id, $this->getParams())) {
            $this->responseOk();
        }
        $this->responseFail();
    }

    public function reportSaveAction() {
        list($status, $msg) = Validate::instance()->checkAllParams($_REQUEST);
        if ($status !== 0) {
            echo "<script>parent.alert('" . $msg . "')</script>";
            die;
        }
        if ($_SESSION['authnum_session'] != $this->getParams('yzm')) {
            $this->responseFail('验证码错误');
        }

        if ($this->sHome->insertReport($this->member_id, $this->getParams(), $_FILES['photo'])) {
            echo "<script>alert('举报成功,审核通过后,积分将送至您的账户!');location.reload(false)</script>";
            die;
        }
        echo "<script>alert('" . $this->sHome->getError() . "')</script>";
    }

    public function headSaveAction() {
        $rs = $this->sHome->updateMemberPhoto($this->member_id, $_FILES['photo']);
        if ($rs) {
            echo "<script>parent.location.reload(false)</script>";
            die;
        }
        echo "<script>parent.alert('" . $this->sHome->getError() . "')</script>";
    }

}
