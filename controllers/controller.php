<?php
require_once './class/Book.php';

class Controller {

    public function main(){ 
        $book = new Book();
        $books = $book->getBooks();

        require_once './views/main.php';
    }

    //Vaciamos las variables $auth y $user, redirigimos a login
    public function logout(){
        unset($_SESSION['auth']);
        unset($_SESSION['user']);

        header('Location: index.php?auth=login');
    }
}

?>