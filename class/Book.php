<?php
require_once './config/db.php';

class Book
{
    public $id;
    public $title;
    public $author_id;
    public $gendre_id;
    public $image;
    public $price;

    public function __construct() {
        $this->db = Database::connect();
    }
    
    public function getBooks() {
        $sql = "SELECT books.id, books.title, books.author_id, books.image, books.price, genres.name as genre, authors.name as authorName, authors.surname as authorSurname , users.name as user FROM books ";
        $sql .= "LEFT JOIN genres ON books.genre_id = genres.id LEFT JOIN authors ON books.author_id = authors.id LEFT JOIN users ON books.user_id = users.id;";

        $result = $this->db->query($sql);
  
        if ($result->num_rows > 0) {
            return $result;
        }
        
        return false;
    }

    public function getBook($id) {
        $sql = "SELECT books.id, books.title, books.author_id, books.image, books.price, genres.name as genre, authors.name as authorName, authors.surname as authorSurname , users.name as user FROM books ";
        $sql .= "LEFT JOIN genres ON books.genre_id = genres.id LEFT JOIN authors ON books.author_id = authors.id LEFT JOIN users ON books.user_id = users.id WHERE books.id=$id;";

        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        
        return false;
    }

    public function getAuthorBooks($author_id) {
        $sql = "SELECT * FROM books WHERE author_id=$author_id LIMIT 3;";

        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            return $result;
        }
        
        return false;
    }

    public function getAllAuthorBooks($author_id) {
        $sql = "SELECT id FROM books WHERE author_id=$author_id;";

        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            return $result;
        }
        
        return false;
    }

    public function createBook() {
        $sql = "INSERT INTO books VALUES(NULL, '{$_SESSION['user']['id']}', '{$this->title}', '{$this->author_id}','{$this->gendre_id}','{$this->image}','{$this->price}');";

		if($this->db->query($sql) === TRUE){
			return $this->getLastBook();
        }

        return false;
    }

    public function updateBook() {
        $sql = "UPDATE books SET title='{$this->title}', author='{$this->author_id}', gendre='{$this->gendre_id}', price='{$this->price}' WHERE id='{$this->id}'";

		if($this->db->query($sql) === TRUE){
			return $this->getBook($this->id);
        }

        return false;
    }

    private function getLastBook() {
        $sql = "SELECT id FROM books ORDER BY id DESC LIMIT 1";

        $result = $this->db->query($sql);

        return $result->fetch_assoc();
    }

    public function removeBook($id) {
        $sql = "SELECT id FROM books WHERE id=$id && user_id={$_SESSION['user']['id']}";

        if ($this->db->query($sql)->num_rows == 1) {
  
            $sql = "DELETE FROM books WHERE id=$id && user_id={$_SESSION['user']['id']}";

            if($this->db->query($sql) === TRUE){
                return true;
            }
    
            return false;
        } else {
            return false;
        }
    }
}
