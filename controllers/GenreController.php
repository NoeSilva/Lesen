<?php
require_once './class/Genre.php';

require_once './controllers/AuthController.php';

class GenreController {

    /********************************************************************************************/
    /*                                         PAGINAS                                          */
    /********************************************************************************************/

    public function create_genre()
    {
        AuthController::checkAuth();

        require_once './views/genre/create_genre.php';
 
        unset($_SESSION['class']);
        unset($_SESSION['message']);
    }

    public function show_genres()
    {
        AuthController::checkAuth();

        $genre = new Genre();
        $genres = $genre->getGenres();
        
        require_once './views/genre/show_genres.php';

        unset($_SESSION['class']);
        unset($_SESSION['message']);
    }

    /********************************************************************************************/
    /*                                       FUNCIONES                                          */
    /********************************************************************************************/

    public function createGenre()
    {
        $genre = new Genre();

        $genre->name = $_POST['name'];
 
        $result = $genre->createGenre();

        if ($result === TRUE) {
            $_SESSION['class'] = 'alert-success';
            $_SESSION['message'] = 'El género se ha creado';
        } else {
            $_SESSION['class'] = 'alert-danger';
            $_SESSION['message'] = 'El género no se ha creado';
        }

        header('Location: index.php?genre=create_genre');
    }

    public function removeGenre()
    {
        $genre = new Genre();
        $result = $genre->removeGenre($_GET['id']);

        if ($result === TRUE) {
            $_SESSION['class'] = 'alert-success';
            $_SESSION['message'] = 'El género se ha eliminado';
        } else {
            $_SESSION['class'] = 'alert-danger';
            $_SESSION['message'] = 'El género no se ha eliminado';
        }

        header('Location: index.php?genre=show_genres');
    }
   

    

}