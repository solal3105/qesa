 <?php
// connexion
if(isset($_POST['nom'])){
	// Accès à la BD
	try{
		$bdd= new PDO('mysql:host='.BD_HOST.'; dbname='.BD_DBNAME.'; charset=utf8',BD_USER,BD_PWD);
		$bdd ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(Exception $e){ // catch(PDOException $e) marche aussi
		$erreur= 'connexion';
	}
		
	if(!isset($erreur)){
		//requete
		try{
			$req= $bdd -> prepare('Select * from login where login = ?');
			$req-> execute(array($_POST['nom']));
			if(!$res= $req->fetch(PDO::FETCH_ASSOC)){
					$erreur='login';
			}
		}catch(PDOException $e){ //catch(Exception $e) marche aussi
			$erreur='query';
		}
	}
	
}	

?>

<script type="text/javascript">
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
</script>
