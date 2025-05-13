<?php

include '../config/Database.php';
include '../models/SubjectModel.php';
include '../controllers/SubjectController.php';

$db = (new Database())->getConnection();
$controller = new SubjectController($db);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo json_encode($controller->getAllSubjects());
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $success = $controller->createSubject($data['subject_name']);
    echo json_encode(["message" => $success ? "Subject created" : "Failed"]);
}
