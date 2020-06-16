<?php
require_once './class/Book.php';
require_once './class/Genre.php';
require_once './class/Author.php';

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

        $data = $this->getData();

        $genres = $data['genres'];
        $authors = $data['authors'];

        $type = 'createBook';

        $book = array(
            'id' => 0,
            'title' => '',
            'author_id' => 0,
            'genre_id' => 0,
            'image' => '',
            'price' => 0,
        );

        require_once './views/book/create_book.php';

        unset($_SESSION['class']);
        unset($_SESSION['message']);
        unset($_SESSION['bookId']);
    }

    public function show_book()
    {
        $book = new Book();
        $result = $book->getBook($_GET['id']);

        if ($result !== FALSE) {
            $book = $result;
        } else {
            header('Location:index.php?r=main');
        }

        require_once './views/book/show_book.php';
    }

    public function show_books()
    {

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
            $data = $this->getData();

            $genres = $data['genres'];
            $authors = $data['authors'];

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
    private function insertData($id, $title, $author_id, $genre_id, $image, $price)
    {
        $book = new Book();

        $book->id = $id;
        $book->title = $title;
        $book->author_id = $author_id;
        $book->genre_id = $genre_id;
        $book->image = $image;
        $book->price = $price;

        return $book;
    }

    // Insertar libro a la BD
    public function createBook()
    {
        // Meter el nombre de la imagen a la BD
        $book = $this->insertData(NULL, $_POST['title'], $_POST['author_id'], $_POST['genre_id'], $_FILES['image']['name'], $_POST['price']);

        $result = false;

        // Subir imagen al servidor
        if ($_FILES['image']['name'] && $this->uploadPhoto($_FILES['image']) == true) {

            $result = $book->createBook();

        } else if (!$_FILES['image']['name']) {

            $result = $book->createBook();
        }

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
        $book = $this->insertData($_POST['id'], $_POST['title'], $_POST['author_id'], $_POST['genre_id'], $_FILES['image']['name'], $_POST['price']);

        $result = $book->updateBook();

        if ($result !== FALSE) {
            $_SESSION['class'] = 'alert-success';
            $_SESSION['message'] = 'El libro se ha actualizado';
        } else {
            $_SESSION['class'] = 'alert-danger';
            $_SESSION['message'] = 'El libro no se ha actualizado';
        }

        header('Location: index.php?book=update_book&id=' . $_POST['id']);
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

    private function getData()
    {
        $genre = new Genre();
        $gResult = $genre->getGenres();

        $genres = [];

        if ($gResult !== FALSE) {
            $genres = $gResult;
        }

        $author = new Author();
        $aResult = $author->getAuthors();

        $authors = [];

        if ($aResult !== FALSE) {
            $authors = $aResult;
        }

        return array(
            'genres' => $genres,
            'authors' => $authors,
        );
    }

    // Subir imagen al servidor
    private function uploadPhoto($image)
    {
        $directory = 'storage/images/';
        $file = $directory . basename($image['name']);

        // Comprobar que la imagen sea una imagen
        if (getimagesize($image['tmp_name']) == true) {

            // Comprobar que la imagen no exista
            if (!file_exists($file)) {

                // Comprobar que la imagen pese menos de 5MB
                if ($image['size'] <= 500000) {
                    
                    $imageFileType = strtolower(pathinfo($file, PATHINFO_EXTENSION));

                    // Si la imagen tiene alguno de estos formatos
                    if ($imageFileType == 'jpg' || $imageFileType == 'png' || $imageFileType == 'jpeg' || $imageFileType == 'gif') {

                        // Si la imagen se ha subido
                        if (move_uploaded_file($image['tmp_name'], $file)) {
                            return true;
                        }

                    }

                    return false;
                }
            }
        }
    }
}
