<?php

use app\src\lib\Autoloader;
use app\src\lib\Rooter;

require(dirname(__DIR__) . '../Init.php');
Autoloader::autoload();


$aC = new ArticlesController();
$idFeatureType = $_POST['idFeatureType'];
$aC->newCaractInArticleForm($idFeatureType);

?>