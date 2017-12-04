<?php
/**
 * Created by PhpStorm.
 * User: julie
 * Date: 11/10/2017
 * Time: 19:17
 */
?>

<?php require_once(PATH_VIEWS.'header.php');?>
    <!-- Menu -->



    <!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>

    <!--  Début de la page -->
    <h1><?= MENU_ACCUEIL ?></h1>

    <form method="post">
        <label> Taille minimale de l'écran </label>
        <input name="minScreenSize" type="number" step="0.1" value="3">

        <label> Taille maximale de l'écran </label>
        <input name="maxScreenSize" type="number" step="0.1" value="7">

        <label> Taille minimale de la mémoire RAM (MB)</label>
        <input name="minRam" type="number" step="1000" value="2000">

        <label> Nombre de téléphones à srapper (par marque)</label>
        <input name="nbTelParMarque" type="number" step="1" value="3">

        <input type="submit" name="btonSubmit" value="lancer le scraping">
    </form>

    <!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');
