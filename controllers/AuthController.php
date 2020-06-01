<?php
require_once './class/User.php';

class AuthController
{
    /********************************************************************************************/
    /*                                         PAGINAS                                          */
    /********************************************************************************************/

    public function register()
    {
        require_once './views/auth/register.html';
    }

    public function login()
    {
        require_once './views/auth/login.html';
    }

    //Comprobamos si el usuario está logueado, de no ser así redirigimos a login
    public function panel()
    {
        $this->checkAuth();
 
        require_once './views/auth/panel.php';
    }

    /********************************************************************************************/
    /*                                       FUNCIONES                                          */
    /********************************************************************************************/

    // Mover al usuario a login en caso de que no esté logueado
    public static function checkAuth() {
        if (!isset($_SESSION['auth']) || $_SESSION['auth'] !== 1) {
            header('Location: index.php?auth=login');
        }
    }

    /*
    Función privada: solo se puede ejecutar desde dentro de la clase (AuthController.php)
    Para llamar a esta función: $this->$insertData(...);
    Abrimos la clase User
    Asignamos valores a la clase User
    Devolvemos la clase abierta
    */
    private function insertData($name, $email, $pass)
    {
        $user = new User();

        $user->name = $name;
        $user->email = $email;
        $user->pass = $pass;

        return $user;
    }

    /*
    Ejecutamos la función insertData, pasandole el email y la pass que ha escrito el usuario
    Ejecutamos la función createUser de la clase User,
    en caso de devolvernos TRUE, redirigimos al login
    */
    public function registerUser()
    {
        $user = $this->insertData($_POST['name'], $_POST['email'], hash('sha256', $_POST['password']));

        if ($user->createUser() === TRUE) {
            header('Location: index.php?auth=login');
        } else {
            header('Location: index.php?auth=register');
        }
    }

    /*
    Ejecutamos la función insertData, pasandole el email y la pass que ha escrito el usuario
    Ejecutamos la función userLogin de la clase User,
    la respuesta la almacenamos en la variable $result
    En caso de no devolvernos un FALSE, asignamos 1 a auth y el usuario a la variable usuario
    Redirigimos a panel
    */
    public function loginUser()
    {
        $user = $this->insertData(NULL, $_POST['email'], hash('sha256', $_POST['password']));

        $result = $user->userLogin();

        if ($result !== FALSE) {

            $_SESSION['auth'] = 1;
            $_SESSION['user'] = $result;

            header('Location: index.php?auth=panel');
        } else {

            header('Location: index.php?auth=login');
        }
    }
}
