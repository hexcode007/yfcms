<?php

class DomainsController extends BaseController {
    public function IndexAction() {
        $domain_list = array();
        $domian_list = $this->sDomain->getSearchList($this->getParams(),$this->_offset,$this->_pagesize);
        $domian_count = $this->sDomain->getSearchCount($this->getParams());
        $data = array(
            'params' => $this->getParams(),
            'domain_list' => $domian_list,
            "product_cat" => json_encode($this->sProductCat->getProductCat()),
            "product_cat2" => $this->sProductCat->getProductCat(2),
            'page' => Page::create($domian_count,$this->_pagesize)
        );
        $this->view("index", $data);
    }
}
