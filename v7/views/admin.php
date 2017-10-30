<?php
require_once(PATH_VIEWS."admin_header.php");
require_once(PATH_VIEWS."admin_menu.php");
?>
<div id="tableau-telephones">
<form>
	<input type="button" name="previous" value="page précédente" onclick="previousPage();" <?= ($_POST['nbPage'] <= 0) ? "disabled" : "" ?>>
	<input type="button" name="next" value="page suivante" onclick="nextPage();">
</form>
	<table>
		<thead>
			<tr>
					<th>Option</th>
				<?php
				foreach ($colonne as $key => $value) { ?>
					<th>
						<a href="?page=admin&tri=<?= $value ?>">
						<?php
						echo $value;
						if (isset($_GET['tri']) && $_GET['tri'] == $value) { ?>
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
			<tr>
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
				<?php
				foreach ($colonne as $key2 => $value2) { ?>
					<td><?= $value1[$value2] ?></td>
				<?php } 
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
		<form method="POST" id="form_taille">
			<select name="taille_tab" onchange="submitTelForm();" class="sub-table">
				<option <?= (isset($_POST['taille_tab']) && $_POST['taille_tab'] == 10)? 'selected' : '' ?>>10</option>
				<option <?= (isset($_POST['taille_tab']) && $_POST['taille_tab'] == 20)? 'selected' : '' ?>>20</option>
				<option <?= (isset($_POST['taille_tab']) && $_POST['taille_tab'] == 50)? 'selected' : '' ?>>50</option>
				<option <?= (isset($_POST['taille_tab']) && $_POST['taille_tab'] == 100)? 'selected' : '' ?>>100</option>
			</select>
			<input type="hidden" name="nbPage" id="nbPage" value="<?= $_POST['nbPage'] ?>">
			<input type="button" class="sub-table" name="previous" value="page précédente" onclick="previousPage();" <?= ($_POST['nbPage'] <= 0) ? "disabled" : "" ?>>
			<input type="button" name="next" value="page suivante" onclick="nextPage();" class="sub-table">
			<input type="text" id="numeroPage" name="numPage" value="<?= $_POST['nbPage'] + 1 ?>" onchange="setPage();" >
		</form>
</div>