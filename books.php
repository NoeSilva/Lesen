<?php
session_start();

require_once './controllers/BooksController.php';

echo $_POST['title'];
echo '¡El libro ha sido añadido con éxito!';

$action = '';

if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

$controller = new BooksController();

if(method_exists($controller, $action)){
    $controller->$action();
}
