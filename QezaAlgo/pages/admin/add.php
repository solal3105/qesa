<?php
session_start();
require '../../app/admin/menuAdmin.php';
require '../../app/admin/auth/dBAuth.php';

if (isConnect()){
    MenuAdmin('Ajout de smartphones');
    $db = connexionBDD();
    ?>
        <h1> Ajout de smartphones </h1>






    <?php
    FooterAdmin();
}
else{
    header( 'location: login.php');
}