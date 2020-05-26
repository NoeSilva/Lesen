<?php
session_start();

require_once './controllers/Controller.php';

$route = '';

if (isset($_GET['r'])) {
    $route = $_GET['r'];
}

if (isset($_SESSION['auth']) && $_SESSION['auth'] == 1) {
    $links = array(
        array(
            'name' => 'Inicio',
            'url' => 'main',
            'icon' => 'fas fa-home'

        ),
        array(
            'name' => 'Panel',
            'url' => 'panel',
            'icon' => 'fas fa-user' 
        ),
        array(
            'name' => 'Cerrar sesión',
            'url' => 'logout',
            'icon' => 'fas fa-sign-out-alt' 
        ),
    );
} else {
    $links = array(
        array(
            'name' => 'Inicio',
            'url' => 'main',
            'icon' => 'fas fa-home'
        ),
        array(
            'name' => 'Registro',
            'url' => 'register',
            'icon' => 'fas fa-angle-double-right' 
        ),
        array(
            'name' => 'Inicia sesión',
            'url' => 'login',
            'icon' => 'fas fa-sign-in-alt' 
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
