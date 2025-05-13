<?php
include 'database.php'; 

header("Content-Type: application/json");
$data = json_decode(file_get_contents("php://input"), true);

try {
    $query = "INSERT INTO schedule (class_id, subject_id, day, start_time, end_time, room, status)
              VALUES (:class_id, :subject_id, :day, :start_time, :end_time, :room, :status)";

    $stmt = $conn->prepare($query);
    $stmt->execute([
        ':class_id' => $data['class_id'],
        ':subject_id' => $data['subject_id'],
        ':day' => $data['day'],
        ':start_time' => $data['start_time'],
        ':end_time' => $data['end_time'],
        ':room' => $data['room'],
        ':status' => $data['status']
    ]);

    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
