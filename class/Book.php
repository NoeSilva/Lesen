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
    
    public function createBook() {
        $sql = "INSERT INTO books VALUES(NULL, '{$this->id}', '{$this->title}''{$this->author}','{$this->gendre}','{$this->image}','{$this->price}');";

		if($this->db->query($sql) === TRUE){
			return true;
        }

        return false;
    }
}
