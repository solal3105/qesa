<?php require_once(PATH_VIEWS.'header.php');?>
	<link href="<?= PATH_CSS ?>personas.css" rel="stylesheet">
</head> 

<!--  Début de la page -->
<body>
<div id="colonne_gauche">
	<div id="espacement"></div>
	<img src="assets\images\logo_grand_transparent.png" id="logo">
	<div id="espacement"></div>
	<a href="#" class="btn_secondaire">la photographie</a><br>
	<a href="#" class="btn_secondaire">l'autonomie</a><br>
	<a href="#" class="btn_secondaire">les performances</a>
	<a href="#" class="btn_secondaire">Recherche personalisé</a>
</div>
<div id="colonne_droite">
	<h1>Il vous reste X points a attribuer</h1>
	<h2>Photographie</h2>
	<input type="range" name="" value="<?= $_SESSION['photographie']; ?>" min="0" max="10">
	<h2>Performance</h2>
	<input type="range" name="" value="<?= $_SESSION['performance']; ?>" min="0" max="10">
	<h2>Autonomie</h2>
	<input type="range" name="" value="<?= $_SESSION['autonomie']; ?>" min="0" max="10">
	<a href="#" class="btn_principal">Recherche personalisé</a>
</div>



<!--  Fin de la page -->

</body>
<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php'); 
