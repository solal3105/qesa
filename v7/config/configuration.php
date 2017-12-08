<?php

// Accès base de données
//const BD_HOST = 'localhost';
//const BD_DBNAME = 'qeza_tests';
//const BD_USER = 'root';
//const BD_PWD = '';
const BD_HOST = 'db700643069.db.1and1.com';
const BD_DBNAME = 'db700643069';
const BD_USER = 'dbo700643069';
const BD_PWD = '1solal3105';

//Langues
const LANG ='FR-fr';

//dossiers racines du site
define('PATH_CONTROLLERS','./controllers/');
define('PATH_ASSETS','./assets/');
define('PATH_LIB','./lib/');
define('PATH_MODELS','./models/');
define('PATH_VIEWS','./views/');
define('PATH_ENTITY', './entity/');

//sous dossiers
define('PATH_SCRIPTS',PATH_ASSETS.'scripts/');
define('PATH_CSS', PATH_ASSETS.'css/');
define('PATH_IMAGES', PATH_ASSETS.'images/');
define('PATH_LOGO', PATH_IMAGES.'logo.png');
define('PATH_MENU', PATH_VIEWS.'menu.php');