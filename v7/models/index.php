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
