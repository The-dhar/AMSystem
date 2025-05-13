<?php

class ScheduleModel {
    private $conn;
    public function __construct($db) {
        $this->conn = $db;
    }
    public function getAllSchedules() {
        $query = "SELECT * FROM schedule";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function createSchedule($class_id, $subject_id, $day, $time, $room, $status) {
        $query ="INSERT INTO schedule (class_id, subject_id, day, time, room, status) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$class_id, $subject_id, $day, $time, $room, $status]);
        return $stmt->rowCount() > 0;
    }
}
