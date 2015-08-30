<?php
class ProductCatsModel extends BaseModel {

    protected function __construct() {
        $this->tbname = 'product_cats';
        $this->pk = 'id';
        parent::__construct();
    }

    /**
     * 单例对象
     * @return type
     */
    public static function instance($cache=true){
        return parent::_instance(__CLASS__,$cache);
    }

}