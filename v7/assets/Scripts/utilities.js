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
	function supprimer(id, isNewTel){
		if (confirm("êtes vous sur de supprimer ce telephone ?")){
			if (isNewTel){
                var redirect = '?page=suppression&type=scrap&IDtel='+id;
			}
			else{
                var redirect = '?page=suppression&IDtel='+id;
			}

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
	
	function calc(A,B,C,SUM) { 
		var one = Number(A); 
		if (isNaN(one)) { alert('Invalid entry: '+A); one=0; } 
		var two = Number(document.getElementById(B).value);  
		if (isNaN(two)) { alert('Invalid entry: '+B); two=0; } 
		var three = Number(document.getElementById(C).value);  
		if (isNaN(two)) { alert('Invalid entry: '+C); three=0; } 
		document.getElementById(SUM).value = (15-(one + two + three));
	}
		function subForm(n){
		if (n==1){
			document.getElementById('persona').value='photographie';
		}
		else if(n==2){
			document.getElementById('persona').value='autonomie';
		}
		else if(n==3){
			document.getElementById('persona').value='performance';
		}
		else if(n==4){
			document.getElementById('persona').value='personalise';
		}
		document.getElementById('formulaire').submit();
	}

	function calcPts(c1, c2, c3, afficheSum){
		var nbPoints1 = document.getElementById(c1).value;
		var nbPoints2 = document.getElementById(c2).value;
		var nbPoints3 = document.getElementById(c3).value;

		document.getElementById(afficheSum).value = (15 - nbPoints1 - nbPoints2 - nbPoints3);
	}