<?php
require_once(PATH_MODELS."DAO.php");

class TelephoneDAO extends DAO{
	public function supprimerTel($id){
		$res = $this->queryRowIns('DELETE FROM telephones WHERE ID = ?', array($id));
		return $res;
	}
}
?>
