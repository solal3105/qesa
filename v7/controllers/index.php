<?php
if (isset($_POST['performance'])){
	$performance=$_POST['performance'];
}
else{
	$performance=0;
}
if (isset($_POST['batterie'])){
	$batterie=$_POST['batterie'];
}
else{
	$batterie=0;
}
if (isset($_POST['photo'])){
	$photo=$_POST['photo'];
}
else{
	$photo=0;
}

require_once(PATH_VIEWS.'index.php');

?>
