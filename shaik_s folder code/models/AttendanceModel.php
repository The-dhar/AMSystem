<?php

class AttendanceModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Get attendance records for a specific student
    public function getByStudent($studentId) {
        $query = "SELECT * FROM attendance WHERE student_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$studentId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get all attendance records
    public function getAllAttendance() {
        $query = "SELECT * FROM attendance";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Mark attendance for a student
    public function markStudent($studentId, $subjectId, $date, $status) {
        $query = "INSERT INTO attendance (student_id, subject_id, date, status) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$studentId, $subjectId, $date, $status]);
        return $stmt->rowCount() > 0;
    }
}