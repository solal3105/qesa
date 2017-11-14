<?php
require_once(PATH_VIEWS."admin_header.php");
require_once(PATH_VIEWS."admin_menu.php");
?>
<body>
	<div  style="max-width: 800px; display: block; margin: auto;">
	<h1><?= $tel['Fabricant'].' '.$tel['modele'] ?></h1>
	<h5><?= $mois_sortie.' '.$tel['annee_sortie'].', '.$tel['memoire'].' GB, '.$tel['taille_ecran'].'"' ?></h5>
	<form method="post" id="form-note" style="max-width: 800px; display: block; margin: auto;">
		<table>
			<thead>
				<th>Caractéristiques</th>
				<th>Note</th>
			</thead>
			<tbody>
				<th colspan="2" style="text-align:center;background-color:silver;">Performances</th>
				<tr>
					<td>Processeur : <?= $tel['cpu'] ?></td>
					<td rowspan="3">
						<input type="number" name="note_performance" id="note_perf" value="<?= (isset($note_performance)) ? $note_performance : '0' ?>" min="0" max="10">
					</td>
				</tr>
				<tr>
					<td>RAM : <?= $tel['ram'] ?> GB</td>
				</tr>
				<tr>
					<td>OS : <?= $tel['OS'] ?> <?= $tel['version_OS'] ?></td>
				</tr>
				<th colspan="2" style="text-align:center;background-color:silver;">Appareil Photo</th>
				<tr>
					<td>Camera : <?= $tel['camera'] ?> Mp</td>
					<td>
						<input type="number" name="note_APN" id="note_APN" value="<?= (isset($note_APN)) ? $note_APN : '0' ?>" min="0" max="10">
					</td>
				</tr>
				<th colspan="2" style="text-align:center;background-color:silver;">Autonomie</th>
				<tr>
					<td>Capacité : <?= $tel['capacite_batterie'] ?> mAh</td>
					<td>
						<input type="number" name="note_autonomie" id="note_auto" value="<?= (isset($note_autonomie)) ? $note_autonomie : '0' ?>" min="0" max="10">
					</td>
				</tr>
			</tbody>
		</table>
		<input type="submit" name="confirm" value="noter le téléphone" onclick="confirmer();">
		<input type="hidden" name="conf" id="conf" value="<?= $_POST['conf'] ?>">
	</form>
	</div>
<?php
require_once(PATH_VIEWS."admin_footer.php");
?>