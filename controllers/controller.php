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

    public function fake(){
        require_once './views/fake.html';
    }

    public function panel(){
        if (isset($_SESSION['auth']) && $_SESSION['auth'] == 1) {
            require_once './views/panel.php';
        } else {
            header('Location: index.php?r=login');
        }
        
        require_once './views/panel.php';
    }

    public function logout(){
        unset($_SESSION['auth']);
        unset($_SESSION['user']);

        header('Location: index.php?r=login');
    }
}