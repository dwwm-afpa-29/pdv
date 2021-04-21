<?php

class AdminController extends AccueilController{
    private $adminService;

    public function __construct(){
        parent::__construct();
        $this->adminService = new AdminService();
    }
    
        
    public function homeAdmin(){
        ob_start();
        require_once(BACK_ROOT . '/views/ViewHomeAdmin.php');
        parent::index();
    }

    public function customerList($params){
        ob_start();

        $customerList = $this->getAllCustomer();
        $customer = $this->getOneCustomer($params);
        require_once(BACK_ROOT . '/views/ViewCustomerList.php');
        parent::index();
    }

    
    public function adminCommandeToDo() {
        ob_start();
        require_once(BACK_ROOT . '/views/ViewAdminCommandeToDo.php');
        parent::index();
    }

    public function adminCommandeDone() {
        ob_start();
        require_once(BACK_ROOT . '/views/ViewAdminCommandeDone.php');
        parent::index();
    }

    public function adminProductManagement() {
        ob_start();
        require_once(BACK_ROOT . '/views/ViewAdminProductManagement.php');
        parent::index();
    }

    public function adminProfile() {
        ob_start();
        require_once(BACK_ROOT . '/views/ViewAdminProfile.php');
        parent::index();
    }

    public function getAllCustomer () {
        return $this->adminService->customerList();
    }

    public function getOneCustomer($params){
        
        if (isset($params['0'])){
            $id = $params['0'];
    
            return $this->adminService->customerSelectByAdmin($id);
        }
        
    }

    public function validModifCustomerByAdmin(){
        
        ob_start();

        $_POST= array_map('htmlspecialchars', $_POST);
        $user = $_POST;
        print_r($_POST);


            if (isset($_POST['first_name']) && !empty($_POST['first_name']) &&
            isset($_POST['last_name']) && !empty($_POST['last_name']) &&
            isset($_POST['mail']) && !empty($_POST['mail']) &&
            isset($_POST['address_street']) && !empty($_POST['address_street']) &&
            isset($_POST['address_zip_code']) && !empty($_POST['address_zip_code']) &&
            isset($_POST['address_city']) && !empty($_POST['address_city']) &&
            isset($_POST['phone_number']) && !empty($_POST['phone_number']) &&
            isset($_POST['date_of_birth']) && !empty($_POST['date_of_birth'])
            ){
                if(isset($_POST['modifier'])){
                    $this->adminService->updateUserProfileByAdmin($user);
                    header('location:' . A_LINK['customer_list']);
                }else{
                    $this->adminService->deleteUserProfileByAdmin($user);
                    header('location:' . A_LINK['customer_list']);
                }

            }
            require_once(BACK_ROOT . '/views/ViewCustomerList.php');
            parent::index();
    }

    public function orderTraitment() {
        
        ob_start();
        $_SESSION['data'] = $_POST['data'];


        // traitement de l'email de commande
        $this->adminService->orderTraitment($_POST['data']);

        


            // Pour les articles
        //$_POST['data']['items']['items']
        //->foreach id et quantity

            // Pour les clients
        //$_POST['data']['email']


        
        require_once(BACK_ROOT . '/views/viewProducts.php');  
        parent::index();
    }

    

}

