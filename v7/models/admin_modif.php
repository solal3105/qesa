<?php
require_once(PATH_MODELS."DAO.php");

/**
* 
*/
class TelephoneDAO extends DAO{

	//recupére un téléphone grâce à son ID
	public function getTelByID($id){
		$res = $this->queryRow("SELECT * FROM telephones WHERE ID = $id");
		if ($res) {
			return $res;
		}
		else return false;
	}

	public function getAllBrands(){
		$res = $this->queryAll("SELECT distinct(Fabricant) FROM telephones");
		if ($res) {
			return $res;
		}
		else return false;
	}

	public function getAllOS(){
		$res = $this->queryAll("SELECT distinct(OS) FROM telephones");
		if ($res) {
			return $res;
		}
		else return false;
	}

	public function getAllVersions($OS){
		$res = $this->queryAll("SELECT distinct(version_OS) FROM telephones WHERE OS = ?", array($OS));
		if ($res) {
			return $res;
		}
		else return false;
	}

	public function getAllCpu(){
		$res = $this->queryAll("SELECT distinct(cpu) FROM telephones WHERE pertinence = 1");
		if($res){
			return $res;
		}
		else return false;
	}

	public function getAllBattType(){
		$res = $this->queryAll("SELECT distinct(type_batterie) FROM telephones WHERE pertinence = 1");
		if ($res) {
			return $res;
		}
		else return false;
	}

	public function updateTel($tab,$idtel){
		foreach ($tab as $key => $value) {
			$this->queryRowIns("UPDATE telephones SET Fabricant²= ? WHERE ID = ?",array($value,intval($idtel)));
		}
	}
}


?>
<script type="text/javascript">
	function confirmer(){
		if (confirm('voulez-vous ajouter la note ?')) {document.getElementById('conf').value = 1;}
		else {document.getElementById('conf').value = -1;}
	}

	function changement(){
		document.getElementById('form-general').submit();
	}
</script>