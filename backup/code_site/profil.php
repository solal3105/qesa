<?php
session_start();
#connection base de donnée
$dns = 'mysql:host=db619403071.db.1and1.com;dbname=db619403071;charset=utf8';
$user = 'dbo619403071@10.46.135.37';
$passwd = '1';
try{$bdd = new PDO($dns, $user, $passwd );}
catch(PDOException $e){echo '<b>Erreur : </b>' . $e->getMessage();}

if (isset($_GET['id']) AND $_GET['id'] > 0) {
    $getid = intval($_GET['id']);
    $requser = $bdd->prepare('SELECT * FROM membres_admin WHERE id=?');
    $requser->execute(array($getid));
    $infouser = $requser->fetch();
?>
<!DOCTYPE html>
<html>
   <head>
    <link rel="stylesheet" href="profil.css">
    <title>Base de donnée</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
    <link rel="icon" type="image/png" href="../img/favicon.png" />
</head>
<body>
<?php include_once("../analyticstracking.php") ?>
        <ul id="menu">
            <li class="nav"></li>
            <li><a href="#">Tableau</a></li>
            <li><a href="#">Ajouter</a></li>
            <li><a href="#">Supprimer</a></li>
            <li><a href="#">Trier</a></li>
            <li><a href="#"><label for="case">Mon compte</label></a>
 
            </li>
        </ul>
        
        <input type="checkbox" id="case"/>
        <div id="surcouche">
            <div id="msgbox">
            <label for="case" class="labelButon2">X</label>
                
                <h3>hej, <?php echo $infouser['pseudo']; ?> ☺</h3><br>
                <p>mail : <?php echo $infouser['mail']; ?> </p><br><br><br><br>
                    <a href="#"><?php 
                            if (isset($_SESSION['id'])
                            AND $infouser['id'] == $_SESSION['id']) {?></a>
                    <a href="#" class="labelButon1">Modifier le profil</a>
                    <a href="deconnexion.php" class="labelButon1">Deconnexion</a> <?php } ?>
            </div>
</div>
</body>
</html>
<?php } ?>