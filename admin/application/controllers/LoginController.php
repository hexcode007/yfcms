<?php

define("NO_NEED_LOGIN", true);
define("NO_NEED_POWER", true);

class LoginController extends BaseController {

    public function indexAction() {
        $this->viewSingle("index");
    }

    public function inAction() {

        $name = $this->getParams('username');
        $action = $this->getParams('action');
        $passwd = $_REQUEST['password'];
        $yz = $this->getParams('yanzheng');
        $ref = $this->getParams("ref");

        if ($action == "1") {
            if (strtolower($yz) != strtolower($_SESSION['authnum_session'])) {
                $this->responseFail('验证码输入错误');
            }

            if (!preg_match("/[0-9a-zA-Z\_]+/", $name)) {
                $this->responseFail('用户名不符合要求');
            }

            $rs = $this->mUsers->checkLogin($name, $passwd);
            if ($rs == false) {
                $this->_json['status'] = 1;
                $this->responseFail('用户名或密码不正确');
            }

            unset($rs['password']);

            $_SESSION['user_info'] = $rs;
            return $this->responseOk();
        }

        $this->responseFail('参数错误');
    }

    public function outAction() {
        $_SESSION['user_info'] = '';
        return $this->responseOk();
    }

}
