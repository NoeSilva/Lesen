<?php

class Category 
{
    public $id;
    public $user_id;
    public $name;

    public function __construct() {
        $this->db = Database::connect();
    }
    
}
