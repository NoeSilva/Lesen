<?php
require_once './class/Category.php';

require_once './controllers/AuthController.php';

class CategoryController {

    /********************************************************************************************/
    /*                                         PAGINAS                                          */
    /********************************************************************************************/

    public function create_category()
    {
        AuthController::checkAuth();

        require_once './views/category/create_category.php';
 
        unset($_SESSION['class']);
        unset($_SESSION['message']);
    }

    public function show_categories()
    {
        AuthController::checkAuth();

        $category = new Category();
        $categories = $category->getCategories();

        require_once './views/category/show_categories.php';

        unset($_SESSION['class']);
        unset($_SESSION['message']);
    }

    /********************************************************************************************/
    /*                                       FUNCIONES                                          */
    /********************************************************************************************/

    public function createCategory()
    {
        $category = new Category();

        $category->name = $_POST['name'];
 
        $result = $category->createCategory();

        if ($result === TRUE) {
            $_SESSION['class'] = 'alert-success';
            $_SESSION['message'] = 'La categoría se ha creado';
        } else {
            $_SESSION['class'] = 'alert-danger';
            $_SESSION['message'] = 'La categoría no se ha creado';
        }

        header('Location: index.php?category=create_category');
    }

    public function removeCategory()
    {
        $category = new Category();
        $result = $category->removeCategory($_GET['id']);

        if ($result === TRUE) {
            $_SESSION['class'] = 'alert-success';
            $_SESSION['message'] = 'La categoría se ha eliminado';
        } else {
            $_SESSION['class'] = 'alert-danger';
            $_SESSION['message'] = 'La categoría no se ha eliminado';
        }

        header('Location: index.php?category=show_categories');
    }
   

    

}