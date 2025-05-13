<?php

class ClassModel {
    private $conn;
    public function __construct($db) {
        $this->conn = $db;
    }
    public function getAllClasses() {
        $query = "SELECT * FROM classes";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function createClass($class_name) {
        $query = "INSERT INTO classes (class_name) VALUES (?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$class_name]);
        return $stmt->rowCount() > 0;
    }
}