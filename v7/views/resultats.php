<?php require_once(PATH_VIEWS.'header.php');?>
	<link href="<?= PATH_CSS ?>resultats.css" rel="stylesheet">
</head> 
<!--  Début de la page -->
<header>
	<img src="assets\images\logo_grand_transparent.png" id="logo">
</header>
<body>
	<div id="sous_menu">
		<input type="button" class="btn-hover btn_principal" value="Modifier la recherche"  name="photographie" onclick="">
		<input type="button" class="btn-hover btn_secondaire" value="Budget :"  name="photographie" onclick="">
		<input type="button" class="btn-hover btn_secondaire" value="Trier par :"  name="photographie" onclick="">
	</div>
<body>
	<?php for ($i=0; $i < 100; $i++) { 
	?>
	<div class="telephone">
		<h2>Nom du telephone</h2>
		<img src="assets\images\telephone <?php echo rand(1, 4)  ; ?>.png">
		<p class="prix">499€</p>
		<p class="note">88/100</p>
	</div>
	<?php } ?>
</body>
