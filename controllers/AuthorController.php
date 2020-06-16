<?php
require_once './class/Author.php';

require_once './controllers/AuthController.php';
require_once './controllers/BookController.php';

class AuthorController
{

    /********************************************************************************************/
    /*                                         PAGINAS                                          */
    /********************************************************************************************/

    public function create_author()
    {
        AuthController::checkAuth();

        require_once './views/author/create_author.php';

        unset($_SESSION['class']);
        unset($_SESSION['message']);
    }

    public function show_authors()
    {
        AuthController::checkAuth();

        $author = new Author();
        $authors = $author->getAuthors();

        require_once './views/author/show_authors.php';

        unset($_SESSION['class']);
        unset($_SESSION['message']);
    }

    public function show_author()
    {

        $author = new Author();
        $authorResult = $author->getAuthor($_GET['id']);

        if ($authorResult !== FALSE) {
            $author = $authorResult;

            $date = new DateTime($author['birthday']);
            $author['birthday'] = $date->format('F j, Y');

            $book = new Book();

            $booksResult = $book->getAuthorBooks($_GET['id']);
            
            if ($booksResult !== FALSE) {
                $books = $booksResult;

                $booksQuantity = $book->getAllAuthorBooks($_GET['id'])->num_rows;
            } else {
                $books = [];

                $booksQuantity = 0;
            }
        } else {
            header('Location:index.php?r=main');
        }

        require_once './views/author/show_author.php';
    }

    /********************************************************************************************/
    /*                                       FUNCIONES                                          */
    /********************************************************************************************/

    public function createAuthor()
    {
        $author = new Author();

        $author->name = $_POST['name'];
        $author->surname = $_POST['surname'];
        $author->birthday = $_POST['birthday'];
        $author->url = $_POST['url'];

        $result = $author->createAuthor();

        if ($result !== FALSE) {
            $_SESSION['class'] = 'alert-success';
            $_SESSION['message'] = 'El autor se ha creado';
        } else {
            $_SESSION['class'] = 'alert-danger';
            $_SESSION['message'] = 'El autor no se ha creado';
        }

        header('Location: index.php?author=create_author');
    }

    public function update_author()
    {
        AuthController::checkAuth();

        $author = new Author();
        $result = $author->getAuthor($_GET['id']);

        if ($result !== FALSE) {
            $type = 'updateAuthor';

            $author = $result;
        } else {
            header('Location:index.php?r=main');
        }
    }
    public function removeAuthor()
    {
        $author = new Author();
        $result = $author->removeAuthor($_GET['id']);

        if ($result === TRUE) {
            $_SESSION['class'] = 'alert-success';
            $_SESSION['message'] = 'El autor se ha eliminado';
        } else {
            $_SESSION['class'] = 'alert-danger';
            $_SESSION['message'] = 'El autor no se ha eliminado';
        }

        header('Location: index.php?genre=show_authors');
    }
}
