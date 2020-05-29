<?php
/*
Abrimos la sesión para usar variables de sesión
Variables que conservan el valor hasta que se cierre la pestaña
*/
session_start();

/*
Requerimos el controlador
Contiene las funciones que muestran las páginas
*/
require_once './controllers/Controller.php';

//Inicializamos una variable
$route = '';

//Cogemos la ruta de URL y la metemos en la variable $route
if (isset($_GET['r'])) {
    $route = $_GET['r'];
}

//El usuario esta logueado
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
} 
//El usuario NO está logueado
else {
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

//Requerimos el header y le pasamos el array de links para generar el menú
require_once './views/templates/header.php';

//Asignamos a la variable $controller el controlador (contenedor de las páginas)
$controller = new Controller();

//Si hay una función que se llame igual que el valor de $route, llamamos a esa función
if(method_exists($controller, $route)){
    $controller->$route(); //$controller->login();
}
//En caso de no ser así, ejecutamos la función main
else {
    $controller->main();
}

//Requerimos el footer
require_once './views/templates/footer.html';
