<?php
session_start();
#connection base de donnée
$dns = 'mysql:host=db619403071.db.1and1.com;dbname=db619403071;charset=utf8';
$user = 'dbo619403071@10.46.135.37';
$passwd = '1';
try{$bdd = new PDO($dns, $user, $passwd );}
catch(PDOException $e){echo '<b>Erreur : </b>' . $e->getMessage();}

#test de verification de connexion
if(isset($_POST['formconnect'])){
    $mail = htmlspecialchars($_POST['mail']);
    $mdp = sha1($_POST['mdp']);
    if (!empty($_POST['mail']) AND !empty($_POST['mdp'])){
        $requser = $bdd->prepare("SELECT * FROM membres_admin WHERE mail = ? AND mdp = ?");
        $requser->execute(array($mail, $mdp));
        $userexist = $requser->rowCount();
        if ($userexist == 1) { 
            $erreur = "compte ok";
            $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['pseudo'] = $userinfo['pseudo'];
            $_SESSION['mail'] = $userinfo['mail'];
            header("Location: ../code_site/profil.php?id=".$_SESSION['id']);
        }

        else { 
                $erreur = "L'adresse email ou le mot de passe ne correspondent pas !";
        }
    }
    else{
        $erreur = 'Tous les champs doivent être complétés !';
    }
}
?>
<!DOCTYPE html>
<html charset="utf-8">
<head>
    <link rel="stylesheet" href="login.css">
    <title>Admin</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
    <link rel="icon" type="image/png" href="../img/favicon.png" />
</head>

<body>
    <?php include_once("../analyticstracking.php") ?>
    <img src="../img/v3.png" class="logo">
    <form method="POST" action="">
    <div id="login">
        <div id="ligne"></div>
        <label for="mail">Adresse email</label>
        <input class="form" type="email" id="mail" name="mail" value="<?php if (isset($mail)) { echo "$mail";} ?>"/>
        <br><br>
        <label for="mdp">Mot de passe</label>
        <input class="form" type="password" id="mdp" name="mdp"/>
        <br>
        <div><a href="bdd.html"><input type="submit" value="valider" id="valider" name="formconnect"/></a></div>
        <div id="ligne"></div>
    </div>
    </form>
    <br><?php if(isset($erreur)){echo '<div id="erreur">'.$erreur."</div>";}?>
    <a href="../index.php">
        <img src="../img/arrows.png" class="back">
    </a>
</body>
</html>