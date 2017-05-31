
<?php
function afficherMenuAdmin(){
    ?>
    <nav>
        <ul>
            <li>
                <a href="/qeza/QezaAlgo/index.php"> Retour au site </a>
            </li>

            <li>
                <a href="/qeza/QezaAlgo/pages/admin/add.php"> Ajout dans la bdd </a>
            </li>

            <li>
                <a href="/qeza/QezaAlgo/pages/admin/modif.php"> Modification dans la bdd </a>
            </li>

            <li>
                <a href="/qeza/QezaAlgo/pages/admin/suppr.php"> Suppression dans la bdd </a>
            </li>
        </ul>
    </nav>
    <?php
}
?>