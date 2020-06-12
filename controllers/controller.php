<?php
require_once './class/Book.php';

class Controller {

    public function main(){ 
        $book = new Book();
        $books = $book->getBooks();

        require_once './views/main.php';
    }
}

?>