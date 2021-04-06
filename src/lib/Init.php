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
<<<<<<< HEAD
    'accueil' => URL . 'Accueil/index',
=======
    'accueil' => URL . 'Articles/newArticle',
    'customer_home' => URL . 'Customer/homeCustomer',
    'customer_profile' => URL . 'Customer/profileCustomer',
>>>>>>> Romu
    'inscription_client' => URL . 'Customer/connexCustomer',
    'recup_mot_de_passe' => URL . 'Customer/recoveryPasswordCustomer',
    'nouveau_produit' => URL . 'Articles/newArticle',
    'nouvel_caract' => URL . 'Articles/newCaract'
];

// Lien de formaulaires
const FORM_LINK = [
    'addNewArticle' => URL . 'Articles/addNewArticle',
    'customer_update_profile' => URL . 'Customer/profileCustomer',
    'loadFeatures' => URL . 'Articles/loadFeatures',
    'loadTypeFeatures' => URL . 'Articles/loadTypeFeatures',
    'addNewFeature' => URL . 'Articles/addNewFeature',
    'recoveryCustomer' => URL . 'Customer/recoveryCustomer',
    'recup_lien_mail' => URL . 'linkRecoveryPasswordCustomer',
    'recoveryPasswordCustomer' => URL . 'Customer/recoveryPasswordCustomer',
    'signinCustomer' => URL . 'Customer/signinCustomer',
    'signupCustomer' => URL . 'Customer/signupCustomer'
];

/**************** Inclusion de fichiers ***************************************/
// Autoloader
require(BACK_ROOT . '/lib/Autoloader.php');