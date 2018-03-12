<?php
require_once(PATH_MODELS.'TelephoneDAO.php');

if(isset($_SESSION['userName'])) {
	
	$telephone = new TelephoneDAO(1);
	if (isset($_GET['IDtel'])) {
		$idTel = intval(htmlspecialchars($_GET['IDtel']));
		$tel = $telephone->getTelByID($idTel);
	}

	$marques = $telephone->getAllBrands();
	$OS = $telephone->getAllOS();
	$versions = $telephone->getAllVersions($tel['OS']);
	$cpu = $telephone->getAllCpu();
	$batteries = $telephone->getAllBattType();

	$mois = array('zero', 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');

	$colonne = array('Fabricant', 'modele', 'annee_sortie', 'mois_sortie', 'prix', 'masse', 'epaisseur', 'taille_ecran', 'largeur_ecran', 'hauteure_ecran', 'OS', 'version_OS', 'cpu', 'ram', 'camera', 'capacite_batterie', 'type_batterie', 'memoire', 'carte_SD');


	if (!empty($_POST)) {
		foreach ($mois as $key => $value) {
			if ($_POST['mois_sortie'] == $value) {
				$_POST['mois_sortie'] = $key;
			}
		}
		if ($_POST['carte_SD'] == 'yes_sd') {
			$_POST['carte_SD'] = 1;
		}
		else $_POST['carte_SD'] = 0;

		$aupdate = array();
		foreach ($colonne as $key => $value) {
			if ($_POST[$value] != $tel[$value]) {
				$aupdate[$value] = $_POST[$value];
			}
			else{
				$aupdate[$value] = $tel[$value];
			}
		}
	}

if (isset($aupdate) && !empty($aupdate)) {
	$telephone->updateTel($aupdate,$idTel);
	$tel = $telephone->getTelByID($idTel);
    if ($_GET['type'] == "scrap"){
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=newsTels">';
    }
    else{
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=admin">';
    }

}



}
else{
    header("Location: index.php?page=login&erreur=Veuillez vous connecter pour accéder à l'espace administrateur");
}
require_once(PATH_VIEWS.'admin_modif.php');
