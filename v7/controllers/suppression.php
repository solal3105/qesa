<?php
require_once(PATH_MODELS.'TelephoneDAO.php');
if (isset($_SESSION['userName'])) {

	$telephone = new TelephoneDAO(1);
	$tel = htmlspecialchars($_GET['IDtel']);
	$res = $telephone->supprimerTel($tel);

	if ($_GET['type'] == "scrap"){
        header("Location: index.php?page=newsTels");
    }
    else{
        header("Location: index.php?page=admin");
    }

}
else{
    header("Location: index.php?page=login&erreur=Veuillez vous connecter pour accéder à l'espace administrateur");
}

?>