<?php
/*
 * DS PHP
 * Vue Entete HTML du site
 *
 * Copyright 2017, Eric Dufour
 * http://techfacile.fr
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 *
 */
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?= TITRE ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="Language" content="<?= LANG ?>"/>
		<meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1; user-scalable=0"/>

        <link href="<?= PATH_CSS ?>bootstrap.css" rel="stylesheet">
        <link href="<?= PATH_CSS ?>css.css" rel="stylesheet">
        <link href="<?= PATH_CSS ?>css_tar.css" rel="stylesheet">

        <!-- Google Fonts -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
        <!-- CSS Reset -->
        <link rel="stylesheet" href="http://cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
        <!-- Milligram CSS minified -->
        <link rel="stylesheet" href="http://cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">




	</head>
	<body>


		<!-- En-tête -->
		<header class="header">
			<section class="container" >
				<div class = "row">
					<div class="col-md-10 col-sm-10 col-xs-12">
						<h2><?= TITRE ?></h2>
					</div>
				</div>
			</section>
		</header>

        <section>
            <div>



