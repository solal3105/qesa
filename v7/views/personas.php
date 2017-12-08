<?php require_once(PATH_VIEWS.'header.php');?>
	<link href="<?= PATH_CSS ?>personas.css" rel="stylesheet">
</head> 
<!--  Début de la page -->
<body onload="calcPts('op1','op2','op3','result');">
<div id="colonne_gauche">
	<div id="espacement"></div>
	<a href="#">
		<img src="assets\images\logo_grand_transparent.png" id="logo">
	</a>
	<form method="post" action="?page=personas" id="formulaire">
		<input type="button" class="btn-hover btn_secondaire" value="la photographie"  name="photographie" onclick="subForm(1);">
		<input type="button" class="btn-hover btn_secondaire" value="l'autonomie" name="autonomie" onclick="subForm(2);">
			<input type="button" class="btn-hover btn_secondaire" value="la performance" name="performance" onclick="subForm(3);">
			<input type="button" class="btn-hover btn_secondaire" value="Sans préférences" name="personnalise" onclick="subForm(4);">
		<input type="hidden" name="persona" value="<?= $_POST['persona'] ?>" id="persona">
	</form>
</div>
<div id="colonne_droite">
	<h1>Il vous reste <input name="sum" value="0" id="result" size="1" readonly> points</h1>
	<form method="post" action="?page=resultats">
	<h2><i class="fa fa-camera" aria-hidden="true"></i> Photographie</h2>
     <input name="photo" id="op1" value="<?= $_SESSION['photographie']; ?>" onChange="calc(this.value,'op2','op3','result')" type="range" min="0" max="10" data-highlight="true"> 
	<h2><i class="fa fa-bolt" aria-hidden="true"></i> Performance</h2>
     <input name="perf" value="<?= $_SESSION['performance']; ?>" id="op2" onChange="calc(this.value,'op1','op3','result')" type="range" min="0" max="10" data-highlight="true"> 
	<h2><i class="fa fa-battery-full" aria-hidden="true"></i> Autonomie</h2>
     <input name="auto" value="<?= $_SESSION['autonomie']; ?>" id="op3" onChange="calc(this.value,'op1','op2','result')" type="range" min="0" max="10" data-highlight="true">
 	<div id="espacement"></div>
 	<input type="submit" id="rechercher" value="Lancer la recherche"></input>
 </form>
</div>





<!--  Fin de la page -->

</body>
<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php'); 
