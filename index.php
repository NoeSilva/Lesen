<?php
session_start();

//El usuario esta logueado
if (isset($_SESSION['auth']) && $_SESSION['auth'] == 1) {
    $links = array(
        array('name' => 'Inicio', 'url' => 'r=main', 'icon' => 'fas fa-home'),
        array('name' => 'Panel', 'url' => 'auth=panel', 'icon' => 'fas fa-user'),
        array('name' => 'Cerrar sesión', 'url' => 'r=logout', 'icon' => 'fas fa-sign-out-alt'),
    );
}
//El usuario NO está logueado
else {
    $links = array(
        array('name' => 'Inicio', 'url' => 'r=main', 'icon' => 'fas fa-home'),
        array('name' => 'Registro', 'url' => 'auth=register', 'icon' => 'fas fa-angle-double-right'),
        array('name' => 'Inicia sesión', 'url' => 'auth=login', 'icon' => 'fas fa-sign-in-alt'),
    );
}

if (isset($_GET['r'])) {
    require_once './controllers/Controller.php';

    $controller = new Controller();

    $route = $_GET['r'];

    switch ($route) {
        case 'main':
            require_once './views/templates/header.php';
            $controller->main();
            require_once './views/templates/footer.html';

            break;

        case 'logout':
            $controller->logout();
            break;
    }
} else if (isset($_GET['book'])) {
    require_once './controllers/BookController.php';

    $controller = new BookController();

    $route = $_GET['book'];

    switch ($route) {
        case 'show_book':
            require_once './views/templates/header.php';
            $controller->showBook();
            require_once './views/templates/footer.html';

            break;

        case 'create_book':
            require_once './views/templates/header.php';
            $controller->createBook();
            require_once './views/templates/footer.html';

            break;

        case 'insertBook':
            $controller->insertBook();
            break;

        case 'updateBook':
            $controller->updateBook();
            break;

        case 'removeBook':
            $controller->removeBook();
            break;
    }
} else if (isset($_GET['auth'])) {
    require_once './controllers/AuthController.php';

    $controller = new AuthController();

    $route = $_GET['auth'];

    switch ($route) {
        case 'register':
            require_once './views/templates/header.php';
            $controller->register();
            require_once './views/templates/footer.html';

            break;

        case 'login':
            require_once './views/templates/header.php';
            $controller->login();
            require_once './views/templates/footer.html';

            break;

        case 'panel':
            require_once './views/templates/header.php';
            $controller->panel();
            require_once './views/templates/footer.html';

            break;

        case 'registerUser':
            $controller->registerUser();
            break;

        case 'loginUser':
            $controller->loginUser();
            break;
    }
} else {
    header('Location: index.php?r=main');
}
