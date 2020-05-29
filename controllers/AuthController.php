<?php
require_once './class/User.php';

class AuthController
{
    /*
    Función privada: solo se puede ejecutar desde dentro de la clase (AuthController.php)
    Para llamar a esta función: $this->$insertData(...);
    Abrimos la clase User
    Asignamos valores a la clase User
    Devolvemos la clase abierta
    */
    private function insertData($email, $pass) {
        $user = new User();
        $user->email = $email;
        $user->pass = $pass;
    
        return $user;
    }

    /*
    Ejecutamos la función insertData, pasandole el email y la pass que ha escrito el usuario
    Ejecutamos la función createUser de la clase User,
    en caso de devolvernos TRUE, redirigimos al login
    */
    public function register()
    {
        $user = $this->insertData($_POST['email'], hash('sha256', $_POST['password']));

        if ($user->createUser() === TRUE) {
            header('Location: index.php?r=login');
        } else {
            header('Location: index.php?r=register');
        }
    }

    /*
    Ejecutamos la función insertData, pasandole el email y la pass que ha escrito el usuario
    Ejecutamos la función userLogin de la clase User,
    la respuesta la almacenamos en la variable $result
    En caso de no devolvernos un FALSE, asignamos 1 a auth y el usuario a la variable usuario
    Redirigimos a panel
    */
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
