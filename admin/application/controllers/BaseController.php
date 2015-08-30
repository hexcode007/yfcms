<?php

class BaseController {

    protected $_json = [
        'status' => 0,
        'info' => 'success',
        'data' => array()
    ];

    protected $_page = 1;
    protected $_pagesize = 15;
    protected $_offset = 0;

    public function __construct() {
        $this->_checkLogin();
        $this->_page =  $this->getParams('page')> 0 ? intval($this->getParams('page')) : 1;
        $this->_offset = ($this->_page - 1) * $this->_pagesize;
    }

    private function _checkLogin() {
        if (defined('NO_NEED_LOGIN') && NO_NEED_LOGIN === true) {
            return;
        }
        if (isset($_SESSION['user_info']['id']) && $_SESSION['user_info']['id'] > 0) {
            
        } else {
            header('Location:/login');
        }
    }

    public function _getMenus() {
        return array(
            array(
                'menu_name' => '数据管理',
                'menu_id' => '1',
                'moudles' => array(
                    array(
                        'moudle_name' => '数据总览',
                        'moudle_url' => '/',
                        'moudle_id' => '2',
                    ),
                    array(
                        'moudle_name' => '数据分析',
                        'moudle_url' => '/domains/',
                        'moudle_id' => '2',
                    ),
                    array(
                        'moudle_name' => '用户上传包',
                        'moudle_url' => '/filelist',
                        'moudle_id' => '2',
                    )
                )
            ),
            array(
                'menu_name' => '会员管理',
                'menu_id' => '1',
                'moudles' => array(
                    array(
                        'moudle_name' => '会员列表',
                        'moudle_url' => '/members/',
                        'moudle_id' => '2',
                    ),
                    array(
                        'moudle_name' => '会员积分',
                        'moudle_url' => '/score/',
                        'moudle_id' => '2',
                    ),
                    array(
                        'moudle_name' => '文章管理',
                        'moudle_url' => '/article/',
                        'moudle_id' => '2',
                    ),
                )
            ),
            array(
                'menu_name' => '系统设置',
                'menu_id' => '1',
                'moudles' => array(
                    array(
                        'moudle_name' => '账户管理',
                        'moudle_url' => '/uer',
                        'moudle_id' => '2',
                    ),
                    array(
                        'moudle_name' => '群组管理',
                        'moudle_url' => '/group',
                        'moudle_id' => '2',
                    ),
                )
            ),
        );
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
        if (!is_null($file)) {
            $this->default_assign();
            return $this->view->display($file, $data, $layout, $print);
        }
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
            'user_info' => isset($_SESSION['user_info']) ? $_SESSION['user_info'] : "",
            'static_url' => Config::get('static_url'),
            'base_url' => Config::get('app_url'),
            'cur_url' => Router::getController() . "/" . Router::getAction() . "/",
            'menus' => $this->_getMenus()
        );
        $this->view->assign($global_assign);
    }

    /**
     * 参数统一获取
     * @param str $key
     * @return
     */
    protected function getParams($key = null, $filter_xss = true) {
        $input = array_merge($_GET, $_POST);
        if ($filter_xss) {
            $input = Util::escStr($input);
        }
        return isset($input[$key]) ? $input[$key] : ((is_null($key)) ? $input : null);
    }

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
