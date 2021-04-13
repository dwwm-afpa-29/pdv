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
}