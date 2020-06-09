<?php

class Author 
{
    public $id;
    public $user_id;
    public $name;
    public $surname;
    public $birthday;
    public $url;

    public function __construct() {
        $this->db = Database::connect();
    }
    
    public function getAuthors() {
        $sql = "SELECT * FROM authors";

        $result = $this->db->query($sql);
  
        if ($result->num_rows > 0) {
            return $result;
        }
        
        return false;
    }

    public function getAuthor($id) {
        $sql = "SELECT * FROM authors WHERE id='$id'";

        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        
        return false;
    }

    public function createAuthor() {
        $sql = "INSERT INTO authors VALUES(NULL, '{$_SESSION['user']['id']}', '{$this->name}', '{$this->surname}', '{$this->birthday}', '{$this->url}');";

		if($this->db->query($sql) === TRUE){
			return $this->getLastAuthor();
        }

        return false;
    }

    public function updateAuthor() {
        $sql = "UPDATE authors SET title ='{$this->name}' WHERE id='{$this->id}'";

		if($this->db->query($sql) === TRUE){
			return $this->getAuthor($this->id);
        }

        return false;
    }

    private function getLastAuthor() {
        $sql = "SELECT id FROM authors ORDER BY id DESC LIMIT 1";

        $result = $this->db->query($sql);

        return $result->fetch_assoc();
    }

    public function removeAuthor($id) {
        $sql = "SELECT id FROM authors WHERE id=$id && user_id={$_SESSION['user']['id']}";

        if ($this->db->query($sql)->num_rows == 1) {
  
            $sql = "DELETE FROM authors WHERE id=$id && user_id={$_SESSION['user']['id']}";

            if($this->db->query($sql) === TRUE){
                return true;
            }
    
            return false;
        } else {
            return false;
        }
    }
}