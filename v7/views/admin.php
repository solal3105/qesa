<?php
require_once(PATH_VIEWS."admin_header.php");
require_once(PATH_VIEWS."admin_menu.php");
?>

<h1> Téléphones pertinants</h1>

<section>
<div class="boutons-table">
<form>
	<input type="button" name="previous" value="page précédente" onclick="previousPage();" <?= ($_POST['nbPage'] <= 0) ? "disabled" : "" ?>>
	<input type="button" name="next" value="page suivante" onclick="nextPage();" <?= ($_POST['nbPage'] >= $tailleMax)? 'disabled' : '' ?>>
</form>

</div>
	<table>
		<thead>
			<tr>
				<th>Option</th>
				<?php
				foreach ($colonne as $key1 => $value1) { ?>
					<th>
						<a href="?page=admin&tri=<?= $colonnesBdd[$key1] ?>&keyt=<?= $key1 ?>">
						<?php
						echo $value1;
						if (isset($_GET['keyt']) && $_GET['keyt'] == $key1) { ?>
							<i class="fa fa-chevron-down" aria-hidden="true"></i>
						<?php }
						?>
						</a>
					</th>	
				<?php } ?>
			</tr>
		</thead>
		<tbody>
<?php
foreach ($tel as $key1 => $value1) {
		if (isset($_POST['taille_tab']) && ($key1 < $_POST['nbPage']*$_POST['taille_tab'] || $key1 > $_POST['taille_tab']*($_POST['nbPage']+1))) {
			continue;}
	?>
			<tr <?= ($value1['note'] == 1)? '' : 'class="non_note"' ?> >
			<td>
				<a href="?page=admin_modif&IDtel=<?= $value1['ID'] ?>">
					<img src="<?=PATH_IMAGES?>admin/modifier.png" class="icon-table" alt="icone stylo modifier">
				</a>
				<a href="?page=admin_note&IDtel=<?= $value1['ID'] ?>">
					<img src="<?=PATH_IMAGES?>admin/rating.png" class="icon-table" alt="icone etoile rating">
				</a>
				<i id="suppr" onclick="supprimer(<?= $value1['ID'] ?>, false);">
					<img src="<?=PATH_IMAGES?>admin/delete.png" class="icon-table" alt="icone croix supprimer">
				</i>
			</td>
				<?php
				foreach ($colonnesBdd as $key2 => $value2) { 
					if ($value2 == 'annee_sortie') { ?>
						<td><?= $mois[$value1['mois_sortie']].' '.$value1['annee_sortie'] ?></td>
					<?php } 
					elseif ($value2 == 'OS') { ?>
						<td><?= $value1['OS'].' '.$value1['version_OS'] ?></td>
					<?php }
					else { ?>
						<td><?= $value1[$value2] ?></td>
				<?php }
				} 
				?>
			</tr>
<?php
		if (!isset($_POST['taille_tab']) && $key1 > ($_POST['nbPage']+1)*10) {
			break;
		}
 }
	?>
		</tbody>
	</table>
<div class="boutons-table">
		<form method="POST" id="form_taille">
			<select name="taille_tab" onchange="submitTelForm();" class="sub-table">
				<option <?= (isset($_POST['taille_tab']) && $_POST['taille_tab'] == 10)? 'selected' : '' ?>>10</option>
				<option <?= (isset($_POST['taille_tab']) && $_POST['taille_tab'] == 20)? 'selected' : '' ?>>20</option>
				<option <?= (isset($_POST['taille_tab']) && $_POST['taille_tab'] == 50)? 'selected' : '' ?>>50</option>
				<option <?= (isset($_POST['taille_tab']) && $_POST['taille_tab'] == 100)? 'selected' : '' ?>>100</option>
			</select>
			<input type="hidden" name="nbPage" id="nbPage" value="<?= $_POST['nbPage'] ?>">
			<input type="button" class="sub-table" name="previous" value="page précédente" onclick="previousPage();" <?= ($_POST['nbPage'] <= 0) ? "disabled" : "" ?>>
			<input type="button" name="next" value="page suivante" onclick="nextPage();" class="sub-table" <?= ($_POST['nbPage'] >= $tailleMax)? 'disabled' : '' ?>>
			<input type="text" id="numeroPage" name="numPage" value="<?= $_POST['nbPage'] + 1 ?>" onchange="setPage();" >
		</form>
</div>
</section>
<?php require_once(PATH_VIEWS.'footer.php');