<?php
    require_once 'libs/Router.php';

    // crea el router
    $router = new Router();

    // define la tabla de ruteo
    $router->addRoute('tareas', 'GET', 'TaskApiController', 'obtenerTareas');
    $router->addRoute('tareas', 'POST', 'TaskApiController', 'crearTarea');
    $router->addRoute('tareas/:ID', 'GET', 'TaskApiController', 'obtenerTarea');

    // rutea
    $router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
