<?php
class Controller {

    public function register(){
        require_once './views/register.html';
    }

    public function login(){
        require_once './views/login.html';
    }

    public function main(){
        require_once './views/main.php';
    }

    public function books(){
        require_once './views/books.php';
    }

    //Comprobamos si el usuario está logueado, de no ser así redirigimos a login
    public function panel(){
        if (!isset($_SESSION['auth']) || $_SESSION['auth'] != 1) {
            header('Location: index.php?r=login');
        }
        
        require_once './views/panel.php';
    }

    //Vaciamos las variables $auth y $user, redirigimos a login
    public function logout(){
        unset($_SESSION['auth']);
        unset($_SESSION['user']);

        header('Location: index.php?r=login');
    }
}