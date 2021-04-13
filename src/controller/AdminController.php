<?php

class AdminController{
    private $adminService;

    public function __construct(){
        $this->adminService = new AdminService();
    }
    
        
    public function homeAdmin(){
        ob_start();
        require_once(BACK_ROOT . '/views/ViewHomeAdmin.php');
        $view = ob_get_clean();

        require_once(BACK_ROOT . '/views/template.php');
    }

    public function customerList(){
        ob_start();

        $customerList = $this->getAllCustomer();
        $customer = $this->getOneCustomer();
        require_once(BACK_ROOT . '/views/ViewCustomerList.php');
        $view = ob_get_clean();

        require_once(BACK_ROOT . '/views/template.php');
    }

    
    public function adminCommandeToDo() {
        ob_start();
        require_once(BACK_ROOT . '/views/ViewAdminCommandeToDo.php');
        $view = ob_get_clean();

        require_once(BACK_ROOT . '/views/template.php');
    }

    public function adminCommandeDone() {
        ob_start();
        require_once(BACK_ROOT . '/views/ViewAdminCommandeDone.php');
        $view = ob_get_clean();

        require_once(BACK_ROOT . '/views/template.php');
    }

    public function adminProductManagement() {
        ob_start();
        require_once(BACK_ROOT . '/views/ViewAdminProductManagement.php');
        $view = ob_get_clean();

        require_once(BACK_ROOT . '/views/template.php');
    }

    public function adminProfile() {
        ob_start();
        require_once(BACK_ROOT . '/views/ViewAdminProfile.php');
        $view = ob_get_clean();

        require_once(BACK_ROOT . '/views/template.php');
    }



    public function getAllCustomer () {
        return $this->adminService->customerList();
    }

    public function getOneCustomer(){

        $explode = explode('/', $_GET['p']);
        
        if (isset($explode['2'])){
            $id = $explode['2'];
    
            return $this->adminService->customerSelectByAdmin($id);
        }
        
    }

}
