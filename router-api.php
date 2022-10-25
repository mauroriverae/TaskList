<?php
    require_once 'libs/Router.php';
    require_once 'app/controllers/apiTaskController.php';
    // crea el router
    $router = new Router();

    // define la tabla de ruteo
    //endpoint
    $router->addRoute('tareas', 'GET', 'apiTaskController', 'getTasks'); 
    $router->addRoute('tareas/:ID', 'GET', 'apiTaskController', 'getTask');
    $router->addRoute('tareas/:ID', 'DELETE', 'apiTaskController', 'deleteTask');
    $router->addRoute('tareas', 'POST', 'apiTaskController', 'addTask');
    $router->addRoute('tareas/:ID', 'PUT', 'apiTaskController', 'updateTask');
    // con los dos puntos indico que es un parametro y no que es parte del string
    //cambia el bervo entocnes cambia a donde voy
    // rutea
    $router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
