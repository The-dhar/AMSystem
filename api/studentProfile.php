<?php
session_start();
require_once 'database.php';

if (!isset($_SESSION['user'])) {
    echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
    exit;
}

$email = $_SESSION['user'];

try {
    $stmt = $conn->prepare("SELECT fullname, email, studentid, dob, gradelevel, created_at FROM students WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $student = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($student) {
        echo json_encode(['status' => 'success', 'data' => $student]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Student not found']);
    }
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
}

