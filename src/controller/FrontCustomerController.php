<?php

class FrontCustomerController {

    private $customerService;


    public function __construct(){
        
        $this->customerService = new CustomerService();

       
    }

    public function connexFrontCustomer() {

        ob_start();
        require_once(BACK_ROOT . '/views/ViewConnexCustomer.php');
        $view = ob_get_clean();

        require_once(BACK_ROOT . '/views/template.php'); //--> à modifier avec le template.php

    }

    public function recoveryPasswordFrontCustomer($token = null) {

        ob_start();
        require_once(BACK_ROOT . '/views/ViewRecoveryPassword.php');
        $view = ob_get_clean();

        require_once(BACK_ROOT . '/views/template.php');
    }

}

?>