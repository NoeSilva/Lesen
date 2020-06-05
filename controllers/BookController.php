<?php
require_once './class/Book.php';
require_once './class/Genre.php';

require_once './controllers/AuthController.php';

class BookController
{
    /********************************************************************************************/
    /*                                         PAGINAS                                          */
    /********************************************************************************************/
    
    public function create_book()
    {
        // Comprueba si el usuario está logueado
        AuthController::checkAuth();

        $type = 'createBook';

        $book = array(
            'id' => 0 ,
            'title' => '',
            'author' => '',
            'gendre' => '',
            'image' => '',
            'price' => 0,
        );

        $genre = new Genre();
        $result = $genre->getGenres();

        if ($result !== FALSE) {
            $genres = $result;
        }
        else {
            $genres = [];
        }

        require_once './views/book/create_book.php';
 
        unset($_SESSION['class']);
        unset($_SESSION['message']);
        unset($_SESSION['bookId']);
    }

    public function show_book(){
        $book = new Book();
        $result = $book->getBook($_GET['id']);

        if ($result !== FALSE) {
            $book = $result;
        } else {
            header('Location:index.php?r=main');
        }

        require_once './views/book/show_book.php';
    }

    public function show_books(){ 
       
        AuthController::checkAuth();

        $book = new Book();
        $books = $book->getBooks();

        require_once './views/book/show_books.php';

        unset($_SESSION['class']);
        unset($_SESSION['message']);
    }

    public function update_book()
    {
        AuthController::checkAuth();

        $book = new Book();
        $result = $book->getBook($_GET['id']);

        if ($result !== FALSE) {
            $type = 'updateBook';

            $book = $result;
        } else {
            header('Location:index.php?r=main');
        }

        require_once './views/book/create_book.php';
 
        unset($_SESSION['class']);
        unset($_SESSION['message']);
        unset($_SESSION['bookId']);
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
    public function createBook()
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
        $book = $this->insertData($_POST['id'], $_POST['title'], $_POST['author'], $_POST['gendre'], $_FILES["image"]['name'], $_POST['price']);
 
        $result = $book->updateBook();

        if ($result !== FALSE) {
            $_SESSION['class'] = 'alert-success';
            $_SESSION['message'] = 'El libro se ha actualizado';
        } else {
            $_SESSION['class'] = 'alert-danger';
            $_SESSION['message'] = 'El libro no se ha actualizado';
        }

        header('Location: index.php?book=update_book&id='. $_POST['id']);
    }

    public function removeBook()
    {
        $book = new Book();
        $result = $book->removeBook($_GET['id']);

        if ($result === TRUE) {
            $_SESSION['class'] = 'alert-success';
            $_SESSION['message'] = 'El libro se ha eliminado';
        } else {
            $_SESSION['class'] = 'alert-danger';
            $_SESSION['message'] = 'El libro no se ha eliminado';
        }

        header('Location: index.php?book=show_books');
    }
}
