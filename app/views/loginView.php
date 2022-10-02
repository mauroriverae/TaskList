<?php
    include_once 'libs/smarty-4.2.1/libs/Smarty.class.php';

    class LoginView {
        private $smarty;

        function __construct() {
            //en nuestra arquitectura no existe una vista sin smarty
            $this->smarty = new Smarty();
        }

        function showLogin($error = "") {
            $this->smarty->assign("titulo", 'Log In');
            $this->smarty->assign("error", $error);
            $this->smarty->display('templates/login.tpl');
        
        }

        function showTask(){
            header("Location: " .BASE_URL."home");
        }
    }