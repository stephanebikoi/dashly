<?php
use App\Autoloader;
use App\Core\Main;

// on defini une constante contenant le dossier racine du projet
define ('ROOT', dirname(__DIR__));
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . '/');
//define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . '/');
// on importe l'autoloader
require_once ROOT.'/Autoloader.php';
Autoloader::register();

// on instancie main (routeur)
$app = new Main();

//on demare l'application 
$app->start();