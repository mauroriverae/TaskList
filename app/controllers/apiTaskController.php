<?php
require_once './app/models/task.model.php';
require_once './app/views/apiView.php';


class ApiTaskController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new TaskModel();
        $this->view = new ApiView();
    }

    function getTasks() {
        $tareas = $this-> model -> getAllTasks();
        return $this -> view-> response($tareas, 200);

    }
    
    function getTask($params = []){
        $idTarea = $params[":ID"];
        $tarea = $this->model->getTask($idTarea);
        return $this -> view-> response($tarea, 200);
    }
}

//minuto 1hs 05 javi