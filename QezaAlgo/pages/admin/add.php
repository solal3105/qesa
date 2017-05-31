<?php

require '../../app/admin/auth/dBAuth.php';
require '../../app/public/fonctionsAlgo.php';
require '../../app/admin/menuAdmin.php';
$db = connexionBDD();

if (isConnect()){
    afficherMenuAdmin();
?>


    <h1> Voici ma page d'ajout de smartphones </h1>















    <?php
}
else{
    header( 'location: login.php');
}