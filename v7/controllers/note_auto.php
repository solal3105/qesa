<?php

require_once(PATH_MODELS."noteDAO.php");

$notes_auto = new noteDAO(1);
$deciles = $notes_auto->calculDecilesBatt();
$note_batterie = $notes_auto->calculAllNotesBatterie($deciles);
//$ram = $notes_auto->calculDecilesRam();
if ($notes_auto->uptadeNotesBatteries($note_batterie)) {
	header("Location: ?page=admin");
	exit;
}
$notes_auto->is_batt_existing(17);