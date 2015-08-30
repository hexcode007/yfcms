<?php

class ProductCatService extends BaseService {

    /**
     * 单例对象
     * @return type
     */
    public static function instance($cache = true) {
        return parent::_instance(__CLASS__, $cache);
    }

    /**
     * 获取所有产品分类
     * @param  integer $type 1:用户JSON二级联动 2:用户展示
     * @return [type]        [description]
     */
    public function getProductCat($type=1){
        $sql = "select * from {tbname} order by parentId,sortId";
        $rs = $this->mProductCats->getAll($sql);
        if($type==1){
            foreach($rs as $k=>$v){
                if($v['parentId']==0){
                    $data[$v['id']]['id'] = $v['id'];
                    $data[$v['id']]['title'] = $v['title'];
                }else{
                    $data[$v['parentId']]['child'][$v['id']]['id'] =  $v['id'];
                    $data[$v['parentId']]['child'][$v['id']]['title'] = $v['title'];
                }
            }
        }elseif($type==2){
            foreach($rs as $k=>$v){
                $data[$v['id']] = $v['title'];
            }
        }
        
        return $data;
    }
}
