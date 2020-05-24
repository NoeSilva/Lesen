<?php
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

switch ($route) {
    case 'register':
        require_once './views/register.html';

        break;

    case 'login':
        require_once './views/login.html';

        break;

    case 'panel':
        if (isset($_COOKIE['auth']) && $_COOKIE['auth'] == 1) {
            require_once './views/panel.php';
        } else {
            header('Location: index.php?r=login');
        }

        break;

    case 'logout':
        setcookie('auth', 0, time() + (86400 * 30), "/");

        header('Location: index.php?r=login');

        break;

    default:
        require_once './views/main.html';

        break;
}

require_once './views/templates/footer.html';
