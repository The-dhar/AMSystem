<?php

include '../config/Database.php';
include '../models/StudentClassModel.php';
include '../controllers/StudentClassController.php';

$db = (new Database())->getConnection();
$controller = new StudentClassController($db);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo json_encode($controller->getAllStudentClass());
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $success = $controller->assignStudentClass($data['student_id'], $data['class_id']);
    echo json_encode(["message" => $success ? "Student assigned to class" : "Failed"]);
}