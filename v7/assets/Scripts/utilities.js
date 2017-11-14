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
		var perf,
		ver_perf = document.getElementById('note_perf');
		if (ver_perf != null) {perf = ver_perf.value;}
		else{perf = null;}
		var APN,
		ver_APN = document.getElementById('note_APN');
		if (ver_APN != null) {APN = ver_APN.value;}
		else{APN = null;}
		var auto,
		ver_auto = document.getElementById('note_auto');
		if (ver_auto != null) {auto = ver_auto.value;}
		else{auto = null;}
		var message = "Ce téléphone est-t-il si mauvais que ça ?\nperformance = "+perf+"\nAPN = "+APN+"\nautonomie = "+auto;
		
		if (perf == 0 || APN == 0 || auto == 0) {
			if(confirm(message)){
				document.getElementById('conf').value = 1;
			}
			else {
				document.getElementById('conf').value = -1;
			}
		}
		else{
			document.getElementById('conf').value = 1;	
		}
	}

	function changement(){
		document.getElementById('form-general').submit();
	}