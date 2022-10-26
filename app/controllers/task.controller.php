<?php
require_once './app/models/task.model.php';
require_once './app/views/task.view.php';
require_once './helpers/authHelper.php';

class TaskController {
    private $model;
    private $view;
    private $authHelper;

    public function __construct() {
        $this->model = new TaskModel();
        $this->view = new TaskView();
        $this->authHelper = new AuthHelper();
    }

    public function showTasks() {
        $this->authHelper->checkLoggedIn();
        $tareas = $this->model->getAllTasks();
        $this->view->showTasks($tareas);
    }

    function showHomeCSR() {
      
        $this->view->showCSR();
    }
    
    function addTask() {
        // TODO: validar entrada de datos
        $this->autHelper->checkLoggedIn();
        $title = $_POST['title'];
        $description = $_POST['description'];
        $priority = $_POST['priority'];

        $id = $this->model->insertTask($title, $description, $priority);

        header("Location: " . BASE_URL); 
    }
   
    function deleteTask($id) {
        $this->autHelper->checkLoggedIn();
        $this->model->deleteTaskById($id);
        header("Location: " . BASE_URL);
    }
    
    function updateTask($id) {
        $this->authHelper->checkLoggedIn();
        $this->model->updateTaskFromDB($id);
        header("Location: " . BASE_URL);
    }

    
}
