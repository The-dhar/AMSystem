<?php

class StudentClassModel {
    private $conn;
    public function __construct($db) {
        $this->conn = $db;
    }
    public function getAllStudentClass() {
        $query = "SELECT * FROM student_class";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function assignStudentClass($student_id, $class_id) {
        $query = "INSERT INTO student_class (student_id, class_id) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$student_id, $class_id]);
        return $stmt->rowCount() > 0;
    }
}