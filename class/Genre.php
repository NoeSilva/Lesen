<?php

class Genre 
{
    public $id;
    public $user_id;
    public $name;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function getGenres() {
        $sql = "SELECT * FROM genres";

        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            return $result;
        }
        
        return false;
    }

    public function createGenre() {
        $sql = "INSERT INTO genres VALUES(NULL, '{$_SESSION['user']['id']}', '{$this->name}')";

		if($this->db->query($sql) === TRUE){
			return true;
        }

        return false;
    }

    public function removeGenre($id) {
        $sql = "SELECT id FROM genres WHERE id=$id && user_id={$_SESSION['user']['id']}";

        if ($this->db->query($sql)->num_rows == 1) {
  
            $sql = "DELETE FROM genres WHERE id=$id && user_id={$_SESSION['user']['id']}";

            if($this->db->query($sql) === TRUE){
                return true;
            }
    
            return false;
        } else {
            return false;
        }
    }
}
