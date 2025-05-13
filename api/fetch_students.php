<?php
require 'db_connection.php';

$date = $_GET['date'] ?? null;

if (!$date) {
    http_response_code(400);
    echo json_encode(['error' => 'Date is required']);
    exit;
}

try {
    // Fetch all students (static list or based on a class in real use)
    $stmt = $pdo->prepare("SELECT student_id, name FROM students");
    $stmt->execute();
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($students);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
