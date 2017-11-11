<?php
require_once(PATH_VIEWS."admin_header.php");
?>
<body>
	<table>
		<thead>
			<?php foreach ($colonne as $key => $value) { ?>
			<th><?= $value ?></th>
			<?php } ?>
		</thead>
		<tbody>
			<tr><?php
					foreach ($colonne as $key2 => $value2) { ?>
						<td><?= $ligne[$value2] ?></td>
					<?php } ?>
			</tr>
		</tbody>
	</table>

	<form method="post" id="form-note">
		<label>Performances : 
			<input type="number" name="note_performance" value="<?= (isset($note_performance)) ? $note_performance : '' ?>">
		</label>
		<label>Appareil Photo
			<input type="number" name="note_APN" value="<?= (isset($note_APN)) ? $note_APN : '' ?>">
		</label>
		<label>Autonomie
			<input type="number" name="note_autonomie" value="<?= (isset($note_autonomie)) ? $note_autonomie : '' ?>">
		</label>
		<input type="submit" name="confirm" value="noter le téléphone" onclick="confirmer();">
		<input type="hidden" name="conf" id="conf" value="<?= $_POST['conf'] ?>">
	</form>
<?php
require_once(PATH_VIEWS."admin_footer.php");
?>