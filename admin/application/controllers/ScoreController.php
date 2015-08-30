<?php

class ScoreController extends BaseController {
        
    public function indexAction() {
        $score_list = $this->sScore->getSearchList($this->getParams(),$this->_offset,$this->_pagesize);
        $score_count = $this->sScore->getSearchCount($this->getParams());
        $data = array(
            'params' => $this->getParams(),
            'score_list' => $score_list,
            'page' => Page::create($score_count,$this->_pagesize),
            'score_type' =>$this->sCommon->getScoretype()
        );
        $this->view("index", $data);
    }
}
