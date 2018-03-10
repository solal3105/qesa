<?php
require_once(PATH_MODELS.'TelephoneDAO.php');
if (isset($_SESSION['userName'])) {

    $telephone = new TelephoneDAO(1);

    $id = htmlspecialchars($_GET['IDtel']);

    $telephone->validateNewTel($id);
    if ($telephone->getErreur() == null){
        header("Location: index.php?page=admin");
    }
}
else{
    header("Location: index.php?page=login&erreur=Veuillez vous connecter pour accéder à l'espace administrateur");
}

?>