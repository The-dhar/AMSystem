<?php

class SubjectModel {
    private $conn;
    public function __construct($db) {
        $this->conn = $db;
    }
    public function getAllSubjects() {
        $query = "SELECT * FROM subjects";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function createSubject($subject_name) {
        $query = "INSERT INTO subjects (subject_name) VALUES (?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$subject_name]);
        return $stmt->rowCount() > 0;
    }
}