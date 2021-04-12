<?php

class AdminDao extends BaseDao {
    
   

    public function customerList(){


        $connex = $this->db->prepare("SELECT * FROM `customer` GROUP BY last_name");
        $connex->execute();

        
        while($customerList = $connex->fetch(\PDO::FETCH_ASSOC)) {
            $customer[] = $customerList;
            //print_r($customer);
        }

        return $customer;

    }
}