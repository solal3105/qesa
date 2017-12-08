<?php require_once(PATH_VIEWS.'admin_header.php');?>


    <!--  Zone message d'alerte -->
    <?php require_once(PATH_VIEWS.'alert.php');?>

<!-- Formulaire pour l'inscription -->


<form method="post">
    <div class="form-group">
        <label> Pseudo </label>
        <br>
        <input type="text" name="userName" placeholder="pseudo">
    </div>


    <div class="form-group">
        <label> Mot de passe </label>
        <br>
        <input type="password" name="userPassword" placeholder="Mot de passe">
    </div>

    <input class="btn btn-primary" type="submit" name="btonSubmit" value="Connexion">
</form>


    <!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');
