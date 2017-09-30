<?php
require 'Phone.php';
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 26/05/2017
 * Time: 17:42
 */



/**
 * @return PDO
 * Connecte a la base de données retourne le PDO
 */
function connexionBDDWindows(){

    return $bdd = new PDO('mysql:host=localhost;dbname=qeza;charset=utf8', 'root', '');


}

function connexionBDDMac(){
    try
    {
        // On se connecte à MySQL
        return $bdd = new PDO('mysql:host=localhost;dbname=qeza;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
        // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
    }
}

function connexionBDD(){
    if (connexionBDDWindows()){
        return connexionBDDWindows();
    } else{
        connexionBDDMac();
    }
}


/**
 * @param $bdd Objet de type PDO
 */
function lireBDD($bdd){
    $reponse = $bdd->query('SELECT * FROM phone');
    ?>
    <h2> Téléphones présent dans la base : </h2>
    <table>
        <tr>
            <th> Marque  </th>
            <th> Modèle  </th>
            <th> Prix    </th>
        </tr>
        <?php
        while ($donnees = $reponse->fetch())
        {
            ?> <tr> <?php
            ?> <td> <?php
                echo $donnees['marquePhone'];
                ?> </td> <?php

            ?> <td> <?php
                echo $donnees['modelePhone'];
                ?> </td> <?php

            ?> <td> <?php
                echo $donnees['prix'];
                ?> </td> <?php
            ?> <tr> <?php
        }
        ?></table><?php
    $reponse->closeCursor();
}




/**
 * @param $a objet Phone
 * @param $b objet Phone
 * @return int
 */
function cmp($a, $b) {
    if ($a->getPoints() == $b->getPoints()) {
        return 0;
    }
    return ($a->getPoints() > $b->getPoints()) ? -1 : 1;
}




/**
 * @param $nb Int : nombre de lignes a afficher
 * @param $tab : arrayObject : tableau contenant les téléphones
 */
function afficheMeilleurs($nb, $tab){
    ?>
    <table>
        <tr>
            <th> Marque  </th>
            <th> Modèle  </th>
            <th> Points</th>
            <th> Prix</th>
        </tr>
    <?php
    $i = 0;
    foreach ($tab as $tel){
        if ($i<$nb){
            ?>
                <tr>
                    <td>
                        <?php echo $tel->getMarque(); ?>
                    </td>
                    <td>
                        <?php echo $tel->getModele(); ?>
                    </td>
                    <td>
                        <?php echo $tel->getPoints(); ?>
                    </td>
                    <td>
                        <?php echo $tel->getPrix(); ?>
                    </td>
                </tr>
            <?php
        }
        $i++;

    }
    ?> </table> <?php
}





/**
 * @param $bdd objet de type PDO
 */
function calculPoints($bdd){
    $listeTels = new ArrayObject();
    if (isset($_POST['boutonValider'])) {
        $perfs = $_POST['perfRange'];
        $photo = $_POST['photoRange'];
        $autonomie = $_POST['batterieRange'];
        $prix = $_POST['prixMax'];

        echo "perfs : " . $perfs . "photo : " . $photo . "autonomie : " . $autonomie;

        $req = $bdd->prepare('SELECT * FROM phone WHERE prix <= ?');
        $req->execute(array($prix));


        while ($donnees = $req->fetch()) {
            $points = $donnees['perfsPhone']*$perfs + $donnees['photoPhone']*$photo + $donnees['batteriePhone']*$autonomie;

            $listeTels->append(new Phone($donnees['marquePhone'],$donnees['modelePhone'],$donnees['perfsPhone'],$donnees['photoPhone'],$donnees['batteriePhone'],$points,$donnees['prix']));
        }
        $req->closeCursor();



        $listeTels->uasort('cmp');
        afficheMeilleurs(3,$listeTels);

    }
}