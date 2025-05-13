<?php
session_start();
require_once 'database.php';

if (!isset($_SESSION['user'])) {
    echo json_encode(['status' => 'error', 'message' => 'Not authenticated.']);
    exit;
}

$email = $_SESSION['user'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newFullname = $_POST['fullname'] ?? '';
    $newEmail = $_POST['email'] ?? '';
    $newDob = $_POST['dob'] ?? '';

    try {
        $stmt = $conn->prepare("UPDATE students SET fullname = :fullname, email = :newEmail, dob = :dob WHERE email = :email");
        $stmt->execute([
            ':fullname' => $newFullname,
            ':newEmail' => $newEmail,
            ':dob' => $newDob,
            ':email' => $email
        ]);

        // Update session if email was changed
        $_SESSION['user'] = $newEmail;

        echo json_encode(['status' => 'success']);
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
    }
}

