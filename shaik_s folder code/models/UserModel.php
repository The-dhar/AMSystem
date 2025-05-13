<?php

class UserModel {
    private $conn;
    public function __construct($db) {
        $this->conn = $db;
    }
    
}