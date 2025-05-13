<?php

class AttendanceController {
    private $attendanceModel;

    public function __construct($db) {
        $this->attendanceModel = new AttendanceModel($db);
    }

    // Get attendance records for a specific student
    public function getByStudent($studentId) {
        return $this->attendanceModel->getByStudent($studentId);
    }

    // Get all attendance records
    public function getAllAttendance() {
        return $this->attendanceModel->getAllAttendance();
    }

    // Mark attendance for a student
    public function markStudent($studentId, $subjectId, $date, $status) {
        return $this->attendanceModel->markStudent($studentId, $subjectId, $date, $status);
    }
}