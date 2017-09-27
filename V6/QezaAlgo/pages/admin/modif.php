<?php
session_start();
require '../../app/admin/menuAdmin.php';
require '../../app/admin/auth/dBAuth.php';

if (isConnect()){
    MenuAdmin('Modification de smartphones');
    $db = connexionBDD();
    ?>
        <h1> Modification de smartphones </h1>






    <?php
    FooterAdmin();
}
else{
    header( 'location: login.php');
}