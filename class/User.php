<?php
require_once './config/db.php';

class User
{
    public $name;
    public $email;
    public $pass;

    public function __construct() {
        $this->db = Database::connect();
    }
    
    public function createUser() {
        if ($this->userExists() === TRUE) {
            return true;
        }
        
        $sql = "INSERT INTO usuarios VALUES(NULL, '{$this->name}', '{$this->email}', '{$this->pass}');";

		if($this->db->query($sql) === TRUE){
			return true;
        }

        return false;
    }

    //Comprobar si existe el usuario
    private function userExists() {
        $sql = "SELECT * FROM usuarios WHERE email='{$this->email}'";

        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            return true;
        }
        
        return false;
    }

    public function userLogin() {
        $sql = "SELECT * FROM usuarios WHERE email='{$this->email}' && pass='{$this->pass}'";
        
        $result = $this->db->query($sql);

        if ($result->num_rows === 1) {
            return $result->fetch_assoc();
        }
        
        return false;
    }

   
}
