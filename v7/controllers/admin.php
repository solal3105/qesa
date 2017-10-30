<?php
require_once(PATH_MODELS.'admin.php');

$telephone = new TelephoneDAO(1);

if (isset($_GET['tri'])) {
	$tri = htmlspecialchars($_GET['tri']);
	$tel = $telephone->getTel($tri);
}
else $tel = $telephone->getTel();

$colonne = array('Fabricant', 'modele', 'annee_sortie', 'mois_sortie', 'masse', 'epaisseur', 'taille_ecran', 'largeur_ecran', 'hauteure_ecran', 'Ratio', 'OS', 'version_OS', 'cpu', 'ram', 'camera', 'capacite_batterie', 'type_batterie', 'memoire', 'carte_SD');


$nbTel = sizeof($tel);
if (!isset($_SESSION['numPage'])) {
	$_SESSION['numPage'] = 0;
}
if (isset($_POST['next'])) {
	$_SESSION['numPage'] += 1;
}
if (!isset($_POST['nbPage'])) {
	$_POST['nbPage'] = 0;
}

require_once(PATH_VIEWS.'admin.php');