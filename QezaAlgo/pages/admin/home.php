<?php
session_start();
require '../../app/admin/menuAdmin.php';
require '../../app/admin/auth/dBAuth.php';

if (isConnect()){
    MenuAdmin("page d'accueil administarteur");
    $db = connexionBDD();
    ?>
        <h1> Accueil espace administrateur </h1>






    <?php
    FooterAdmin();
}
else{
    header( 'location: login.php');
}
