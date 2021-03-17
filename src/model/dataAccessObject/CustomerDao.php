<?php

class CustomerDao extends BaseDao {

    public function createCustomerFromFields ($fields): Customer {
        $customer = new Customer ();
        $passwdCrypt = password_hash($fields['passwd'], PASSWORD_BCRYPT);
        $customer   -> setId($fields['id'])
                    -> setFirstName($fields['first_name'])
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

        $connex = $this->db->prepare("INSERT INTO customer(first_name, last_name, mail, passwd, address_street, address_zip_code, address_city, phone_number, date_of_birth) 
        VALUES(:first_name, :last_name, :mail, :passwd, :address_street, :address_zip_code, :address_city, :phone_number, :date_of_birth)");
        
        $res= $connex->execute([
            ':first_name' => $customer->getFirstName(),
            ':last_name' => $customer->getLastName(),
            ':mail' => $customer->getMail(),
            ':passwd' => $customer->getPasswd(),
            ':address_street' => $customer->getAddressStreet(),
            ':address_zip_code' => $customer->getAddressZipCode(),
            ':address_city' => $customer->getAddressCity(),
            ':phone_number' => $customer->getPhoneNumber(),
            ':date_of_birth' => $customer->getDateOfBirth()->format('Y-m-d')
        ]);
    }



    //--------------------CONNEXION--------------------

    public function signinDAO ($customerMail) {
        $connex = $this->db->prepare("SELECT * FROM `customer` WHERE mail = :customerMail");
        $result = $connex->execute([':customerMail' => $customerMail]);

        return $connex->fetch(\PDO::FETCH_ASSOC);
    }



    //--------------------RECOVERY MOT DE PASSE ET SECURITE--------------------

    public function recoveryDAO ($customerMail) {
        $connex = $this->db->prepare("SELECT * FROM `customer` WHERE mail = :customerMail");
        $result = $connex->execute([':customerMail' => $customerMail]);
        $result2 = $connex->fetch(\PDO::FETCH_ASSOC);

        if($result2 !== false) {  
         
            return true;
        }else{
            
            return false;
        }
    }

    public function recoveryTrueDAO($customerMail, $codeRecovery){
        print_r($codeRecovery);
        $connex = $this->db->prepare("INSERT INTO `customer_recovery` (mail, code_recovery) VALUES (:mail, :code_recovery)");
        $res = $connex->execute([
            ':mail'=> $customerMail,
            ':code_recovery'=> $codeRecovery
        ]);
    }
}

?>