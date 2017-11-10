<?php
require_once(PATH_MODELS."DAO.php");

class TelephoneDAO extends DAO{
	public function getTel($tri = NULL){
		if ($tri == 'annee_sortie') {
			$res = $this->queryAll("SELECT * FROM telephones WHERE pertinence = 1 ORDER BY  annee_sortie DESC, mois_sortie DESC");
		}
		elseif ($tri != NULL) {
			$res = $this->queryAll("SELECT * FROM telephones WHERE pertinence = 1 ORDER BY $tri ASC");
		}
		else{
			$res = $this->queryAll("SELECT * FROM telephones WHERE pertinence = 1");
		}
		if($res){
			return $res;
		}
		else {
			$this->getErreur();
			return NULL;
		}
	}
}
?>
<script type="text/javascript">
	function submitTelForm(){
		document.getElementById('form_taille').submit();
	}

	function nextPage(){
		document.getElementById('nbPage').value ++;
		document.getElementById('form_taille').submit();
	}
	function previousPage(){
		document.getElementById('nbPage').value --;
		document.getElementById('form_taille').submit();
	}
	function setPage(){
		if (document.getElementById('numeroPage').value > 0) {
			document.getElementById('nbPage').value = document.getElementById('numeroPage').value - 1;
		}
		else{
			document.getElementById('nbPage').value = 0;	
		}
		submitTelForm();
	}
	function supprimer(id){
		if (confirm("êtes vous sur de supprimer ce telephone ?")){
			var redirect = '?page=suppression&IDtel='+id;
			location.href=redirect;
		}
	}
</script>
