<?php
require_once(PATH_MODELS.'admin.php');

$telephone = new TelephoneDAO(1);
$tel = $telephone->getTel();


require_once(PATH_VIEWS.'admin.php');