<?php

class AdminController{
    private $adminService;

    public function __construct(){
        /*$this->adminService = new AdminService();*/
    }
    
        
    public function homeAdmin(){
        ob_start();
        require_once(BACK_ROOT . '/views/ViewHomeAdmin.php');
        $view = ob_get_clean();

        require_once(BACK_ROOT . '/views/template.php');
    }

    public function CustomerList(){
        ob_start();
        require_once(BACK_ROOT . '/views/ViewCustomerList.php');
        $view = ob_get_clean();

        require_once(BACK_ROOT . '/views/template.php');
    }
    
    public function AdminCommandeToDo() {
        ob_start();
        require_once(BACK_ROOT . '/views/ViewAdminCommandeToDo.php');
        $view = ob_get_clean();

        require_once(BACK_ROOT . '/views/template.php');
    }

    public function AdminCommandeDone() {
        ob_start();
        require_once(BACK_ROOT . '/views/ViewAdminCommandeDone.php');
        $view = ob_get_clean();

        require_once(BACK_ROOT . '/views/template.php');
    }

    public function AdminProductManagement() {
        ob_start();
        require_once(BACK_ROOT . '/views/ViewAdminProductManagement.php');
        $view = ob_get_clean();

        require_once(BACK_ROOT . '/views/template.php');
    }

    public function AdminProfile() {
        ob_start();
        require_once(BACK_ROOT . '/views/ViewAdminProfile.php');
        $view = ob_get_clean();

        require_once(BACK_ROOT . '/views/template.php');
    }
}