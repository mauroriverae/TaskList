<?php
    require_once 'libs/Router.php';
    require_once 'app/controllers/apiTaskController.php';
    // crea el router
    $router = new Router();

    // define la tabla de ruteo
    $router->addRoute('tareas', 'GET', 'apiTaskController', 'getTasks');
    $router->addRoute('tareas/:ID', 'GET', 'apiTaskController', 'getTask');
    //cambia el bervo entocnes cambia a donde voy
    // rutea
    $router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
