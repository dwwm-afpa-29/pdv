<?php

use app\src\lib\Autoloader;
use app\src\lib\Rooter;

require(dirname(__DIR__) . '/Init.php');
Autoloader::autoload();

$controller = new $_POST['controller']();
$action = $_POST['action'];
$data = [];
foreach($_POST as $key => $uneData){
    if($key != 'controller' && $key != 'action'){
        $data[$key]=$uneData;
    }
}

print_r($data);
$controller->$action($data);

?>