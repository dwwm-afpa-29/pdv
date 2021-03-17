<?php
session_start();

// Inclusion du fichier Init.php (paramètres du programme)
require(dirname(__DIR__) . '/src/lib/Init.php');

use app\src\lib\Autoloader;
use app\src\lib\Rooter;

// Appel à l'autoloader
Autoloader::autoload();

//require_once(BACK_ROOT . '/lib/Rooter.php');

// Instanciation du rooter
$rooter = new Rooter($_GET);
$rooter->getRoot();
