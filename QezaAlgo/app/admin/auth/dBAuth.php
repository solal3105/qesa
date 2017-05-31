<?php
session_start();

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
            $_SESSION['username'] = $username;
            return true;
        }
    }

    return false;
}

function isConnect(){
    if ($_SESSION['username']){
        return true;
    }
    return false;
}


