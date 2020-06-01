<?php
require_once './class/Book.php';

require_once './controllers/AuthController.php';

class BookController
{
    /********************************************************************************************/
    /*                                         PAGINAS                                          */
    /********************************************************************************************/
    
    public function createBook()
    {
        AuthController::checkAuth();

        require_once './views/book/create_book.php';
 
        unset($_SESSION['class']);
        unset($_SESSION['message']);
        unset($_SESSION['bookId']);
    }

    public function showBook(){
        $book = new Book();
        $result = $book->getBook($_GET['id']);

        if ($result !== FALSE) {
            $book = $result;
        } else {
            header('Location:index.php?r=main');
        }

        require_once './views/book/show_book.php';
    }

    /********************************************************************************************/
    /*                                       FUNCIONES                                          */
    /********************************************************************************************/

    // Meter datos a la clase Book
    private function insertData($id, $title, $author, $gendre, $image, $price)
    {
        $book = new Book();

        $book->id = $id;
        $book->title = $title;
        $book->author = $author;
        $book->gendre = $gendre;
        $book->image = $image;
        $book->price = $price;

        return $book;
    }

    // Insertar libro a la BD
    public function insertBook()
    {
        $book = $this->insertData(NULL, $_POST['title'], $_POST['author'], $_POST['gendre'], $_FILES["image"]['name'], $_POST['price']);
 
        $result = $book->createBook();

        if ($result !== FALSE) {
            $_SESSION['bookId'] = $result['id'];
            $_SESSION['class'] = 'alert-success';
            $_SESSION['message'] = 'El libro se ha creado';
        } else {
            $_SESSION['class'] = 'alert-danger';
            $_SESSION['message'] = 'El libro no se ha creado';
        }

        header('Location: index.php?book=create_book');
    }

    public function updateBook()
    {
    }

    public function removeBook()
    {
    }
}
