<?php
function afficherHeaderPublic($nomPage){
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $nomPage ?></title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
        <link rel="stylesheet" href="http://cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
        <link rel="stylesheet" type="text/css" href="/pages/style/style.css">
    </head>

<?php
    }
function afficherMenuPublic($nomPage){
?>
    <nav>
        <ul>
            <li>
                <a href="/index.php"> Home </a>
            </li>

            <li>
                <a href="/pages/admin/login.php"> Admin </a>
            </li>
        </ul>
    </nav>

    <body>
    <?php
}


function afficherFooterPublic(){
    ?>
    </body>
    </html>
    <?php
}