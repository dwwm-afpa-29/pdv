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

            echo 'T\'es un robot';
            //header('location: index.php');
        }else{
            //on prépare l'URL en ajoutant 'secret=clé_privée'&'response=clé_publique'
            $url = "https://www.google.com/recaptcha/api/siteverify?secret=6Le0VXgaAAAAAMqJydRyxWaysP2CVRZOjpRt7gNg&response={$_POST['recaptcha-response']}";

            // On vérifie si CURL est installé sur le serveur
            if (function_exists('curl_version')) {
                $curl = curl_init($url);
                curl_setopt($curl, CURLOPT_HEADER, false);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_TIMEOUT, 1);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
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

    /**
     * Vérification et nettoyage des données du formulaire
     * avant envoie en bdd pour modification des données utilisateur
     * @params array $fields. Données du formulaire
     * @return bool
     */
    public function checkBeforeUpdate(array $fields) : bool {
       // Supprime les caractères html
       $cleanData = [
           'lastname' => htmlspecialchars($fields['last_name']),
           'firstname' => htmlspecialchars($fields['first_name']),
           'mail' => htmlspecialchars($fields['mail']),
           'street' => htmlspecialchars($fields['address_street']),
           'zipCode' => htmlspecialchars($fields['address_zip_code']),
           'city' => htmlspecialchars($fields['address_city']),
           'number' => htmlspecialchars($fields['phone_number']),
           'birth' => htmlspecialchars($fields['date_of_birth'])
       ];

       $checked = true;
       // Si une des donnée est vide on renvoie false
       foreach($cleanData as $data) {
           if($data == '') {
            $checked = false;
           }
       }

       // Mise à jour dans la bdd si pas d'erreur en amont
       if($checked) {
           // Si la mise à jour se passe bien on modifie les infos de session
            if($this->customerDao->updateCustomer($cleanData)) {
                $_SESSION['firstname'] = $cleanData['firstname'];
                $_SESSION['lastname'] = $cleanData['lastname'];
                $_SESSION['mail'] = $cleanData['mail'];
                $_SESSION['street'] = $cleanData['street'];
                $_SESSION['zipCode'] = $cleanData['zipCode'];
                $_SESSION['city'] = $cleanData['city'];
                $_SESSION['phone'] = $cleanData['number'];
                $_SESSION['birth'] = $cleanData['birth'];
            } else {
                $checked = false;
            }
       }

       return $checked;
    }

    //--------------------------CREATION DE L'HISTORIQUE D'ACHAT
    /**
     * Récupère toutes les dates à laquelle le client a effectué un achat
     * @return array
     */
    public function getAllDate()  : array {
        return $this->customerDao->getAllDate();
    }

    /**
     * Récupère une commande que le client a effectué
     * @params int $id. id de la commande
     * @return array
     */
    public function getCommande(int $id)  : array {
        return $this->customerDao->getCommande($id);
    }
}
?>