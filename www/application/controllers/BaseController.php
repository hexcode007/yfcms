<?php

class BaseController {

    protected $_json = [
        'status' => 0,
        'info' => 'success',
        'data' => array()
    ];
    protected $js = array();
    protected $css = array();
    protected $member_id = 0;
    protected $_page = 1;
    protected $_pagesize = 15;
    protected $_offset = 0;

    public function __construct() {
        $this->_checkLogin();

        $this->_page =  $this->getParams('page')> 0 ? intval($this->getParams('page')) : 1;
        $this->_offset = ($this->_page - 1) * $this->_pagesize;
    }

    private function _checkLogin() {
        $ignore = array(
            "login" => "*",
            "index" => "*",
            "article" => "*",
            "analyze" => "*",
            "cheat" => "*",
        );
        $controller = Router::getController();
        $action = Router::getAction();
        if (isset($ignore[$controller]) && (strpos("," . $ignore[$controller] . ",", ",{$action},") !== false || $ignore[$controller] == "*")) {
            return false;
        }

        if (isset($_SESSION['member_info']['id']) && $_SESSION['member_info']['id'] > 0) {
            $this->member_id = $_SESSION['member_info']['id'];
        } else {
            ob_clean();
            header('Location:/login.html');
            die();
        }
    }

    /**
     * 模板加载
     * @param 文件名 $file
     * @param 传送数据 $data
     * @param layout模板,null则加载默认layout $layout
     * @param true 直接输出, false 作为字符串返回 $print
     * @return type
     */
    public function view($file = null, $data = null, $layout = null, $print = true) {
        $this->default_assign();
        return $this->view->display($file, $data, $layout, $print);
        return;
    }

    /**
     * 不带layout的模板加载
     * @param 文件名 $file
     * @param 传送数据 $data
     * @param true 直接输出, false 作为字符串返回 $print
     * @return
     */
    public function viewSingle($file = null, $data = null, $print = true) {
        $this->default_assign();
        return $this->view->displaySingle($file, $data, $print);
    }

    public function default_assign() {
        $global_assign = array(
            'member_info' => isset($_SESSION['member_info']) ? $_SESSION['member_info'] : "",
            'static_url' => Config::get('static_url'),
            'base_url' => Config::get('app_url'),
            'cur_url' => Router::getController() . "/" . Router::getAction() . "/",
            'js' => $this->js,
            'css' => $this->css,
        );
        $this->view->assign($global_assign);
    }

    /**
     * 参数统一获取
     * @param str $key
     * @return
     */
    protected function getParams($key = null, $filter_xss = true) {
        $input = $_REQUEST;
        if ($filter_xss) {
            $input = Util::escStr($input);
        }
        return isset($input[$key]) ? $input[$key] : ((is_null($key)) ? $input : null);
    }
    
    /**
     * 参数参数验证
     * @param str $key
     * @return
     */
    protected function checkParams() {
        list($status,$msg) = Validate::instance()->checkAllParams($_REQUEST);
        if($status!==0){
            $this->responseFail($msg);
        }
    }

    /**
     * 魔术方法,快速获取对象
     * @param  [type] $name [description]
     * @return [type]       [description]
     */
    public function __get($name) {
        if ($name == 'view') {
            $view_type = config::get('view.type');
            $config = config::get('view.' . $view_type);
            $this->$name = View::instance($config);
            return $this->$name;
        } else if (preg_match("/^m[A-Z]$/i", substr($name, 0, 2))) {
            $model_name = substr($name, 1) . "Model";
            $this->$name = $model_name::instance();
            return $this->$name;
        } else if (preg_match("/^s[A-Z]$/i", substr($name, 0, 2))) {
            $service_name = substr($name, 1) . "Service";
            $this->$name = $service_name::instance();
            return $this->$name;
        }else {
            return null;
        }
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }

    public function __destruct() {
        /**
          echo "time: " .(microtime(TRUE) - START_TIME)*1000 .'ms';
          echo "<br>";
          echo "memory: " .(memory_get_usage() - START_MEMORY)/1024 ."k";
         */
    }

    public function __toString() {
        
    }

    public function __call($name, $arg) {
        throw new Exception("方法不存在");
    }

    protected function addJs() {
        $this->js = array_merge($this->js, func_get_args());
    }

    protected function addCss() {
        $this->css = array_merge($this->css, func_get_args());
    }

    protected function responseOk($info = '') {
        $this->_json['info'] = $info ? : 'success';
        echo json_encode($this->_json, JSON_UNESCAPED_UNICODE);
        die;
    }

    protected function responseInfo($result = []) {
        if (empty($result)) {
            $result = $this->result;
        }
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        die;
    }

    protected function responseFail($info = '') {
        $this->_json = array(
            'status' => 1,
            'info' => $info? : 'fail',
            'data' => array()
        );
        echo json_encode($this->_json, JSON_UNESCAPED_UNICODE);
        die;
    }

}

// End Controller
