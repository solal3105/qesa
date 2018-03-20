<?php require_once(PATH_VIEWS.'header.php');?>
	<link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
	<link href="<?= PATH_CSS ?>resultats.css" rel="stylesheet">
</head> 
<!--  Début de la page -->
<a href="index.php" >
	<img src="<?= PATH_IMAGES ?>logo_grand_transparent.png" id="logo" >
</a>

<body>
	<div id="sous_menu">
		<a href="index.php?page=personas">
			<img id="recherche" src="<?= PATH_IMAGES . "sliders_logo.png" ?>" >
		</a>
		<div id="budget">
			<label>Budget :</label>
			<input type="number" id="inputBudget" name="budget" onclick="" step="50">
			<i class="fa fa-eur" aria-hidden="true"></i>
		</div>
	</div>
<div id="conteneur">
		<?php
		foreach ($tel as $key => $value) { ?>
			<div class="telephone telephoneIdentifier" id="tele<?= $value['ID'] ?>" onclick='AfficherCacher("carac<?= $value['ID'] ?>","tele<?= $value['ID'] ?>"); return false'>
			<h2><?= $value['Fabricant'].' '.$value['modele'] ?></h2>


			<?php 
			if (file_exists(PATHS_PHOTOS_PHONES . $value['Fabricant'] . "_" . $value['modele'] . "_hd.jpg")) {
				?>
					<img class="photoPhone" src="<?= PATHS_PHOTOS_PHONES . $value['Fabricant'] . "_" . $value['modele'] . "_hd.jpg" ?>">
				<?php
			}
			elseif (file_exists(PATHS_PHOTOS_PHONES . $value['Fabricant'] . "_" . $value['modele'] . "_sd.jpg")) {
				?>
					<img class="photoPhone" src="<?= PATHS_PHOTOS_PHONES . $value['Fabricant'] . "_" . $value['modele'] . "_sd.jpg" ?>">
				<?php
			}
			else{
				?>
					<img class="photoPhone" src="<?= PATH_IMAGES . "smartphone-2.png" ?>">
				<?php
			}
			?>
			
			<div class="footerPhone">
				<div class="prix">
				<?php 
				echo $value['prix'];
				echo "€";
				?>
				</div>

				<div class="note"><?= (int)($notesFinales[$value['ID']]*10)/10 ?>/10
				</div>
			</div>
			
			
			</div>
			

			<div class="caracteristiques telephone" id="carac<?= $value['ID'] ?>" style="display:none" onclick='AfficherCacher("carac<?= $value['ID'] ?>","tele<?= $value['ID'] ?>"); return false'>
				<button class="close">X</button>
				<h2><?= $value['Fabricant'].' '.$value['modele'] ?></h2>
				<table>
					<tr>
						<td><i class="fas fa-square"></i>RAM</td>
						<td><?= $value['ram'] . " Go"?></td>
					</tr>
					<tr>
						<td><i class="fas fa-rocket"></i>Stockage</td>
						<td><?= $value['memoire'] . " Go"?></td>
					</tr>
					<tr>
						<td><i class="fas fa-bolt"></i>Processeur</td>
						<td><?= $value['cpu'] ?></td>
					</tr>
					<tr>
						<td><i class="fas fa-mobile"></i>écran</td>
						<td><?= $value['taille_ecran'] . '"' ?></td>
					</tr>
					<tr>
						<td><i class="fas fa-expand-arrows-alt"></i>Ratio</td>
						<td><?= $value['Ratio'] ?></td>
					</tr>
					<tr>
						<td><i class="fas fa-weight"></i>Poids</td>
						<td><?= $value['masse'] . "g"?></td>
					</tr>
					<tr>
						<td><i class="fa fa-eur"></i>prix</td>
						<td><?= $value['prix'] . "€"?></td>
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
    });

window.onscroll = function() {myFunction()};

var header = document.getElementById("sous_menu");
var content = document.getElementById("conteneur");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    header.classList.add("stickyheader");
    content.classList.add("stickycontent");
  } else {
    header.classList.remove("stickyheader");
    content.classList.remove("stickycontent");
  }
}


</script>
