<?php
session_start();
$_SESSION['log'] = false;
require '../../app/admin/auth/dBAuth.php';
require '../../app/public/menuPublic.php';
require '../../app/public/fonctionsAlgo.php';
$db = connexionBDD();

afficherMenuPublic('Login');
?>
    <h1> Connexion espace administrateur </h1>

<?php
formulaireConnexion();
if (isset($_POST['btonValider'])){
    connexionAdmin($_POST['usernameForm'], $_POST['passwordForm'], $db);
}


afficherFooterPublic();
?>

