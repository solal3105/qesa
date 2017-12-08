<script type="text/javascript">
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
</script>