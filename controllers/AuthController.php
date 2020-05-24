<?php
require_once './class/User.php';

class AuthController
{
    private function insertData($email, $pass) {
        $user = new User();
        $user->email = $email;
        $user->pass = $pass;
    
        return $user;
    }

    public function register()
    {
        $user = $this->insertData($_POST['email'], hash('sha256', $_POST['password']));

        if ($user->createUser() === TRUE) {
            header('Location: index.php?r=login');
        } else {
            header('Location: index.php?r=register');
        }
    }

    public function login()
    {
        $user = $this->insertData($_POST['email'], hash('sha256', $_POST['password']));

        $result = $user->userLogin();

        if ($result !== FALSE) {

            $_SESSION['auth'] = 1;
            $_SESSION['user'] = $result;

            header('Location: index.php?r=panel');
        } else {

            header('Location: index.php?r=login');
        }
    }
}
