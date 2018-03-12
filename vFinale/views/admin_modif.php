<?php
require_once(PATH_VIEWS."admin_header.php");
require_once(PATH_VIEWS."admin_menu.php");
?>

<div id="formulaire-modif">
	<form method="post">
		<input type="button" name="changer" value="modifier les données" onclick="changement();" class="btn_fixed">
		<input type="button" name="suppr" id="bouton-suppr" value="Supprimer" onclick="supprimer(<?= $idTel ?>);" class="btn_fixed">
	</form>
	<h1><?= $tel['Fabricant'].' '.$tel['modele'] ?></h1>
	<form method="post" id="form-general">
		<h3>Général</h3>
		<table>
			<tr>
				<td>Marque</td>
				<td colspan="2">
					<select name="Fabricant">
						<?php foreach ($marques as $key => $value) { ?>
							<option <?= ($value[0] == $tel['Fabricant'])? 'selected' : '' ?>><?= $value[0] ?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Modèle</td>
				<td colspan="2">
					<input type="text" name="modele" value="<?= $tel['modele'] ?>">
				</td>
			</tr>
			<tr>
				<td>Date de sortie</td>
				<td>
					<select name="mois_sortie">
						<?php for ($i = 1; $i <= 12; $i++) { ?>
							<option <?= ($tel['mois_sortie'] == $i)? 'selected' : '' ?>><?= $mois[$i] ?></option>
						<?php } ?>
					</select>
				</td>
				<td>		
					<input type="number" name="annee_sortie" value="<?= $tel['annee_sortie'] ?>">
				</td>
			</tr>
			<tr>
				<td> Prix </td>
                <td colspan="2">
                    <input type="text" name="prix" value="<?= $tel['prix'] ?>">
                </td>

			</tr>
		</table>
		<h3>Dimensions</h3>
		<table>
			<tr>
				<td>Masse</td>
				<td colspan="2">
					<input type="number" name="masse" value="<?= $tel['masse'] ?>">
				</td>
			</tr>
			<tr>
				<td>Epaisseur</td>
				<td colspan="2">
					<input type="number" name="epaisseur" value="<?= $tel['epaisseur'] ?>">
				</td>
			</tr>
			<tr>
				<td>Taille de l'ecran</td>
				<td colspan="2">
					<input type="number" name="taille_ecran" value="<?= $tel['taille_ecran'] ?>">
				</td>
			</tr>
			<tr>
				<td>Hauteur x largeur</td>
				<td>
					<input type="number" name="hauteure_ecran" value="<?= $tel['hauteure_ecran'] ?>">
				</td>
				<td>
					<input type="number" name="largeur_ecran" value="<?= $tel['largeur_ecran'] ?>">
				</td>
			</tr>
		</table>			
		<h3>Caractéristiques techniques</h3>
		<table>
			<tr>
				<td>Système d'exploitation</td>
				<td>
					<select name="OS">
						<?php foreach ($OS as $key => $value) { ?>
							<option <?= ($value[0] == $tel['OS'])? 'selected' : '' ?>><?= $value[0] ?></option>
						<?php } ?>
					</select>
				</td>
				<td>
					<select name="version_OS">
						<?php foreach ($versions as $key => $value) { ?>
							<option <?= ($value[0] == $tel['version_OS'])? 'selected' : '' ?>><?= $value[0] ?></option>	
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Mémoire</td>
				<td colspan="2">
					<input type="text" name="memoire" value="<?= $tel['memoire'] ?>">
				</td>
			</tr>
			<tr>
				<td>Processeur</td>
				<td colspan="2">
					<select name="cpu">
						<?php foreach ($cpu as $key => $value) { ?>
							<option <?= ($value[0] == $tel['cpu'])? 'selected' : '' ?>><?= $value[0] ?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Mémoire RAM</td>
				<td colspan="2">
					<input type="number" name="ram" value="<?= $tel['ram'] ?>">
				</td>
			</tr>
			<tr>
				<td>Caméra</td>
				<td colspan="2">
					<input type="number" name="camera" value="<?= $tel['camera'] ?>">
				</td>
			</tr>
			<tr>
				<td>Batterie</td>
				<td>
					<input type="number" name="capacite_batterie" value="<?= $tel['capacite_batterie'] ?>">
				</td>
				<td>
					<select name="type_batterie">
						<?php foreach ($batteries as $key => $value) { ?>
						<option <?= ($value[0] == $tel['type_batterie'])? 'selected' : '' ?>><?= $value[0] ?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Présence d'un port SD</td>
				<td>
					<input type="radio" name="carte_SD" value="yes_sd" <?= ($tel['carte_SD'])? 'checked' : '' ?>>Oui
					<input type="radio" name="carte_SD" value="no_sd" <?= (!$tel['carte_SD'])? 'checked' : '' ?>>Non
				</td>
			</tr>
		</table>
	</form>
</div>
<?php require_once(PATH_VIEWS.'footer.php');