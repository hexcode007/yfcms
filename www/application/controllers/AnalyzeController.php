<?php

class AnalyzeController extends BaseController {

    public function indexAction() {
        $data = array(
            "member_top"=>$this->sMembers->getTopList(),
            "member_new"=>$this->sMembers->getNewList(),
        );
        $this->view("index", $data);
    }

    public function uploadAction() {
    	if($this->sPushFile->insert($this->getParams(),$_FILES['fileUpload'])){
    		echo "<script>parent.$('#uploading').hide();parent.$('#uploaded').show();</script>";
    	}else{
    		$error = $this->sPushFile->getError();
    		echo "<script>parent.alert('".$error."');parent.$('#uploading').hide();parent.$('#uploaded').hide();</script>";
    	}
        
    }

}
