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
    
    function getTask($params = null){
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

    function addTask($params = null) {
        // obtengo el body del request
        $body = $this->getBody();
        // falta hacer validaciones de que los campos no vengan vacios, en caso vacio 400(bad reques)
        $this->model->insertTask($body->titulo, $body->descripcion, $body->prioridad);
        $this->view->response("la tarea se inserto con exito", 200);
    }
    // corto en 1hs 17  clase 10/21
    private function getBody() {
        $bodyString = file_get_contents("php://input");
        return json_decode($bodyString);
    }
}

//minuto 1hs 05 javi