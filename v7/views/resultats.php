<?php require_once(PATH_VIEWS.'header.php');?>
	<link href="<?= PATH_CSS ?>resultats.css" rel="stylesheet">
</head> 
<!--  Début de la page -->
<header>
	<img src="assets\images\logo_grand_transparent.png" id="logo">
</header>
<body>
	<div id="sous_menu">
		<input type="button" class="bouton_sous_menu" value="Modifier les critères"  name="modifier la recherche" id="recherche">
		<div id="budget" class="bouton_sous_menu">
			<p>Budget :</p>
			<input type="number" name="budget" onclick="" step="5">
			<i class="fa fa-eur" aria-hidden="true"></i>
		</div>
		<div id="trier" class="bouton_sous_menu">
			<p>Trier par :</p>
			<select name="trier" class="">
				<option value="prix">Prix</option>
				<option value="note" selected>Note</option>
			</select>
		</div>
	</div>
<div id="conteneur">

	<?php for ($i=0; $i < 100; $i++) { 
	?>
	<div class="telephone">
		<?php $n=rand(1, 4); ?>
		<h2>Nom du telephone</h2>
		<img src="assets\images\telephone <?php echo $n; ?>.png">
		<p class="prix"><?= 200+rand(1, 800); ?>€</p>
		<p class="note"><?= 100-$i; ?>/100</p>
	</div>
	<?php } ?>
	</div>
</body>
