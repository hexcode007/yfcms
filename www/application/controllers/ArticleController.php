<?php
class ArticleController extends BaseController {
    public function __construct() {
        parent::__construct();
        $this->view->assign(array("home_info" => $this->sHome->getHomeCommonInfo($this->member_id)));
    }
    
    public function indexAction($page=1) {
        $this->_page = $_REQUEST['page'] = (int)$page;
        $this->_pagesize=20;
        $this->_offset = ($this->_page - 1) * $this->_pagesize;    
        $rs = $this->sArticles->getArticleList(array(),$this->_offset,$this->_pagesize);
        $count = $this->sArticles->getArticleCount(array(),$this->_offset,$this->_pagesize);
        
        $data = array(
            "channel" => 'article',
            "list" => $rs,
            "member_top"=>$this->sMembers->getTopList(),
            "member_new"=>$this->sMembers->getNewList(),
            "pagestr" => Page::creat(500, $this->_pagesize)
        );
        $this->view("index", $data);
    }

    public function detailAction($id) {
        $rs = $this->sArticles->getArticleDetail($id);
        $rs['createTime'] = date("Y-m-d h:i:s",$rs['createTime']);
        $data = array(
            "channel" => 'article',
            "detail" => $rs,
            "member_top"=>$this->sMembers->getTopList(),
            "member_new"=>$this->sMembers->getNewList(),
            'article_recommen' => $this->sArticles->getRecommenList(6)
        );
        $this->view("detail",$data);
    }

}
