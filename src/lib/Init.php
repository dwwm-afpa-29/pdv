<?php
/**************** CONSTANTE ***************************************/
// Racine du projet
define('ROOT', dirname(dirname(__DIR__)));

// Racine public
define('PUBLIC_ROOT', ROOT . '/public');

// Racine backend
define('BACK_ROOT', ROOT . '/src');

// Adresse du projet
define('URL', $_SERVER['SCRIPT_NAME'] . '?p=');

// Lien de balise A
const A_LINK = [
    'accueil' => URL . 'Articles/newArticle',
    'inscription_client' => URL . 'FrontCustomer/connexFrontCustomer',
    'recup_mot_de_passe' => URL . 'FrontCustomer/recoveryPasswordFrontCustomer'
];

// Lien de formaulaires
const FORM_LINK = [
    'addNewArticle' => URL . 'Articles/addNewArticle',
    'loadFeatures' => URL . 'Articles/loadFeatures',
    'recoveryBackCustomer' => URL . 'BackCustomer/recoveryBackCustomer',
    'recoveryPasswordBackCustomer' => URL . 'BackCustomer/recoveryPasswordBackCustomer',
    'signinBackCustomer' => URL . 'BackCustomer/signinBackCustomer',
    'signupBackCustomer' => URL . 'BackCustomer/signupBackCustomer'
];

/**************** Inclusion de fichiers ***************************************/
// Autoloader
require(BACK_ROOT . '/lib/Autoloader.php');