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
    'inscription_client' => URL . 'Customer/connexCustomer',
    'recup_mot_de_passe' => URL . 'Customer/recoveryPasswordCustomer'
];

// Lien de formaulaires
const FORM_LINK = [
    'addNewArticle' => URL . 'Articles/addNewArticle',
    'loadFeatures' => URL . 'Articles/loadFeatures',
    'recoveryCustomer' => URL . 'Customer/recoveryCustomer',
    'recup_lien_mail' => URL . 'linkRecoveryPasswordCustomer',
    'recoveryPasswordCustomer' => URL . 'Customer/recoveryPasswordCustomer',
    'signinCustomer' => URL . 'Customer/signinCustomer',
    'signupCustomer' => URL . 'Customer/signupCustomer'
];

/**************** Inclusion de fichiers ***************************************/
// Autoloader
require(BACK_ROOT . '/lib/Autoloader.php');