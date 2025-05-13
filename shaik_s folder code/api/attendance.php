<?php
include '../config/Database.php';
include '../models/AttendanceModel.php';
include '../controllers/AttendanceController.php';

// Get the database connection
$database = new Database();
$db = $database->getConnection();

// Instantiate the controller
$attendanceController = new AttendanceController($db);

// Check if the request method is GET (to get attendance)
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['student_id'])) {
        $attendance = $attendanceController->getByStudent($_GET['student_id']);
    } else {
        $attendance = $attendanceController->getAllAttendance();
    }
    echo json_encode($attendance);  // Return the data in JSON format
}

// Check if the request method is POST (to mark attendance)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);  // Get POST data
    $result = $attendanceController->markStudent($data['student_id'], $data['subject_id'], $data['date'], $data['status']);
    echo json_encode(["message" => $result ? "Attendance marked successfully" : "Failed to mark attendance"]);
}