<?php
session_start();

if(isset($_SESSION['userName'])) {

	require_once(PATH_MODELS.'admin_note.php');

	$telephone = new TelephoneDAO(1);
	if (isset($_GET['IDtel'])) {
		$idTel = intval(htmlspecialchars($_GET['IDtel']));
		$ligne = $telephone->getTelByID($idTel);
		$notes = $telephone->verif_note($idTel);
	}
	if (!isset($_POST['conf'])) {
		$_POST['conf'] = 0;
	}

	if (isset($notes) && $notes != NULL) {
		$note_performance = $notes['note_performance'];
		$note_APN = $notes['note_photo'];
		$note_autonomie = $notes['note_autonomie'];
	}

	if (isset($_POST['note_performance'])) $note_performance = htmlspecialchars($_POST['note_performance']);
	if (isset($_POST['note_APN'])) $note_APN = htmlspecialchars($_POST['note_APN']);
	if (isset($_POST['note_autonomie'])) $note_autonomie = htmlspecialchars($_POST['note_autonomie']);

	if (isset($note_performance) && isset($note_APN) && isset($note_autonomie)) {
		if (isset($_POST['conf']) && $_POST['conf'] == 1 && $notes == NULL) {
			$new_note = $telephone->nouvelleNote($idTel, $note_performance, $note_APN, $note_autonomie);
			if ($new_note){
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=admin">';
			}
			else echo "erreur d'envoi";
		}
		elseif (isset($_POST['conf']) && $_POST['conf'] == 1 && $notes != NULL) {
			$modif_note = $telephone->updateNote($idTel, $note_performance, $note_APN, $note_autonomie);
			if ($modif_note) {
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=admin">';
			}
			else echo "erreur d'envoi";
		}
	}

	$colonne = array('Fabricant', 'modele', 'annee_sortie', 'mois_sortie', 'masse', 'epaisseur', 'taille_ecran', 'largeur_ecran', 'hauteure_ecran', 'Ratio', 'OS', 'version_OS', 'cpu', 'ram', 'camera', 'capacite_batterie', 'type_batterie', 'memoire', 'carte_SD');


	require_once(PATH_VIEWS."admin_note.php");


}

else{
    header("Location: index.php?page=login&erreur=Veuillez vous connecter pour accéder à l'espace administrateur");
}
