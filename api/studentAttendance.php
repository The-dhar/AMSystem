<?php
session_start();
include('database.php');
header('Content-Type: application/json');

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
    exit;
}

$email = $_SESSION['user'];

try {
    // Get the student_id based on the email
    $studentQuery = $conn->prepare("SELECT id FROM students WHERE email = :email");
    $studentQuery->bindParam(':email', $email);
    $studentQuery->execute();
    $student = $studentQuery->fetch(PDO::FETCH_ASSOC);

    if (!$student) {
        echo json_encode(['status' => 'error', 'message' => 'Student not found']);
        exit;
    }

    $student_id = $student['id'];

    // Get attendance for that student
    $sql = "
        SELECT
            s.name AS subject_name, 
            LOWER(REPLACE(s.name, ' ', '')) AS code,
            COUNT(CASE WHEN a.status = 'Present' THEN 1 END) AS present,
            COUNT(CASE WHEN a.status = 'Absent' THEN 1 END) AS absent,
            COUNT(CASE WHEN a.status = 'Excused' THEN 1 END) AS excused,
            COUNT(a.id) AS total,
            ROUND(
                (COUNT(CASE WHEN a.status = 'Present' THEN 1 END) / 
                NULLIF(COUNT(a.id), 0)) * 100, 2
            ) AS percentage
        FROM attendance a
        JOIN schedule sc ON a.schedule_id = sc.id
        JOIN subjects s ON sc.subject_id = s.id
        WHERE a.student_id = :student_id
        GROUP BY s.name
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);
    $stmt->execute();
    $attendance = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($attendance as &$subject) {
        if (!isset($subject['percentage']) || !is_numeric($subject['percentage'])) {
            $subject['percentage'] = 0;
        }
    }

    echo json_encode(['status' => 'success', 'attendance' => $attendance]);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()]);
}

