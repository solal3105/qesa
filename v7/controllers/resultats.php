<?php require_once(PATH_MODELS.'resultats.php');
	$_SESSION['photographie']=$_POST['sum1'];
	$_SESSION['autonomie']=$_POST['sum2'];
	$_SESSION['performance']=$_POST['sum3'];
require_once(PATH_VIEWS.'resultats.php');

?>
