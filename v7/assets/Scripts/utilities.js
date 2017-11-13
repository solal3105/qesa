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
	function confirmer(){
		if (confirm('voulez-vous ajouter la note ?')) {document.getElementById('conf').value = 1;}
		else {document.getElementById('conf').value = -1;}
	}

	function changement(){
		document.getElementById('form-general').submit();
	}
	function confirmer(){
			if (confirm('voulez-vous ajouter la note ?')) {document.getElementById('conf').value = 1;}
			else {document.getElementById('conf').value = -1;}
		}