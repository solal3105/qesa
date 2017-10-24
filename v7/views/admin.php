<?php
require_once(PATH_VIEWS."admin_header.php");
require_once(PATH_VIEWS."admin_menu.php");
?>
<div id="tableau-telephones">
	<table>
		<thead>
			<tr>
				
				<th>Fabricant</th>
				<th>Modele</th>
				<th>Annee de sortie</th>
				<th>Masse</th>
				<th>Taille</th>
				<th>Options</th>
			</tr>
		</thead>
		<tbody>
<?php
foreach ($tel as $key => $value) {?>
			<tr>
				<td><?=$value['Fabricant']?></td>
				<td><?=$value['modele']?></td>
				<td><?=$value['annee_sortie']?></td>
				<td><?=$value['masse']."g"?></td>
				<td><?=$value['taille_ecran']."\""?></td>
				<td>
					<a href="">
						<img src="<?=PATH_IMAGES?>admin/modifier.png" class="icon-table" alt="icone stylo modifier">
					</a>
					<a href="?page=admin_note&IDtel=<?= $value['ID'] ?>">
						<img src="<?=PATH_IMAGES?>admin/rating.png" class="icon-table" alt="icone etoile rating">
					</a>
					<a href="">
						<img src="<?=PATH_IMAGES?>admin/delete.png" class="icon-table" alt="icone croix supprimer">
					</a>
				</td>
			</tr>
<?php
		if (isset($_POST['taille_tab']) && $key > $_POST['taille_tab']) {
			break;
		}
		if (!isset($_POST['taille_tab']) && $key > 10) {
			break;
		}
 }
	?>
		</tbody>
	</table>
	<form method="POST" id="form_taille">
		<select name="taille_tab" onchange="document.getElementById('form_taille').submit();">
			<option <?= (isset($_POST['taille_tab']) && $_POST['taille_tab'] == 10)? 'selected' : '' ?>>10</option>
			<option <?= (isset($_POST['taille_tab']) && $_POST['taille_tab'] == 20)? 'selected' : '' ?>>20</option>
			<option <?= (isset($_POST['taille_tab']) && $_POST['taille_tab'] == 50)? 'selected' : '' ?>>50</option>
			<option <?= (isset($_POST['taille_tab']) && $_POST['taille_tab'] == 100)? 'selected' : '' ?>>100</option>
		</select>
	</form>
</div>	