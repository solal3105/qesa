<?php
require_once(PATH_MODELS.'TelephoneDAO.php');

$telephone = new TelephoneDAO(1);
$tel = htmlspecialchars($_GET['IDtel']);
$res = $telephone->supprimerTel($tel);

header("Location: http://localhost/qezaco/qeza/v7/?page=admin");

?>