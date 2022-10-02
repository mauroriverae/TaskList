<?php
require_once './app/models/task.model.php';
require_once './app/views/task.view.php';

class TaskController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new TaskModel();
        $this->view = new TaskView();
    }

    public function showTasks() {

        $this->checkLoggedIn();
        $tareas = $this->model->getAllTasks();
        $this->view->showTasks($tareas);
    }

    
    function addTask() {
        // TODO: validar entrada de datos
        $this->checkLoggedIn();
        $title = $_POST['title'];
        $description = $_POST['description'];
        $priority = $_POST['priority'];

        $id = $this->model->insertTask($title, $description, $priority);

        header("Location: " . BASE_URL); 
    }
   
    function deleteTask($id) {
        $this->checkLoggedIn();
        $this->model->deleteTaskById($id);
        header("Location: " . BASE_URL);
    }
    
    function updateTask($id) {
        $this->checkLoggedIn();
        $this->model->updateTaskFromDB($id);
        header("Location: " . BASE_URL);
    }

    function checkLoggedIn() {
        session_start();
        if(!isset($_SESSION["email"])){
            $this->view->showLoginLocation();
        }
    }
}
