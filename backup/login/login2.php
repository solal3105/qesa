<?php
session_start();
$host_name  = "db619403071.db.1and1.com";
$database   = "db619403071";
$user_name  = "dbo619403071";
$password   = "1Keza0205";


$bdd = mysqli_connect($host_name, $user_name, $password, $database);

if(mysqli_connect_errno())
	{
	echo '<p>La connexion au serveur MySQL a echoué : '.mysqli_connect_error().'</p>';
	}
else
	{
	echo '<p>La connexion au serveur MySQL a été faite avec succes.</p>';
	}
#connection base de donnée

$mail = 'alexis.cheyy@gmail.com';
$mdp = 'azerty';
    
#test de verification de connexion
$requser = $bdd->prepare('SELECT mail, mdp FROM membres_admin WHERE mail = ? AND mdp = ?');
$requser->bind_param("ss", $mail, $mdp);
mysqli_stmt_execute($requser);
$requser->bind_result($donnee['mail'], $donnee['mdp']);
while ($requser->fetch()) 
	{
	    echo "mail : " . $donnee['mail'] ."<br>Mot de passe : " . $donnee['mdp'];
	}
	
?>
