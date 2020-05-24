<?php
class Controller {

    public function register(){
        require_once './views/register.html';
    }

    public function login(){
        require_once './views/login.html';
    }

    public function main(){
        require_once './views/main.html';
    }

    public function panel(){
        if (isset($_COOKIE['auth']) && $_COOKIE['auth'] == 1) {
            require_once './views/panel.php';
        } else {
            header('Location: index.php?r=login');
        }
        
        require_once './views/panel.php';
    }

    public function logout(){
        setcookie('auth', 0, time() + (86400 * 30), "/");

        header('Location: index.php?r=login');
    }
}