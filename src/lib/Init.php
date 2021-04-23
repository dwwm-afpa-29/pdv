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
    'accueil' => URL . 'Articles/afficheAccueil',
    'deconnexion' => URL . 'Customer/decoCustomer',
    'admin_home' => URL . 'Admin/homeAdmin',
    'customer_list' => URL . 'Admin/customerList',
    'admin_commande_to_do' => URL . 'Admin/getOrderToDo',
    'admin_commande_done' => URL . 'Admin/adminCommandeDone',
    'product_management' => URL . 'Admin/adminProductManagement',
    'articles_stockManagement' => URL . 'Articles/stockManagement',
    'admin_profile' => URL . 'Admin/adminProfile',
    'customer_home' => URL . 'Customer/homeCustomer',
    'customer_historical' => URL . 'Customer/buyHistorical',
    'customer_profile' => URL . 'Customer/profileCustomer',
    'login_client' => URL. 'Customer/loginCustomer',
    'connexion_client' => URL . 'Customer/connexCustomer',
    'inscription_client' => URL . 'Customer/inscriptCustomer',
    'oublie_mot_de_passe' => URL . 'Customer/forgetCustomer',
    'recup_mot_de_passe' => URL . 'Customer/recoveryPasswordCustomer',
    'nouveau_produit' => URL . 'Articles/newArticle',
    'nouvel_caract' => URL . 'Articles/newCaract',
    'afficher_produits' => URL . 'Articles/viewProducts',
    'afficher_produits_mobile' => URL . 'Articles/viewProductsMobile',
    'afficher_features_mobile' => URL . 'Articles/viewFeaturesMobile',
    'modifier_article' => URL . 'Articles/modificationArticle'
];

// Lien de formaulaires
const FORM_LINK = [
    'addNewArticle' => URL . 'Articles/addNewArticle',
    'customer_update_profile' => URL . 'Customer/profileCustomer',
    'customer_update_by_admin' => URL . 'Admin/validModifCustomerByAdmin',
    'loadFeatures' => URL . 'Articles/loadFeatures',
    'loadTypeFeatures' => URL . 'Articles/loadTypeFeatures',
    'addNewFeature' => URL . 'Articles/addNewFeature',
    'recoveryCustomer' => URL . 'Customer/recoveryCustomer',
    'recup_lien_mail' => URL . 'linkRecoveryPasswordCustomer',
    'recoveryPasswordCustomer' => URL . 'Customer/recoveryPasswordCustomer',
    'signinCustomer' => URL . 'Customer/signinCustomer',
    'signupCustomer' => URL . 'Customer/signupCustomer',
    'admin_order_completed' => URL . 'Admin/orderTraitment',
    'updateArticle' => URL . 'Article/updateArticle'
];

/**************** Inclusion de fichiers ***************************************/
// Autoloader
require(BACK_ROOT . '/lib/Autoloader.php');