<?php
session_start();
require '../../app/admin/menuAdmin.php';
require '../../app/admin/auth/dBAuth.php';

if (isConnect()){
    MenuAdmin('Suppression de smartphones');
    $db = connexionBDD();
?>
        <h1> Suppression de smartphones </h1>






    <?php
    FooterAdmin();
}
else{
    header( 'location: login.php');
}