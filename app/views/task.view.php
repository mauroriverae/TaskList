<?php
include_once 'libs/smarty-4.2.1/libs/Smarty.class.php';

class TaskView {
    private $smarty;

    function __construct() {
        //en nuestra arquitectura no existe una vista sin smarty
        $this->smarty = new Smarty();
    }

    function showTasks($tasks) {

        //asigno las tareas
        $this->smarty->assign("tasks", $tasks);
        //renderizo
        $this->smarty->display('templates/lista.tpl');
     
    }

    function showHomeLocation(){
        header("location: " .BASE_URL."home");
    }

    function showLoginLocation(){
        header("location: " .BASE_URL."login");
    }
}
