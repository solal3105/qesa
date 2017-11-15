<?php

if(isset($_POST['persona']) && $_POST['persona']=='photographie'){
	$_SESSION['photographie']=9;
	$_SESSION['autonomie']=3;
	$_SESSION['performance']=3;
}
if(isset($_POST['persona']) && $_POST['persona']=='autonomie'){
	$_SESSION['photographie']=3;
	$_SESSION['autonomie']=9;
	$_SESSION['performance']=3;
}
if(isset($_POST['persona']) && $_POST['persona']=='performance'){
	$_SESSION['photographie']=2;
	$_SESSION['autonomie']=5;
	$_SESSION['performance']=8;
}
if(isset($_POST['persona']) && $_POST['persona']=='personalise'){
	$_SESSION['photographie']=2;
	$_SESSION['autonomie']=2;
	$_SESSION['performance']=2;
}


require_once(PATH_VIEWS.'personas.php');

