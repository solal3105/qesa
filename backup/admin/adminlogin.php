<?php
#connection base de donnée
$dns = 'mysql:host=localhost;dbname=keza;charset=utf8';
$user = 'root';
$passwd = '';
try{$bdd = new PDO($dns, $user, $passwd );}
catch(PDOException $e){echo '<b>Erreur : </b>' . $e->getMessage();}

#test de verification de connexion
if(isset($_POST['formconnect'])){
    $mail = htmlspecialchars($_POST['mail']);
    $mdp = sha1($_POST['mdp']);
    if (!empty($_POST['mail']) AND !empty($_POST['mdp'])){
        $reqmail = $bdd->prepare("SELECT * FROM membres_admin WHERE mail = ? ");
        $reqmail->execute(array($mail));
        $mailexist = $reqmail->rowCount();
        if ($mailexist == 0) { $erreur= "L'adresse email ou le mot de passe ne correspondent pas !";}
        else { 
            $reqmdp = $bdd->prepare("SELECT * FROM membres_admin WHERE mdp = ? ");
            $reqmdp->execute(array($_POST['mdp']));
            $mdpexist = $reqmdp->rowCount();
            if($mdpexist == 0){
                $erreur = "L'adresse email ou le mot de passe ne correspondent pas !";
            }
            else{
                $erreur = "compte ok";
            }
        }
    }
    else{
        $erreur = 'Tous les champs doivent etre complétés !';
    }
}
?>
<!DOCTYPE html>
<html charset="utf-8">
<head>
    <link rel="stylesheet" href="adminlogin.css">
    <title>Admin</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
    <link rel="icon" type="image/png" href="../img/favicon.png" />
</head>

<body>
    <img src="../img/v3.png" class="logo">
    <form method="POST" action="">
    <div id="login">
        <div id="ligne"></div>
        <label for="mail">Adresse email</label>
        <input class="form" type="email" id="mail" name="mail" value="<?php if (isset($mail)) { echo "$mail";} ?>"/>
        <br><br>
        <label for="mdp">Mot de passe</label>
        <input class="form" type="password" id="mdp" name="mdp"/>
        <div><a href="bdd.html"><input type="submit" value="valider" id="valider" name="formconnect"/></a></div>
        <div id="ligne"></div>
    </div>
    </form>
    <br><?php if(isset($erreur)){echo '<font color="red">'.$erreur."</font>";}?>
    <a href="../index.html">
        <img src="../img/arrows.png" class="back">
    </a>
</body>
</html>