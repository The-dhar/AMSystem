<?php

header('Content-Type: application/json');
require_once 'database.php';

$data = json_decode(file_get_contents('php://input'), true);

if (!$data || !isset($data['student_id']) || !isset($data['status'])) {
    echo json_encode(["success" => false, "message" => "Invalid data received."]);
    exit();
}

$student_id = $data['student_id'];
$status = $data['status'];

try {
    // Note: Assumes $conn is the PDO connection variable from database.php
    $stmt = $conn->prepare("UPDATE attendance SET status = :status WHERE student_id = :student_id");
    $stmt->execute([
        'status' => $status,
        'student_id' => $student_id
    ]);

    echo json_encode(["success" => true, "message" => "Attendance updated successfully"]);
} catch (PDOException $e) {
    echo json_encode(["success" => false, "message" => "Error updating attendance: " . $e->getMessage()]);
}
