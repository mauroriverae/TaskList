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
        if(isset($body->titulo, $body->descripcion, $body->prioridad)){
            $id = $this->model->insertTask($body->titulo, $body->descripcion, $body->prioridad);
            if($id != 0){
                $this->view->response("la tarea se inserto con exito id = $id", 200);
            } else {
                $this->view->response("la tarea no se inserto con exito id", 500);
            }
        } else {
            $this->view->response("Faltan datos ", 500);
        }
    }

    private function getBody() {
        $bodyString = file_get_contents("php://input");
        return json_decode($bodyString);
    }

    function updateTask($params = null){
        $idTarea = $params[':ID'];
        $body = $this->getBody();
        
        $tarea = $this->model->getTask($idTarea);
        if ($tarea) {
            $this->model->update($idTarea, $body->titulo, $body->descripcion, $body->prioridad, $body->finalizada);
            $this->view->response("la tarea se actualizo con exito id = $idTarea", 200);
        } else {
            return $this -> view-> response("La tarea con el id = $idTarea no existe", 404);
        }

    }
}
