<?php

class AccueilController {
    public function index(){
        ob_start();
        require_once BACK_ROOT  . '/views/accueil.php';
        $view = ob_get_clean();
        require_once(BACK_ROOT . '/views/template.php');
    }
}
?>