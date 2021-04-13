<?php

class CustomerDao extends BaseDao {

    public function createCustomerFromFields ($fields): Customer {
        $customer = new Customer ();
        $passwdCrypt = password_hash($fields['passwd'], PASSWORD_BCRYPT);
        $customer   -> setFirstName($fields['first_name'])
                    -> setLastName($fields['last_name'])
                    -> setMail($fields['mail'])
                    -> setPasswd($passwdCrypt)
                    -> setAddressStreet($fields['address_street'])
                    -> setAddressZipCode($fields['address_zip_code'])
                    -> setAddressCity($fields['address_city'])
                    -> setPhoneNumber($fields['phone_number'])
                    -> setDateOfBirth(\DateTime::createFromFormat('Y-m-d',$fields['date_of_birth']));

        return $customer;
        
    }

    //--------------------INSCRIPTION--------------------

    public function signupDAO (Customer $customer) {

        $connex = $this->db->prepare("INSERT INTO customer(id, first_name, last_name, mail, passwd, address_street, address_zip_code, address_city, phone_number, date_of_birth ) 
        VALUES(NULL, :first_name, :last_name, :mail, :passwd, :address_street, :address_zip_code, :address_city, :phone_number, :date_of_birth, customer)");
        
        $res= $connex->execute([
            ':first_name' => $customer->getFirstName(),
            ':last_name' => $customer->getLastName(),
            ':mail' => $customer->getMail(),
            ':passwd' => $customer->getPasswd(),
            ':address_street' => $customer->getAddressStreet(),
            ':address_zip_code' => $customer->getAddressZipCode(),
            ':address_city' => $customer->getAddressCity(),
            ':phone_number' => $customer->getPhoneNumber(),
            ':date_of_birth' => $customer->getDateOfBirth()->format('Y-m-d'),
        ]);
    }



    //--------------------CONNEXION--------------------

    public function signinDAO ($customerMail) {
        $connex = $this->db->prepare("SELECT * FROM `customer` WHERE mail = :customerMail");
        $connex->execute([':customerMail' => $customerMail]);

        return $connex->fetch(\PDO::FETCH_ASSOC);
    }



    //VERIFICATION DE L'EXISTENCE DU MAIL DANS LA BDD

    public function verifExistMailDAO ($customerMail) {
        $connex = $this->db->prepare("SELECT * FROM `customer` WHERE mail = :customerMail");
        $connex->execute([':customerMail' => $customerMail]);
        $result2 = $connex->fetch(\PDO::FETCH_ASSOC);

        if($result2 !== false) {  
         
            return true;
        }else{
            
            return false;
        }
    }

    //--------------------RECOVERY MOT DE PASSE ET SECURITE--------------------
    public function recoveryTrueDAO($customerMail, $codeRecovery){

        $actualTime = time();
        $res= $this->db->prepare("SELECT id FROM `customer` WHERE mail=:customerMail");
        $res->execute([':customerMail' => $customerMail]);
        $res2 = $res->fetch(\PDO::FETCH_ASSOC);
        $id = $res2['id'];


        $connex = $this->db->prepare("INSERT INTO `customer_recovery` (mail, code_recovery, date_time, id_customer) VALUES (:mail, :code_recovery, :actualTime, :id_customer)");

        $connex->execute([
            ':mail'=> $customerMail,
            ':code_recovery'=> $codeRecovery,
            ':actualTime' => $actualTime,
            ':id_customer' => $id
        ]);
    }

    //--------------------TRAITEMENT DU TOKEN ET DE LA DATE----------------------
    public function linkRecoveryDAO($token) {

        $connex= $this->db->prepare("SELECT * FROM `customer_recovery` WHERE code_recovery = :token");
        $connex->execute([':token'=> $token]);
        $res = $connex->fetch(\PDO::FETCH_ASSOC);
        $_SESSION['mail'] = $res['mail'];

        //--------------traitement de la date-------------------------
        $dateActual = time();
        $dateRegister = $res['date_time'];

        if(($dateActual - $dateRegister) > 1800){
            $delete = $this->db->prepare("DELETE FROM `customer_recovery` WHERE mail = :email");
            $delete->execute([':email' => $res['mail']]);
            return null;
        }else{
            return $res;
        }
    }
    //--------------------------MODIFICATION DU MOT DE PASSE

    public function passwordModifiedDAO($passModif) {

        $passwdCrypt = password_hash($passModif, PASSWORD_BCRYPT);
        
        $connex = $this->db->prepare("UPDATE `customer` set passwd = :passModif WHERE mail = :email");
        $connex->execute([
        ':passModif' => $passwdCrypt,
        ':email' => $_SESSION['mail']
        ]);

        $delete = $this->db->prepare("DELETE FROM `customer_recovery` WHERE mail = :email");
        $delete->execute([':email' => $_SESSION['mail']]);

        return true;
    }

    //--------------------------MISE A JOUR DES DONNEES CLIENT
    /**
     * Mise à jour des données client dans la bdd
     * @params array $datas. Nouvelles données
     * @return bool
     */
    public function updateCustomer(array $datas) {
        $sql = "UPDATE customer
                SET first_name = :first_name,
                    last_name = :last_name,
                    mail = :mail,
                    address_street = :address_street,
                    address_zip_code = :address_zip_code,
                    address_city = :address_city,
                    phone_number = :phone_number,
                    date_of_birth = :date_of_birth
                WHERE id = :id";

        try {
            $query = $this->db->prepare($sql);
            $query->bindValue(':first_name', $datas['firstname'], PDO::PARAM_STR);
            $query->bindValue(':last_name', $datas['lastname'], PDO::PARAM_STR);
            $query->bindValue(':mail', $datas['mail'], PDO::PARAM_STR);
            $query->bindValue(':address_street', $datas['street'], PDO::PARAM_STR);
            $query->bindValue(':address_zip_code', $datas['zipCode'], PDO::PARAM_STR);
            $query->bindValue(':address_city', $datas['city'], PDO::PARAM_STR);
            $query->bindValue(':phone_number', $datas['number'], PDO::PARAM_STR);
            $query->bindValue(':date_of_birth', $datas['birth'], PDO::PARAM_STR);
            $query->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);
            $query->execute();

            return true;
        } catch(PDOException $ex) {
            return false;
        }
    }

    //--------------------------CREATION DE L'HISTORIQUE D'ACHAT
    /**
     * Récupère toutes les dates à laquelle le client a effectué un achat
     * @return array
     */
    public function getAllDate()  : array {
        $sql = "SELECT DISTINCT commande.date
                FROM commande
                WHERE commande.id_customer = :id";
                
                try {
                    $query = $this->db->prepare($sql);
                    $query->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);
                    $query->execute();
                    $allDates = $query->fetchAll();

                    return  $allDates;
                } catch(PDOException $ex) {
                    return [];
                }
    }
    
}

?>