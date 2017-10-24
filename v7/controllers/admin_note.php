<?php

if (isset($_POST['note_performance'])) $note_preformance = htmlspecialchars($_POST['note_preformance']);
else $note_performance = '';

if (isset($_POST['note_APN'])) $note_APN = htmlspecialchars($_POST['note_APN']);
else $note_APN = '';

if (isset($_POST['note_autonomie'])) $note_autonomie = htmlspecialchars($_POST['note_autonomie']);
else $note_autonomie = '';

require_once(PATH_VIEWS."admin_note.php");