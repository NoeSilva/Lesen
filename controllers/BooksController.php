<?php
require_once './class/Book.php';

class BooksController
{
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

    public function showBook(){
        $book = new Book();
        $book = $book->getBook(1);

        require_once './views/book.php';
    }

    // Insertar libro a la BD
    public function insertBook()
    {
        $book = $this->insertData(NULL, $_POST['title'], $_POST['author'], $_POST['gendre'], $_FILES["image"]['name'], $_POST['price']);
 
        if ($book->createBook() === TRUE) {
            $_SESSION['class'] = 'alert-success';
            $_SESSION['message'] = 'El libro se ha creado';
        } else {
            $_SESSION['class'] = 'alert-danger';
            $_SESSION['message'] = 'El libro no se ha creado';
        }

        header('Location: index.php?r=panel');
    }

    public function updateBook()
    {
    }

    public function removeBook()
    {
    }
}
