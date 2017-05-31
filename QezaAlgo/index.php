<?php
session_start();
$_SESSION['username'];


include 'app/public/fonctionsAlgo.php';
include 'app/public/menuPublic.php';
$bdd = connexionBDD();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>KEZA</title>
        <meta charset="utf-8">

        <!-- Google Fonts -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
        <!-- CSS Reset -->
        <link rel="stylesheet" href="http://cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
        <!-- Milligram CSS minified -->
        <link rel="stylesheet" href="http://cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
        <!-- Css Perso -->
        <link rel="stylesheet" type="text/css" href="pages/style/style.css">
    </head>
    <?php
    afficherMenuPublic();
    ?>
    <body>
        <h1> Test Algo KEZA</h1>

        <!-- Affichage de tous les téléphones présents dans la bdd -->
        <div>
            <?php lireBDD($bdd) ?>
        </div>

        <div>
            <form method="post" action="index.php">
             <p> Performances : </p>
                <input type="range" value="0" min="0" max="10" step="1" name="perfRange">
             <p> Qualite photo : </p>
                <input type="range" value="0" min="0" max="10" step="1" name="photoRange">
             <p> Autonomie : </p>
                <input type="range" value="0" min="0" max="10" step="1" name="batterieRange">
             <p> Prix max : </p>
                <input type="number" value="0" min="0" max="1500" step="50" name="prixMax">
            <p> </p>
                <input type="submit" value="GO" name="boutonValider">
            </form>
        </div>

        <div id="dernierDiv">
            <?php calculPoints($bdd); ?>
        </div>
    </body>
</html>