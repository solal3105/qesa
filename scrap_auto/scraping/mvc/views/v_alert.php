<?php
/*
 * TP PHP
 * Vue alert
 *
 * Copyright 2016, Eric Dufour
 * http://techfacile.fr
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 *
 * alerts: http://www.w3schools.com/bootstrap/bootstrap_alerts.asp
 */

if(isset($_GET['erreur']))
{
    $messageErr = htmlspecialchars($_GET['erreur']);
?>
	<div class="alert alert-danger">
		<strong><?= $messageErr ?></strong>
	</div>
<?php
}

if(isset($_GET['success'])) {
    $messageSucces = htmlspecialchars($_GET['success']);
    ?>
    <div class="alert alert-success">
        <strong><?= $messageSucces ?></strong>
    </div>
    <?php
}
