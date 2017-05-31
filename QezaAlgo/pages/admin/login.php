<?php
session_start();
?>
<link rel="stylesheet" href="http://cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 30/05/2017
 * Time: 18:54
 */

require '../../app/admin/auth/dBAuth.php';
require '../../app/public/fonctionsAlgo.php';
$db = connexionBDD();


?>
    <h1> Connexion espace administrateur </h1>
<?php
formulaireConnexion();
if (isset($_POST['btonValider'])){
    if (connexionAdmin($_POST['usernameForm'], $_POST['passwordForm'], $db)) {
        ?> <meta http-equiv="refresh" content="1;url=home.php"/> <?php
        echo 'connexion ok';

    }
    else {
        echo 'Identifiants incorrects';
    }
}

?>

