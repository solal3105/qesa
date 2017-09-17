<?php
if (isset($_POST['performance'])){
	$performance=$_POST['performance'];
}
else{
	$performance=0;
}

require_once(PATH_VIEWS.'index.php');

?>
