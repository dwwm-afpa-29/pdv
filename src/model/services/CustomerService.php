<?php

class CustomerService {

    private $customerDao;

    public function __construct() {

        $this->customerDao = new CustomerDao();
    }

    public function signup($customerData) {
        

        $customer = $this->customerDao->createCustomerFromFields($customerData);
        $this->customerDao->signupDAO($customer);

    }


    public function signin($customerMail) {

        $customer = $this->customerDao->signinDAO($customerMail);
        return $customer;
    }

    public function verifExistMail($customerMail) {

        $customer = $this->customerDao->verifExistMailDAO($customerMail);
        return $customer;
    }


    //RECUPERATION DU MOT DE PASSE

    //----------Enregistre dans la BDD le mail et le Token
    public function recoveryTrue($customerMail, $codeRecovery) {
        
        $customer = $this->customerDao->recoveryTrueDAO($customerMail, $codeRecovery);
        return $customer;
    }
    //----------Vérifie la correspondance entre le mail entré et le token du lien
    public function linkRecovery($token) {
        $customer = $this->customerDao->linkRecoveryDAO($token);


        return $customer;
    }


    //MODIFICATION DU MOT DE PASSE

    public function passwordModified($passModif) {
        $confirm = $this->customerDao->passwordModifiedDAO($passModif);
        return $confirm;
    }

    //---------------------reCaptcha---------------------

    public function reCaptchaVerify($customerData) {

        //----------Gestion du recaptcha
        if(empty($customerData['recaptcha-response'])){

            echo ('Salut Postman, tu vas bien ?');
            //header('location: index.php');
        }else{
            //on prépare l'URL en ajoutant 'secret=clé_privée'&'response=clé_publique'
            $url = "https://www.google.com/recaptcha/api/siteverify?secret=6Le0VXgaAAAAAMqJydRyxWaysP2CVRZOjpRt7gNg&response={$_POST['recaptcha-response']}";

            // On vérifie si CURL est installé sur le serveur
            if (function_exists('curl_version')) {
                $curl = curl_init($url);
                curl_setopt($curl, CURLOPT_HEADER, false);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
                $response = curl_exec($curl);
            }else {
                // sinon on utilise file_get_contents
                $response = file_get_contents($url);
            }

            // on vérifie que l'on a une réponse
            if(empty($response) || is_null($response)){

                echo 'problème recaptcha : correspondance des clés incorrecte';

            }else{

                $data = json_decode($response);
                
                return $data;
            }
        }

        
    }
}
?>