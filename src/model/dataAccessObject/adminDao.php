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
                    date_of_birth = :date_of_birth,
                    role_user = :role_user
                WHERE id = :id";

        try {
            $query = $this->db->prepare($sql);
            $query->bindValue(':first_name', $user['first_name'], PDO::PARAM_STR);
            $query->bindValue(':last_name', $user['last_name'], PDO::PARAM_STR);
            $query->bindValue(':mail', $user['mail'], PDO::PARAM_STR);
            $query->bindValue(':address_street', $user['address_street'], PDO::PARAM_STR);
            $query->bindValue(':address_zip_code', $user['address_zip_code'], PDO::PARAM_STR);
            $query->bindValue(':address_city', $user['address_city'], PDO::PARAM_STR);
            $query->bindValue(':phone_number', $user['phone_number'], PDO::PARAM_STR);
            $query->bindValue(':date_of_birth', $user['date_of_birth'], PDO::PARAM_STR);
            $query->bindValue(':role_user', $user['role_user'], PDO::PARAM_STR);
            $query->bindValue(':id', $user['id_user'], PDO::PARAM_INT);
            $query->execute();

            return true;
        } catch(PDOException $ex) {
            return false;
        }



    }

    public function deleteUserProfileByAdminDAO($user){
        $connex = $this->db->prepare("DELETE FROM `customer` WHERE id = :id");
        $connex->execute([':id' => $user['id_user']]);
    }
    

    public function orderTraitmentDAO($email, $items){

        $connex = $this->db->prepare();
    }
}