<?php require_once(PATH_MODELS.'accueil.php');


if (!isset($_POST['persona'])){
	$_POST['persona'] = 'personnalise';
}

require_once(PATH_VIEWS.'accueil.php');

?>
