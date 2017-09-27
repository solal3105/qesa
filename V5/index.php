<!DOCTYPE html>

<html>
	<head>
		<meta content="text/html; charset=utf-8" http-equiv="content-type">
		<link href="style.css" rel="stylesheet" type="text/css">
		<link href="img/favicon.png" rel="icon" type="image/png">
		<title>Kezaco</title>
	</head>

	<body>
		<nav>
			<img id="logo" src="img/vf-ombrage.png">
			<form method="post">
				<ul>
					<li>Photo: <output for="out" name="result1">50</output></li>
					<li style="list-style: none"><input class="range-slider" max="100" min="1" name="Photo" oninput="result1.value=Photo.value" step="1" type="range" value="50">
					</li>
					<li>Batterie : <output for="out" name="result2">50</output></li>
					<li style="list-style: none"><input class="range-slider" max="100" min="1" name="Batterie" oninput="result2.value=Batterie.value" step="1" type="range" value="50">
					</li>
					<li>Performances : <output for="out" name="result3">50</output></li>
					<li style="list-style: none"><input class="range-slider" max="100" min="1" name="Performance" oninput="result3.value=Performance.value" step="1" type="range" value="50">
					</li>
					<li>Ecran : <output for="out" name="result4">50</output></li>
					<li style="list-style: none"><input class="range-slider" max="100" min="1" name="Ecran" oninput="result4.value=Ecran.value" step="0.1" type="range" value="50">
					</li>
					<li>Ton budget ?</li>
					<li style="list-style: none"><input max="1000" min="1" name="Prix" oninput="result5.value=Prix.value" type="number" value="500"> <output for="out" name="result5"></output>€<br>
					<br>
					<input type="submit" value="Valider"></li>
				</ul>
			</form>
		</nav>

		<div id="content">
		<?php
			$bdd = new PDO('mysql:host=localhost;dbname=keza;charset=utf8', 'root', '');
			$reponse = $bdd->query('SELECT * FROM phone');
			$meilleur_score =0;
			$meilleur_id =0;
			$meilleur_performance =0;
			$meilleur_batterie =0;
			$meilleur_ecran =0;
			$meilleur_photo = 0;
			$meilleur_marque = 0;
			$meilleur_modele = 0;
			$meilleur_prix = 0;
			$meilleur_url = 0;

			while ($donnees = $reponse->fetch()) 
			{
				if ($donnees['prix'] <= $_POST['Prix']) {
					$score = (
						$_POST['Photo'] * $donnees['photo'] +
						$_POST['Performance'] * $donnees['performance'] +
						$_POST['Batterie'] * $donnees['batterie'] +
						$_POST['Ecran'] * $donnees['ecran']
					);
					if ( $score > $meilleur_score) {
						$meilleur_score = $score;
						$meilleur_id = $donnees['refPhone'];
						$meilleur_photo = $donnees['photo'];
						$meilleur_batterie = $donnees['batterie'];
						$meilleur_performance = $donnees['performance'];
						$meilleur_marque = $donnees['marque'];
						$meilleur_modele = $donnees['modele'];
						$meilleur_ecran = $donnees['ecran'];
						$meilleur_prix = $donnees['prix'];
						$meilleur_url = $donnees['url'];

					}
				}
			}
		;?>

		<h1><?php echo $meilleur_marque; ?></h1>
		<h2><?php echo $meilleur_modele; ?></h2>

		<div id="note">
				<img src=<?php echo "\"img/" . $meilleur_url . "\"";?>>
				<?php
					echo "<br>Photo :<br>";
					$i = 1;
					while ($i < $meilleur_photo) {
						echo "<div class=\"cercle\"></div>";
						$i+=1;
					}
					while (10 - $meilleur_photo >0) {
						$meilleur_photo=$meilleur_photo + 1;
						echo "<div class=\"cercleblanc\"></div>";
					}
					echo "<br>Batterie:<br>";
					$i = 1;
					while ($i < $meilleur_batterie) {
						echo "<div class=\"cercle\"></div>";
						$i+=1;
					}
					while (10 - $meilleur_batterie >0) {
						$meilleur_batterie=$meilleur_batterie + 1;
						echo "<div class=\"cercleblanc\"></div>";
					}
					echo "<br>Performances:<br>";
					$i = 1;
					while ($i < $meilleur_performance) {
						echo "<div class=\"cercle\"></div>";
						$i+=1;
					}
					while (10 - $meilleur_performance >0) {
						$meilleur_performance=$meilleur_performance + 1;
						echo "<div class=\"cercleblanc\"></div>";
					}
					echo "<br>Ecran:<br>";
					$i = 1;
					while ($i < $meilleur_ecran) {
						echo "<div class=\"cercle\"></div>";
						$i+=1;
					}
					while (10 - $meilleur_ecran >0) {
						$meilleur_ecran=$meilleur_ecran + 1;
						echo "<div class=\"cercleblanc\"></div>";
					}
				?>
			</div>
		</div>
	</body>
</html>