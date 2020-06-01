<?php
require_once './config/db.php';

class Book
{
    public $id;
    public $title;
    public $author;
    public $gendre;
    public $image;
    public $price;

    public function __construct() {
        $this->db = Database::connect();
    }
    
    public function getBooks() {
        $sql = "SELECT * FROM books";

        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            return $result;
        }
        
        return false;
    }

    public function getBook($id) {
        $sql = "SELECT * FROM books WHERE id='$id'";

        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        
        return false;
    }

    public function createBook() {
        $sql = "INSERT INTO books VALUES(NULL, '{$this->title}', '{$this->author}','{$this->gendre}','{$this->image}','{$this->price}');";

		if($this->db->query($sql) === TRUE){
			return $this->getLastBook();
        }

        return false;
    }

    private function getLastBook() {
        $sql = "SELECT id FROM books ORDER BY id DESC LIMIT 1";

        $result = $this->db->query($sql);

        return $result->fetch_assoc();
    }
}
