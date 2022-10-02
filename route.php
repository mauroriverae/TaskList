<?php
require_once './app/controllers/task.controller.php';
require_once './app/controllers/loginController.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);

// instancio el unico controller que existe por ahora
$taskController = new TaskController();
$loginController = new LoginController();


// tabla de ruteo
switch ($params[0]) {
    case 'login':
        $loginController->login();
        break;
    case 'verify':
        $loginController->verifyLogin();
        break;
    case 'home':
        $taskController->showTasks();
        break;
    case 'add':
        $taskController->addTask();
        break;
    case 'delete':
        $id = $params[1];
        $taskController->deleteTask($id);
        break;
    case 'update':
        $id = $params[1];
        $taskController->updateTask($id);
        break;
    default:
        echo('404 Page not found');
        break;
}
