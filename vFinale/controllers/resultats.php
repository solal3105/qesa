<?php
require_once(PATH_MODELS.'TelephoneDAO.php');
var_dump($_SESSION);
if (!empty($_POST)){
    $_SESSION['photographie'] = $_POST['photo'];
    $_SESSION['autonomie'] = $_POST['auto'];
    $_SESSION['performance'] = $_POST['perf'];

    header('Location: index.php?page=resultats');
    exit;
}



$totalNoteUser = $_SESSION['photographie']+$_SESSION['autonomie']+$_SESSION['performance'];
$telephone = new TelephoneDAO(1);
$notesTel = $telephone->getNotes();

$notesFinales = array();
foreach ($notesTel as $key => $value) {
	$note_perf = $value['note_performance']*$_SESSION['performance'];
	$note_auto = $value['note_autonomie']*$_SESSION['autonomie'];
	$note_APN = $value['note_photo']*$_SESSION['photographie'];
	$note = $note_perf + $note_APN + $note_auto;
	$note = $note/$totalNoteUser;
	$notesFinales[$value['id']] = $note;
}

asort($notesFinales);
$tel = array();
foreach ($notesFinales as $key => $value) {
	$tmp = $telephone->getTelByID($key);
	array_unshift($tel, $tmp);
}

require_once(PATH_VIEWS.'resultats.php');

?>
