	<table>
		<tr>
			<td>Fabricant</td>
			<td>modele</td>
			<td>annee de sortie</td>
			<td>masse</td>
			<td>taille</td>
		</tr>
<?php
foreach ($tel as $key => $value) {?>
		<tr>
			<td><?=$value['Fabricant']?></td>
			<td><?=$value['modele']?></td>
			<td><?=$value['annee_sortie']?></td>
			<td><?=$value['masse']."g"?></td>
			<td><?=$value['taille_ecran']."\""?></td>
		</tr>
<?php }
	?></table>