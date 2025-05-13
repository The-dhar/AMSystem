<?php

class ScheduleController {
    private $scheduleModel;
    public function __construct($db) {
        $this->scheduleModel = new ScheduleModel($db);
    }
    public function getAllSchedules() {
        return $this->scheduleModel->getAllSchedules();
    }
    public function createSchedule($class_id, $subject_id, $day, $time, $room, $status) {
        return $this->scheduleModel->createSchedule($class_id, $subject_id, $day, $time, $room, $status);
    }
}
