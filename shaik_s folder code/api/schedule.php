<?php 

include '../config/Database.php';
include '../models/ScheduleModel.php';
include '../controllers/ScheduleController.php';

$db = (new Database())->getConnection();
$controller = new ScheduleController($db);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo json_encode($controller->getAllSchedules());
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $success = $controller->createSchedule($data['class_id'], $data['subject_id'], $data['day'], $data['time'], $data['room'], $data['status']);
    echo json_encode(["message" => $success ? "Schedule created" : "Failed"]);
}