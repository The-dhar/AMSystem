<?php
include 'database.php'; 
header("Content-Type: application/json");

try {
    $query = "SELECT 
            schedule.class_id,
            classes.name AS class_name,
            schedule.subject_id,
            subjects.name AS subject_name,
            schedule.day,
            schedule.start_time,
            schedule.end_time,
            schedule.room,
            schedule.status,
            teachers.fullname AS teacher_name
            FROM schedule
            LEFT JOIN classes ON schedule.class_id = classes.id
            LEFT JOIN subjects ON schedule.subject_id = subjects.id
            LEFT JOIN teachers ON schedule.teacher_id = teachers.id
    ";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $scheduleData = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($scheduleData);

} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}