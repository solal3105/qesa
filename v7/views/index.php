<?php
/*
 * DS PHP
 * Vue page index - page d'accueil
 *
 * Copyright 2016, Eric Dufour
 * http://techfacile.fr
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 *
 */
//  En tête de page
?>
<?php require_once(PATH_VIEWS.'header.php');?>

<!--  Début de la page -->
<body>
	<div id="colonne_gauche">
	<h1>Qeza</h1>
<!--  Sliders -->
	<label>Performances
		<br>
		<input type="range" name="" min="0" max="10">
	</label>
	<br>
	<label>Batterie
		<br>
		<input type="range" name="" min="0" max="10">
	</label>
	<br>
	<label>Photos
		<br>
		<input type="range" name="" min="0" max="10">
	</label>
	<br>
	<label>Budget
		<br>
		<input type="number" name="" min="0" max="1500">
	</label>
	<br>
	<input type="submit" name="" value="Rechercher">
	</div>
<!--  Fin de la page -->


<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php'); 
