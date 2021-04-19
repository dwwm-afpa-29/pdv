<?php

class adminService {

    private $adminDao;

    public function __construct()  {

        $this->adminDao = new adminDao();
    }

    public function customerList() {

        $customerList = $this->adminDao->customerList();
        //print_r($customerList);
        return $customerList;
    }

    public function customerSelectByAdmin($id) {
        $customerSelectByAdmin = $this->adminDao->customerSelectByAdminDAO($id);

        return $customerSelectByAdmin;
    }

    public function updateUserProfileByAdmin($user) {
        $userUpdate = $this->adminDao->updateUserProfileByAdminDAO($user);
    }

    public function deleteUserProfileByAdmin($user) {
        $userDelete = $this->adminDao->deleteUserProfileByAdminDAO($user);
    }
    
    public function orderTraitment($data) {

        $email = $data['data']['email'];
        $items = $data['data']['items']['items'];

        $this->adminDao->orderTraitmentDAO($email, $items);
        
    }
    
   
}