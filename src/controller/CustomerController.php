<?php

class CustomerController extends AccueilController {

    private $customerService;


    public function __construct() {
        ob_start();
        parent::__construct();
        $this->customerService = new CustomerService();

    }

    public function loginCustomer() {

        ob_start();
        require_once(BACK_ROOT . '/views/viewLoginCustomer.php');
        parent::index();
        
    }

    public function connexCustomer() {

        ob_start();
        require_once(BACK_ROOT . '/views/ViewConnexCustomer.php');
        parent::index();

    }

    public function inscriptCustomer() {

        ob_start();
        require_once(BACK_ROOT . '/views/ViewInscripCustomer.php');
        parent::index();
    }

    public function forgetCustomer() {
        ob_start();
        require_once(BACK_ROOT . '/views/ViewForgetPassCustomer.php');
        parent::index();
    }

    
    /**
     * Génére l'affichage de la page d'accueil client après connexion
     * @return void
     */
    public function homeCustomer() : void {
        ob_start();
        require_once(BACK_ROOT . '/views/ViewHomeCustomer.php');
        parent::index();
    }

    

    /**
     * Génére l'affichage du formulaire de modification de données du client.
     * @params string $state. Défini si il faut afficher la div de message d'erreur ou de succes du 
     * traitement du formulaire
     * @return void
     */
    public function profileCustomer(?string $state = null) : void {
        $showMessage = $state;
        
        if(isset($_POST['modifier'])) {
            $this->updateCustomerProfile();
        } else {
            ob_start();
            require_once(BACK_ROOT . '/views/ViewProfileCustomer.php');
            parent::index();
        }

    }


    /**
     * Génére l'affichage de la page d'historique d'achat
     * @params $params id de la commande à récupérer.
     * @return void
     */
    public function buyHistorical($params) {
        ob_start();
        $allDates = $this->getAllDate();
        $detailCommande = [];
        
        if(isset($params[0])) {
            $id = $params[0];
            $detailCommande = $this->getCommande($id);
        }

        require_once(BACK_ROOT . '/views/ViewBuyHistoricaCustomer.php');
        parent::index();
    }


    //INSCRIPTION DU CLIENT
    /**Vérification de la méthode POST
     * Gestion et vérification du reCaptcha
     * Vérification des champs
     */

    public function signupCustomer() {

        //----------on vérifie si c'est la méthode POST qui est utilisée
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            ob_start();
            
            //----------Nettoyage des données----------
            $_POST= array_map('htmlspecialchars', $_POST);
            $customer = $_POST;

            //----------Gestion du recaptcha 
            $data = $this->customerService->reCaptchaVerify($customer);

            if($data->success) {
                //----------vérification des champs
                if (
                    isset($_POST['first_name']) && !empty($_POST['first_name']) &&
                    isset($_POST['last_name']) && !empty($_POST['last_name']) &&
                    isset($_POST['mail']) && !empty($_POST['mail']) &&
                    isset($_POST['passwd']) && !empty($_POST['passwd']) &&
                    isset($_POST['address_street']) && !empty($_POST['address_street']) &&
                    isset($_POST['address_zip_code']) && !empty($_POST['address_zip_code']) &&
                    isset($_POST['address_city']) && !empty($_POST['address_city']) &&
                    isset($_POST['phone_number']) && !empty($_POST['phone_number']) &&
                    isset($_POST['date_of_birth']) && !empty($_POST['date_of_birth'])
                    ) {

                    //---------Vérification que le mail n'est pas dans la BDD
                    $email = $customer['mail'];
                    $response = $this->customerService->verifExistMail($email);

                    if($response == false){

                        //----------Envoi des données vers SERVICES
                        $this->customerService->signup($customer);

                        $_SESSION['id'] = $customer['id'];
                        $_SESSION['firstname'] = $customer['first_name'];
                        $_SESSION['lastname'] = $customer['last_name'];
                        $_SESSION['mail'] = $email;
                        $_SESSION['street'] = $customer['address_street'];
                        $_SESSION['zipCode'] = $customer['address_zip_code'];
                        $_SESSION['city'] = $customer['address_city'];
                        $_SESSION['phone'] = $customer['phone_number'];
                        $_SESSION['birth'] = $customer['date_of_birth'];


                        unset($_SESSION['post']);
                        unset($_SESSION['error']);

                        header('location:' . A_LINK['customer_home']);


                    }else{
                        echo 'Cette adresse mail est déjà utilisée. Veuillez vous connecter';
                    }

                }else{
                    $_SESSION['post'] = $_POST;
                    $_SESSION['error'] = true;
                    header('location:' . A_LINK['inscription_client']);
                    
                }
            }else{
                echo 'pb de réponse du recaptcha';
            }

        }else {
            http_response_code(405);
            echo 'Méthode non authorisée';
        }

           

            require_once(BACK_ROOT . '/views/viewLoginCustomer.php');
            parent::index();
    }

    //CONNEXION DU CLIENT
    /**
     * 
     */

    public function signinCustomer() {
        ob_start();

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){

            $customerData = $_POST;
            $data = $this->customerService->reCaptchaVerify($customerData);
            

            if($data->success) {

                if(
                    isset($_POST['mail']) && !empty($_POST['mail']) &&
                    isset($_POST['passwd']) && !empty($_POST['passwd'])
                    ) {
                        $email = $_POST['mail'];
                        $customerTrue = $this->customerService->verifExistMail($email);

                        if ($customerTrue == true) {
                            
                            $customer = $this->customerService->signin($email);
                            $passwdCrypt = $customer['passwd'];
                            print_r($customer['role']);

                            if(password_verify($_POST['passwd'], $passwdCrypt)) {

                                $_SESSION['id'] = $customer['id'];
                                $_SESSION['firstname'] = $customer['first_name'];
                                $_SESSION['lastname'] = $customer['last_name'];
                                $_SESSION['mail'] = $email;
                                $_SESSION['street'] = $customer['address_street'];
                                $_SESSION['zipCode'] = $customer['address_zip_code'];
                                $_SESSION['city'] = $customer['address_city'];
                                $_SESSION['phone'] = $customer['phone_number'];
                                $_SESSION['birth'] = $customer['date_of_birth'];
                                $_SESSION['role'] = $customer['role_user'];
                                
                                
                                if ($_SESSION['role'] == 'admin' || $_SESSION['role'] =='employee') {
                                    header('location:' . A_LINK['admin_home']);
                                    
                                }else {
                                    header('location:' . A_LINK['customer_home']);
                                    
                                }
                                
                            }else {
                                echo 'Le mot de passe est incorrect';
                            }
                            
                    }else {
                        echo "<p style = 'color:red'>L\'utilisateur n\'existe pas. Veuillez vous enregistrer.<p>";
                    }


                }else{
                    echo 'Veuillez remplir tous les champs';
                }
            }else{
                echo 'pb de réponse du recaptcha';
            }
        }else{
            http_response_code(405);
        }

        require_once(BACK_ROOT . '/views/viewLoginCustomer.php');
        parent::index();
    }


    //RECUPERATION MOT DE PASSE

    /**
     * 
     */

    public function recoveryCustomer() {
        ob_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){

            $customerData = $_POST;
            $data = $this->customerService->reCaptchaVerify($customerData);
            //var_dump($customerData);

            if($data->success) {

                if(isset($_POST['mail']) && !empty($_POST['mail'])){

                    //Je vérifie si le mail existe dans la bdd
                    $email = $_POST['mail'];
                    $_SESSION['mail'] = $email;
                    $customer = $this->customerService->verifExistMail($email);

                    if($customer == true) {

                        //J'enregistre ce code dans la bdd en le cryptant
                        $string = implode('', array_merge(range('A','Z'), range('a','z'), range('0','9')));
                        $randomStart = random_int(10, 20);
                        $randomEnd = random_int(30, 35);
                        $codeRecovery = substr(str_shuffle($string), $randomStart, $randomEnd);
                        
                        $this->customerService->recoveryTrue($email, $codeRecovery);
                        //Je continue avec l'envoi de mail (sendmail.exe)
                        //Je crée la variable $header pour l'encodage du mail

                        $header="MIME-Version: 1.0\r\n";
                        $header.='From:"dwwm29@mail.com>'."\n";
                        $header.='Content-Type:text/html; charset="utf-8"'."\n";
                        $header.='Content-Transfer-Encoding: 8bit';


                        //je crée le message en HTML pur (peu de boite mail gère le CSS)
                        $message = '
                        <html>
                        <head>
                          <title>Récupération de mot de passe - PiedDeVigne.com</title>
                          <meta charset="utf-8" />
                        </head>
                        <body>
                            <div align="center">
                              <table width="600px">
                                <tr>
                                  <td>
                                    
                                    <div align="center">Bonjour <b>'.$email.'</b>,</div>
                                    Vous avez demandé la réinitialisation de votre mot de passe. </b>
                                    Veuillez suivre ce lien <a href="https://pieddevigne.alwaysdata.net/public/index.php?p=Customer/linkRecoveryPasswordCustomer/'.$codeRecovery.'"> Réinitialiser mon mot de passe </a> </b>
                                    Ce lien est valable pendant une durée de 30 minutes.
                                    
                                  </td>
                                </tr>
                                <tr>
                                  <td align="center">
                                    <font size="2">
                                      Ceci est un email automatique, merci de ne pas y répondre
                                    </font>
                                  </td>
                                </tr>
                              </table>
                            </div>
                          </font>
                        </body>
                        </html>';

                        //envoi du mail
                        mail($email, "Récupération de votre mot de passe sur pieddevigne.com", $message, $header);

                        echo 'Un mail vient de vous être envoyé';
                        $_SESSION = [];
                    }else{
                        echo 'L\'utilisateur n\'existe pas, veuillez vous enregistrer';
                    }
                }
            }else{
                echo 'Pb de réponse du recaptcha';
            }    
        }else{
            http_response_code(405);
        }
        require_once(BACK_ROOT . '/views/viewLoginCustomer.php');
        parent::index();
    }


//RECUPERATION MOT DE PASSE (traitement du lien)

public function linkRecoveryPasswordCustomer(){

    ob_start();
    require_once(BACK_ROOT.'/views/ViewRecoveryPassword.php');
    parent::index();
    if($_SERVER['REQUEST_METHOD'] == 'GET') {

        $explode = explode('/', $_GET['p']);
        $token = $explode['2'];
        $customerData = $this->customerService->linkRecovery($token);
        $_SESSION['mail'] = $customerData['mail'];
    }else{
        http_response_code(405);
    }
    
    
}

//RECUPERATION DU MOT DE PASSE (MODIFICATION ET INSERTION DANS BDD)

public function recoveryPasswordCustomer() {
    ob_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $customerData = $_POST;
        $data = $this->customerService->reCaptchaVerify($customerData);

        if($data->success) {

            if($_POST['mail'] === $_SESSION['mail']){

                $passModif = $_POST['passwd'];
                $confirm = $this->customerService->passwordModified($passModif);

                if($confirm == true) {
                    echo 'Votre mot de passe a bien été modifié, veuillez vous reconnecter.';
                    $_SESSION = [];
                }
            }
            else if(empty($_SESSION['mail'])){

                echo 'Le délai de validité de votre lien provisoire est passé, veuillez renouveler votre demande de changement de mot de passe';
                
            }else{
                echo 'Votre mail ne correspond pas, veuillez réessayer';
            }

        }else{
            echo 'pb de réponse du recaptcha';
        }
    }else{
        http_response_code(405);
    }
        require_once(BACK_ROOT . '/views/ViewConnexCustomer.php');
        parent::index();
}

//DECONNEXION DU CLIENT

public function decoCustomer() {
    ob_start();

    $_SESSION = [];

    header('location:' . A_LINK['accueil']);
}

    /**
     * Modification des données client
     * @return void
     */
    private function updateCustomerProfile() : void {

        $return = ($this->customerService->checkBeforeUpdate($_POST)) ? 'success' : 'fail';
        unset($_POST);
        $this->profileCustomer($return);
        
    }

    //--------------------------CREATION DE L'HISTORIQUE D'ACHAT
    /**
     * Récupère toutes les dates à laquelle le client a effectué un achat
     * @return array
     */
    private function getAllDate()  : array {
        return $this->customerService->getAllDate();
    }

    /**
     * Récupère une commande que le client a effectué
     * @params int $id. id de la commande
     * @return array
     */
    private function getCommande(int $id)  : array {
        return $this->customerService->getCommande($id);
    }
}
?>