<?php

class AdminDao extends BaseDao {
    
   

    public function customerList(){


        $connex = $this->db->prepare("SELECT * FROM `customer` ORDER BY last_name");
        $connex->execute();

        
        while($customerList = $connex->fetch(\PDO::FETCH_ASSOC)) {
            $customer[] = $customerList;
            //print_r($customer);
        }

        return $customer;

    }

    public function customerSelectByAdminDAO($id){

        $connex = $this->db->prepare("SELECT * FROM `customer` WHERE id = :id");
        $connex->execute([':id' => $id]);
        $customer[] = $connex->fetch(\PDO::FETCH_ASSOC);
        return $customer;
    }

    public function updateUserProfileByAdminDAO($user){
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
            $query->bindValue(':first_name', $user['firstname'], PDO::PARAM_STR);
            $query->bindValue(':last_name', $user['lastname'], PDO::PARAM_STR);
            $query->bindValue(':mail', $user['mail'], PDO::PARAM_STR);
            $query->bindValue(':address_street', $user['street'], PDO::PARAM_STR);
            $query->bindValue(':address_zip_code', $user['zipCode'], PDO::PARAM_STR);
            $query->bindValue(':address_city', $user['city'], PDO::PARAM_STR);
            $query->bindValue(':phone_number', $user['number'], PDO::PARAM_STR);
            $query->bindValue(':date_of_birth', $user['birth'], PDO::PARAM_STR);
            $query->bindValue(':id', $user['id'], PDO::PARAM_INT);
            $query->execute();

            return true;
        } catch(PDOException $ex) {
            return false;
        }



    }
    
}