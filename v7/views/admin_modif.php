<?php
require_once(PATH_VIEWS."admin_header.php");
require_once(PATH_VIEWS."admin_menu.php");
?>

<div id="formulaire-modif">
	<div id="botons-modif">
	<form method="post">
		<input type="button" name="changer" value="modifier les données" onclick="changement();">
		<input type="button" name="suppr" id="bouton-suppr" value="Supprimer" onclick="supprimer(<?= $idTel ?>);">
	</form>
	</div>
		<form method="post" id="form-general">
		<h3>Général</h3>
			<label for="Fabricant">Marque</label>
			<select name="Fabricant">
				<?php foreach ($marques as $key => $value) { ?>
					<option <?= ($value[0] == $tel['Fabricant'])? 'selected' : '' ?>><?= $value[0] ?></option>
				<?php } ?>
			</select>
			<label for="modele">Modèle</label>
			<input type="text" name="modele" value="<?= $tel['modele'] ?>">
			<label>Date de Sortie</label>
			<select name="mois_sortie">
				<?php for ($i = 1; $i <= 12; $i++) { ?>
					<option <?= ($tel['mois_sortie'] == $i)? 'selected' : '' ?>><?= $mois[$i] ?></option>
				<?php } ?>
			</select>
			<input type="number" name="annee_sortie" value="<?= $tel['annee_sortie'] ?>">
		<h3>Dimentions</h3>
			<label for="masse">Masse</label>
			<input type="number" name="masse" value="<?= $tel['masse'] ?>">
			<label for="epaisseur">Epaisseur</label>
			<input type="number" name="epaisseur" value="<?= $tel['epaisseur'] ?>">
			<label for="taille_ecran">Taille de l'écran</label>
			<input type="number" name="taille_ecran" value="<?= $tel['taille_ecran'] ?>">
			<label for="largeur_ecran">Largeur de l'écran</label>
			<input type="number" name="largeur_ecran" value="<?= $tel['largeur_ecran'] ?>">
			<label for="hauteure_ecran">Hauteur de l'écran</label>
			<input type="number" name="hauteure_ecran" value="<?= $tel['hauteure_ecran'] ?>">
		<h3>Caractéristiques techniques</h3>
			<label>Système d'exploitation</label>
			<select name="OS">
				<?php foreach ($OS as $key => $value) { ?>
					<option <?= ($value[0] == $tel['OS'])? 'selected' : '' ?>><?= $value[0] ?></option>
				<?php } ?>
			</select>
			<select name="version_OS">
				<?php foreach ($versions as $key => $value) { ?>
				<option <?= ($value[0] == $tel['version_OS'])? 'selected' : '' ?>><?= $value[0] ?></option>			
				<?php } ?>
			</select>
			<label for="memoire">Mémoire</label>
			<input type="text" name="memoire" value="<?= $tel['memoire'] ?>">
			<label>Processeur</label>
			<select name="cpu">
				<?php foreach ($cpu as $key => $value) { ?>
				<option <?= ($value[0] == $tel['cpu'])? 'selected' : '' ?>><?= $value[0] ?></option>			
				<?php } ?>
			</select>
			<label for="ram">Mémoire RAM</label>
			<input type="number" name="ram" value="<?= $tel['ram'] ?>">
			<label for="camera">Camera</label>
			<input type="number" name="camera" value="<?= $tel['camera'] ?>">
			<label for="capacite_batterie">Batterie</label>
			<input type="number" name="capacite_batterie" value="<?= $tel['capacite_batterie'] ?>">
			<select name="type_batterie">
				<?php foreach ($batteries as $key => $value) { ?>
				<option <?= ($value[0] == $tel['type_batterie'])? 'selected' : '' ?>><?= $value[0] ?></option>			
				<?php } ?>
			</select>
			<label>Présence d'un port SD</label>
			<input type="radio" name="carte_SD" value="yes_sd" <?= ($tel['carte_SD'])? 'checked' : '' ?>>Oui<br>
			<input type="radio" name="carte_SD" value="no_sd" <?= (!$tel['carte_SD'])? 'checked' : '' ?>>Non
		</form>
</div>
<?php require_once(PATH_VIEWS.'footer.php');