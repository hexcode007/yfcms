<?php
class PhotosModel extends BaseModel {

    protected function __construct() {
        $this->tbname = 'photos';
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
    
    //图片Id转图片路径
    public function getPhotoPath($photoId){
        if($photoId>0){
            return "/uploads/".$this->getSingle("select fileName from {tbname} where photoId=:photoId",array('photoId'=>$photoId));
        }
        return '/uploads/header/default.jpg';
    }

}