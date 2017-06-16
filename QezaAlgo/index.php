<?php
session_start();

var_dump($_SESSION);
require 'app/admin/auth/dBAuth.php';
include 'app/public/fonctionsAlgo.php';
include 'app/public/menuPublic.php';
$bdd = connexionBDD();

afficherMenuPublic('Index');
?>


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

<?php
afficherFooterPublic();
