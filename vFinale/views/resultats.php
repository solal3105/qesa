<?php require_once(PATH_VIEWS.'header.php');?>
	<link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
	<link href="<?= PATH_CSS ?>resultats.css" rel="stylesheet">
</head> 
<!--  Début de la page -->
<header>
	<img src="assets\images\logo_grand_transparent.png" id="logo">
</header>
<body>
	<div id="sous_menu">
		<input type="button" class="bouton_sous_menu" value="Modifier les critères"  name="modifier la recherche" id="recherche" onclick="location.href='?page=personas';">
		<div id="budget" class="bouton_sous_menu">
			<p>Budget :</p>
			<input id="inputBudget" type="number" name="budget" onclick="" step="5">
			<i class="fa fa-eur" aria-hidden="true"></i>
		</div>
		<div id="trier" class="bouton_sous_menu">
			<p>Trier par :</p>
			<select name="trier">
				<option value="prix">Prix</option>
				<option value="note" selected>Note</option>
			</select>
		</div>
	</div>
<div id="conteneur">
		<?php
		foreach ($tel as $key => $value) { ?>

			<div class="telephone telephoneIdentifier" id="tele<?= $value['ID'] ?>" onclick='AfficherCacher("carac<?= $value['ID'] ?>","tele<?= $value['ID'] ?>"); return false'>
			<h2><?= $value['Fabricant'].' '.$value['modele'] ?></h2>

            <!--
			<img src="https://pisces.bbystatic.com/image2/BestBuy_US/images/products/6009/6009680_sd.jpg;maxHeight=1000;maxWidth=1000">
			-->
			<img class="photoPhone" src="<?= PATHS_PHOTOS_PHONES . $value['Fabricant'] . "_" . $value['modele'] . "_hd.jpg" ?>">

			<p class="prix">
				<?php 
				echo $value['prix'];
				echo "€";
				?>
			</p>
			<p class="note"><?= (int)($notesFinales[$value['ID']]*10)/10 ?>/10</p>
			</div>

			<div class="caracteristiques telephone" id="carac<?= $value['ID'] ?>" style="display:none" onclick='AfficherCacher("carac<?= $value['ID'] ?>","tele<?= $value['ID'] ?>"); return false'>
				<button class="close">X</button>
				<h2><?= $value['Fabricant'].' '.$value['modele'] ?></h2>
				<table>
					<tr>
						<td><i class="fas fa-square"></i>RAM</td>
						<td><?= $value['ram'] . " GO"?></td>
					</tr>
					<tr>
						<td><i class="fas fa-rocket"></i>Stockage</td>
						<td><?= $value['memoire'] . " GO"?></td>
					</tr>
					<tr>
						<td><i class="fas fa-bolt"></i>Processeur</td>
						<td><?= $value['cpu'] ?></td>
					</tr>
					<tr>
						<td><i class="fas fa-mobile"></i>écran</td>
						<td><?= $value['taille_ecran'] . ' "' ?></td>
					</tr>
					<tr>
						<td><i class="fas fa-expand-arrows-alt"></i>Ratio</td>
						<td><?= $value['Ratio'] ?></td>
					</tr>
					<tr>
						<td><i class="fas fa-weight"></i>Poids</td>
						<td><?= $value['masse'] . " g"?></td>
					</tr>
				</table>

			</div>
		<?php } ?>
	</div>
	<br />

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">

    function AfficherCacher(carac,tele)
    {
        document.getElementsByClassName("caracteristiques").backgroundColor="red";
        document.getElementById(carac).style.transition = "1s";
        document.getElementById(tele).style.transition = "1s";
        var test = document.getElementById(carac).style.display;

        if (test == "block") //On passe à la page téléphone
        {
            setTimeout(function(){
                document.getElementById(carac).style.display = "none";
                document.getElementById(tele).style.display = "block";
            }, 0);
        }
        else //On pase à la page caracteristique
        {
            setTimeout(function(){
                document.getElementById(carac).style.display = "block";
                document.getElementById(tele).style.display = "none";
            }, 0);
        }
    }

    //Suppression des tels au dessus du budget
    $("#inputBudget").change(function () {
        var budget = parseInt($(this).val());
        console.log(budget);
        $(".telephoneIdentifier").each(function() {
            var prix = parseInt($(this).context.getElementsByClassName("prix")[0].innerHTML.replace('€', '').trim());
            if (prix > budget){
               $(this).hide();
            }
            else {
                $(this).show();
            }
        });
    })



</script>
