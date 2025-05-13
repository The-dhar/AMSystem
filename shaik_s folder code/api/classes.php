<?php

include '../config/Database.php';
include '../models/ClassModel.php';
include '../controllers/ClassController.php';

$db = (new Database())->getConnection();
$controller = new ClassController($db);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo json_encode($controller->getAllClasses());
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $success = $controller->createClass($data['class_name']);
    echo json_encode(["message" => $success ? "Class created" : "Failed"]);
}