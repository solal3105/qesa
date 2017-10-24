<?php
require_once(PATH_VIEWS."admin_header.php");
?>
<body>
	<form method="post">
		<label>Performances : 
			<input type="number" name="note_performance" value="<?= (isset($note_performance)) ? $note_performance : '' ?>">
		</label>
		<label>Appareil Photo
			<input type="number" name="note_APN">
		</label>
		<label>Autonomie
			<input type="number" name="note_autonomie">
		</label>
		<input type="submit" name="confirm" value="ajouter la note">
	</form>
<?php
require_once(PATH_VIEWS."admin_footer.php");
?>