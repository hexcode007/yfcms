<?php
class TestModel extends BaseModel {
	public $error = '';
    protected function __construct() {
        $this->tbname = 'users';
        $this->pk = 'id';
        parent::__construct();
    }

    /**
     * µ¥Àý¶ÔÏó
     * @return type
     */
    public static function instance($cache=true){
        return parent::_instance(__CLASS__,$cache);
    }

    public function testdb(){
        $db = $this->db;

        
        $rs = $db->insert('people',array('name'=>'name1','EngingName'=>'name111','age'=>5,'sex'=>'M'));
        Util::P($rs,true);
        /*
        $rs = $db->insert('people',array('name'=>'name2','EngingName'=>'name222','age'=>6,'sex'=>'M'));
        Util::P($rs,true);

        $db->beginTransaction();

        $rs = $db->insert('people',array('name'=>'name3','EngingName'=>'name333','age'=>7,'sex'=>'M'));
        Util::P($rs,true);

        
        $rs = $db->lastId();
        Util::P($rs,true);


        $rs = $db->getOne("select * from people");
        Util::P($rs);
        $rs = $db->getOne("select * from people where age = :age",array("age"=>5));
        Util::P($rs);

        $rs = $db->getAll("select * from people where age >=5");
        Util::P($rs);

        $rs = $db->getAll("select * from people where age >= :age",array("age"=>10));
        Util::P($rs);

        sleep(10);

        $rs = $db->findByPk('people','id',3);
        Util::P($rs);

        $rs = $db->update("update people set age = :age where age=6",array("age"=>9));
        Util::P($rs,true);

        $rs = $db->update("delete from people  where age=:age",array("age"=>9));
        Util::P($rs,true);

        $rs = $db->update("delete from people  where age<:age",array("age"=>10));
        Util::P($rs,true);

        
        $rs = $db->insert('people',array('name'=>'name4','EngingName'=>'name444','age'=>8,'sex'=>'M'));
        Util::P($rs,true);
        $db->commit();
        */

    }

	
}