<?php

header('Content-Type: application/json');
require_once 'database.php';

$class = isset($_GET['class']) ? $_GET['class'] : null;

if (!$class) {
    echo json_encode(["error" => "Missing class"]);
    exit;
}

try {
    // Remove the date filter to get all records for the given class
    $stmt = $conn->prepare("SELECT a.student_id, s.fullname, a.status
                           FROM attendance a
                           JOIN schedule sch ON a.schedule_id = sch.id
                           JOIN students s ON a.student_id = s.id
                           WHERE sch.class_id IN (SELECT id FROM classes WHERE name = :class)");
    $stmt->execute(['class' => $class]);
    $attendance = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($attendance);
} catch (Exception $e) {
    echo json_encode(["error" => "Database query failed: " . $e->getMessage()]);
}

