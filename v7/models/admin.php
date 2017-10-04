<?php
require_once(PATH_MODELS."DAO.php");

class TelephoneDAO extends DAO{
	public function getTel(){
		$res = $this->queryAll("SELECT * FROM telephones WHERE pertinence = 1");

		if($res){
			return $res;
		}
		else {
			$this->getErreur();
			return NULL;
		}
	}
}