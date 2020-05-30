<?php
/*
Abrimos la sesión para usar variables de sesión
Variables que conservan el valor hasta que se cierre la pestaña
*/
session_start();

//Asignamos a la variable $controller el controlador (contenedor de las páginas)
if (isset($_GET['r'])) {
    //Cogemos la ruta de URL y la metemos en la variable $route
    $route = $_GET['r'];

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

    /*
    Requerimos el controlador
    Contiene las funciones que muestran las páginas
    */
    require_once './controllers/Controller.php';

    //Requerimos el header y le pasamos el array de links para generar el menú
    require_once './views/templates/header.php';

    $controller = new Controller();

    controller($controller, $route);

    //Requerimos el footer
    require_once './views/templates/footer.html';

} else if(isset($_GET['book'])) {
    require_once './controllers/BooksController.php';

    $controller = new BooksController();

    $function = $_GET['book'];

    controller($controller, $function);

} else if(isset($_GET['auth'])) {
    require_once './controllers/AuthController.php';

    $controller = new AuthController();

    $function = $_GET['auth'];

    controller($controller, $function);
}

else {
    header('Location: index.php?r=main');
}

//Si hay una función que se llame igual que el valor de $function, llamamos a esa función
function controller($controller, $function) {
    if(method_exists($controller, $function)){
        $controller->$function(); //$controller->login();
    }
}
