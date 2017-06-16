<?php

function formulaireConnexion(){
    ?>
    <form method="post">
        <p> Pseudo </p>
        <input type="text" name="usernameForm">
        <p> Password </p>
        <input type="password" name="passwordForm">
        <input type="submit" value="Connect" name="btonValider">
    </form>
    <?php
}

function connexionAdmin($username, $password, $bdd){
    $req = $bdd->prepare('SELECT * FROM user WHERE pseudoUser = ?');
    $req->execute(array($username));

    $donnees = $req->fetch();
    if ($username and $password){
        if ($donnees['mdpUser'] == $password) {
            $_SESSION['log'] = true;
            var_dump($_SESSION);
            ?><meta http-equiv="refresh" content="0,URL=/pages/admin/home.php"><?php
        }
        else{
            echo 'Identifiants incorrects';
        }
    }
    else{
        echo 'Identifiants incorrects';
    }
}

function isConnect(){
    if (isset($_SESSION)){
        if ($_SESSION['log']){
            return true;
        }
    }
    return false;
}

function deconnect(){
    $_SESSION['log'] = false;
    session_destroy();
    header('location:../../index.php');
}


