<?php

require_once(PATH_MODELS."noteDAO.php");

$notes_auto = new noteDAO(1);
$deciles = $notes_auto->calculDeciles();
$note_batterie = $notes_auto->calculAllNotesBatterie($deciles);
if ($notes_auto->uptadeNotesBatteries($note_batterie)) {
	header("Location: ?page=admin");
	exit;
}