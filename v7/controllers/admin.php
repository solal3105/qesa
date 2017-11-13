<?php
require_once(PATH_MODELS.'TelephoneDAO.php');

$telephone = new TelephoneDAO(1);

if (isset($_GET['tri'])) {
	$tri = htmlspecialchars($_GET['tri']);
	$tel = $telephone->getTel($tri);
}
else $tel = $telephone->getTel();
$nbTel = sizeof($tel);

$mois = array('zero', 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');

if (isset($_POST['taille_tab'])) {
	$tailleMax = ($nbTel+1)/$_POST['taille_tab'];
	if (($nbTel+1)%$_POST['taille_tab'] != 0) {
		$tailleMax = (int)$tailleMax;
	}
}
else{
	$tailleMax = ($nbTel+1)/10;
	if (($nbTel+1)%10 != 0) {
		$tailleMax = (int)$tailleMax;
	}
}




$colonnesBdd = array('Fabricant', 'modele', 'annee_sortie', 'cpu', 'ram', 'camera', 'capacite_batterie', 'memoire', 'OS','taille_ecran');
$colonne = array('Marque', 'Modèle', 'Sortie', 'Processeur', 'RAM', 'Camera', 'Capacité', 'Mémoire', 'OS', 'taille écran');


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