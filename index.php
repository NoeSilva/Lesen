<?php
require_once './controllers/Controller.php';

session_start();

$route = '';

if (isset($_GET['r'])) {
    $route = $_GET['r'];
}

if (isset($_COOKIE['auth']) && $_COOKIE['auth'] == 1) {
    $links = array(
        array(
            'name' => 'Inicio',
            'url' => 'main'
        ),
        array(
            'name' => 'Panel',
            'url' => 'panel'
        ),
        array(
            'name' => 'Cerrar sesión',
            'url' => 'logout'
        ),
    );
} else {
    $links = array(
        array(
            'name' => 'Inicio',
            'url' => 'main'
        ),
        array(
            'name' => 'Registro',
            'url' => 'register'
        ),
        array(
            'name' => 'Inicia sesión',
            'url' => 'login'
        ),
    );
}

require_once './views/templates/header.php';

$controller = new Controller();

if(method_exists($controller, $route)){
    $controller->$route();
}else {
    $controller->main();
}

require_once './views/templates/footer.html';
