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
        if($tarea) {
            return $this -> view-> response($tarea, 200);
        } else{
            return $this -> view-> response("La tarea con el id = $idTarea no existe", 404);
        }
    }
    function deleteTask($params = null){
        $idTarea = $params[":ID"];
        $tarea = $this->model->getTask($idTarea);
        if($tarea){
            $this->model->deleteTaskById($idTarea);
            return $this -> view-> response("La tarea $idTarea borrada con exito", 200);
        } else {
            $this->view->response("No se puede borrar id $idTarea , no existe", 404);
        }
       

    }
}

//minuto 1hs 05 javi