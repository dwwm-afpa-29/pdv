<?php

class BackCustomerController {

    private $customerService;


    public function __construct() {

        $this->customerService = new CustomerService();

    }


    //INSCRIPTION DU CLIENT
    /**Vérification de la méthode POST
     * Gestion et vérification du reCaptcha
     * Vérification des champs
     */

    public function signupBackCustomer($customerData) {

        //----------on vérifie si c'est la méthode POST qui est utilisée
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //----------Gestion du recaptcha 
            $data = $this->customerService->reCaptchaVerify($customerData);

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
                    $email = $customerData['mail'];
                    $response = $this->customerService->recovery($email);

                    if($response == false){

                        //----------Envoi des données vers SERVICES
                        $this->customerService->signup($customerData);
                        echo('envoi réussi');

                    }else{
                        echo ('Cette adresse mail est déjà utilisée. Veuillez vous connecter');
                    }

                }else{
                    echo 'Veuillez remplir tous les champs';
                }
            }else{
                echo 'pb de réponse du recaptcha';
            }

        }else {
            http_response_code(405);
            echo 'Méthode non authorisée';
        }
    }

    //CONNEXION DU CLIENT
    /**
     * 
     */

    public function signinBackCustomer($customerData) {

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){

            $data = $this->customerService->reCaptchaVerify($customerData);
            var_dump($customerData);

            if($data->success) {

                if(
                    isset($_POST['mail']) && !empty($_POST['mail']) &&
                    isset($_POST['passwd']) && !empty($_POST['passwd'])
                    ) {
                        $email = $_POST['mail'];
                        $customer = $this->customerService->signin($email);
                        $passwdCrypt = $customer['passwd'];

                    if ($customer['mail'] == $email) {

                        if(password_verify($_POST['passwd'], $passwdCrypt)) {
                            $_SESSION['mail'] = $email;

                            echo '<pre>';
                            print_r($_SESSION);
                            echo '</pre>';

                            echo 'Connexion réussie !';
                        }else {
                            echo 'Le mot de passe est incorrect';
                        }
                            
                    }else {
                        echo 'L\'utilisateur n\'existe pas. Veuillez vous enregistrer';
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

    }


    //RECUPERATION MOT DE PASSE

    /**
     * 
     */

    public function recoveryBackCustomer($customerData) {

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $data = $this->customerService->reCaptchaVerify($customerData);
            //var_dump($customerData);

            if($data->success) {

                if(isset($_POST['mail']) && !empty($_POST['mail'])){

                    //Je vérifie si le mail existe dans la bdd
                    $email = $_POST['mail'];
                    $customer = $this->customerService->recovery($email);
                    //print_r($customer);

                    if($customer == true) {

                        //je crée un code avec la fonction 'random_int()' (voir doc php pour voir diff avec rand())
                        //J'enregistre ce code dans la bdd en le cryptant
                        $codeRecovery = bin2hex(random_bytes(15));
                        //print_r($codeRecovery);
                        $this->customerService->recoveryTrue($email, $codeRecovery);
                        //print_r("true");

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
                                    Vous avez demandé la réinitialisation de votre mot de passe
                                    Veuillez suivre ce lien <a href="localhost/pieddevigne-1/recoveryPasswordFrontCustomer/'.$codeRecovery.'">pieddevigne.com</a> !
                                    
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
                    }else{
                        echo 'L\'utilisateur n\'existe pas';
                    }
                }
            }else{
                echo 'pb de réponse du recaptcha';
            }    
        }else{
            http_response_code(405);
        }
    }

public function recoveryPasswordBackCustomer($customerData) {
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $data = $this->customerService->reCaptchaVerify($customerData);

    }else{
        http_response_code(405);
    }
}

}
?>