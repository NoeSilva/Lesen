<?php

class Category 
{
    public $id;
    public $user_id;
    public $name;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function getCategories() {
        $sql = "SELECT * FROM categories";

        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            return $result;
        }
        
        return false;
    }

    public function createCategory() {
        $sql = "INSERT INTO categories VALUES(NULL, '{$_SESSION['user']['id']}', '{$this->name}')";

		if($this->db->query($sql) === TRUE){
			return true;
        }

        return false;
    }

    public function removeCategory($id) {
        $sql = "SELECT id FROM categories WHERE id=$id && user_id={$_SESSION['user']['id']}";

        if ($this->db->query($sql)->num_rows == 1) {
  
            $sql = "DELETE FROM categories WHERE id=$id && user_id={$_SESSION['user']['id']}";

            if($this->db->query($sql) === TRUE){
                return true;
            }
    
            return false;
        } else {
            return false;
        }
    }
}
