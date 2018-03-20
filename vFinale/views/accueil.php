<?php require_once(PATH_VIEWS.'header.php');?>
	<link href="<?= PATH_CSS ?>accueil.css" rel="stylesheet">
</head> 

<!--  Début de la page -->
<body>

	</div>

<div class="iphone-x">
  <div class="divider"></div>
  <div class="bezel"></div>
  <div class="screen">	<div id="cadre">
		<div id="contenu">
			<img src="assets\images\logo_grand_transparent.png" id="logo">
			<h1>Quel doit être le point fort de votre téléphone ?</h1>
			<form method="post" action="?page=personas" id="formulaire">
				<input type="button" class="btn-hover btn_secondaire" value="la photographie"  name="photographie" onclick="subForm(1);"><br>
				<input type="button" class="btn-hover btn_secondaire" value="l'autonomie" name="autonomie" onclick="subForm(2);"><br>
				<input type="button" class="btn-hover btn_secondaire" value="la performance" name="performance" onclick="subForm(3);">
				<div id="trait"></div>
				<input type="button" value="Sans préférences" name="personnalise" class="btn-hover btn_principal" onclick="subForm(4);">
				<input type="hidden" name="persona" value="<?= $_POST['persona'] ?>" id="persona">
			</form>
		</div></div>
  <div class="speaker"></div>
  <div class="camera"></div>
  <div class="button mute"></div>
  <div class="button vol-up"></div>
  <div class="button vol-down"></div>
  <div class="button right"></div>
</div>

<!--  Fin de la page -->

</body>
<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php'); 
