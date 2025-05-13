<?php
session_start();
require_once '../api/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $studentid = $_POST['studentid'];
    $dob = $_POST['dob'];
    $gradelevel = $_POST['gradelevel'];
    $password = $_POST['password']; // Raw password from frontend

    // Validate input
    if (empty($fullname) || empty($email) || empty($studentid) || empty($dob) || empty($gradelevel) || empty($password)) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
        exit;
    }

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    try {
        // Insert the user data along with the hashed password
        $stmt = $conn->prepare('INSERT INTO students (fullname, email, studentid, dob, gradelevel, password) VALUES (:fullname, :email, :studentid, :dob, :gradelevel, :password)');
        $stmt->execute([
            ':fullname' => $fullname,
            ':email' => $email,
            ':studentid' => $studentid,
            ':dob' => $dob,
            ':gradelevel' => $gradelevel,
            ':password' => $hashedPassword
        ]);

        echo json_encode(['status' => 'success', 'message' => 'Registration successful!']);
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}

