<?php
require_once './class/User.php';

$route = '';

if (isset($_GET['action'])) {
    $route = $_GET['action'];
}

function insertData($email, $pass) {
    $user = new User();
    $user->email = $email;
    $user->pass = $pass;

    return $user;
}


switch ($route) {
    case 'register':
        insertData($_POST['email'], hash('sha256', $_POST['password']));

        if ($user->createUser() === TRUE) {
            header('Location: index.php?r=login');
        } else {
            header('Location: index.php?r=register');
        }

        break;

    case 'login':
        $user = insertData($_POST['email'], hash('sha256', $_POST['password']));

        $result = $user->userLogin();

        if ($result !== FALSE) {
            setcookie('auth', 1, time() + (86400 * 30), "/");
            setcookie('user', $result['id'], time() + (86400 * 30), "/");

            header('Location: index.php?r=panel');
        } else {
            setcookie('auth', 0, time() + (86400 * 30), "/");

            header('Location: index.php?r=login');
        }

        break;
}
