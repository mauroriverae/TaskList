<?php
    class AuthHelper {
        
        function __construct(){

        }



        function checkLoggedIn() {
            session_start();
            if(!isset($_SESSION["email"])){
                header("Location: " . BASE_URL. "login"); 
            }
        }

     /*    function logout(){
            session_start();
            session_destroy();
        } */
    }