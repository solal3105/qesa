
<?php require_once(PATH_VIEWS.'header.php');?>

<!--  Début de la page -->
<body>

	<div id="colonne_gauche">
	<img src="<?= PATH_ASSETS ?>images/logo.png" id="logo">
<!--  Sliders -->
	<form method="post">
		<br>
		<label>Performance
			<br>
			<input type="range" name="performance" min="0" max="10">
			
		</label>
		<br>
		<label>Batterie
			<br>
			<input type="range" name="Batterie" min="0" max="10">
		</label>
		<br>
		<label>Photos
			<br>
			<input type="range" name="photo" min="0" max="10">
		</label>
		<br>
		<label>Budget
			<br>
			<input type="number" name="budget" min="0" max="1500">
		</label>
		<br>
		<input type="submit" value="Rechercher">
		</form>
	</div>
<!--  Fin de la page -->


<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php'); 
