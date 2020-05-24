<?php
require_once './controllers/AuthController.php';

$action = '';

if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

$controller = new AuthController();

if(method_exists($controller, $action)){
    $controller->$action();
}
