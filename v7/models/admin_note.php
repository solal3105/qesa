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
	}

	public function nouvelleNote($idTel, $n_perf, $n_APN, $n_auto){
		$res = $this->queryRowIns("INSERT INTO notes VALUES (?,?,?,?)", array($idTel,$n_perf,$n_APN,$n_auto));
		if ($res) {
			$this->queryRowIns("UPDATE telephones SET note = 1 WHERE ID = $idTel");
		}
		return $res;
	}

	public function verif_note($idTel){
		$tmp = $this->queryRow("SELECT note FROM telephones WHERE ID = $idTel");
		if ($tmp['note'] == 1) {
			$res = $this->queryRow("SELECT * FROM notes WHERE id = $idTel");
		}
		else $res = NULL;
		return $res;
	}

	public function updateNote($idTel, $n_perf, $n_APN, $n_auto){
		$res = $this->queryRowIns("UPDATE notes SET note_performance = ?, note_photo = ?, note_autonomie = ? WHERE id = $idTel", array($n_perf,$n_APN,$n_auto));
		if ($res != false) {
			$res = True;
		}
		return $res;
	}
}


?>
<script type="text/javascript">
		function confirmer(){
			if (confirm('voulez-vous ajouter la note ?')) {document.getElementById('conf').value = 1;}
			else {document.getElementById('conf').value = -1;}
		}
</script>