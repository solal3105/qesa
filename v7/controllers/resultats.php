<?php

require_once(PATH_MODELS.'TelephoneDAO.php');

$_SESSION['photographie'] = $_POST['photo'];
$_SESSION['autonomie'] = $_POST['auto'];
$_SESSION['performance'] = $_POST['perf'];

$totalNoteUser = $_SESSION['photographie']+$_SESSION['autonomie']+$_SESSION['performance'];

$telephone = new TelephoneDAO(1);
$notesTel = $telephone->getNotes();

$notesFinales = array();
foreach ($notesTel as $key => $value) {
	$note_perf = $notesTel[$key]['note_performance']*$_SESSION['performance'];
	$note_auto = $notesTel[$key]['note_autonomie']*$_SESSION['autonomie'];
	$note_APN = $notesTel[$key]['note_photo']*$_SESSION['photographie'];
	$note = $note_perf + $note_APN + $note_auto;
	$note = $note/$totalNoteUser;
	$notesFinales[$notesTel[$key]['id']] = $note;
}

asort($notesFinales);
$tel = array();
foreach ($notesFinales as $key => $value) {
	$tmp = $telephone->getTelByID($key);
	array_unshift($tel, $tmp);
}

require_once(PATH_VIEWS.'resultats.php');

?>
