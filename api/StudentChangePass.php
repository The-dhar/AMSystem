<?php
session_start();
require_once 'database.php';

if (!isset($_SESSION['user'])) {
    echo json_encode(['status' => 'error', 'message' => 'Not authenticated.']);
    exit;
}

$email = $_SESSION['user'];

$currentPassword = $_POST['currentPassword'] ?? '';
$newPassword = $_POST['newPassword'] ?? '';

if (empty($currentPassword) || empty($newPassword)) {
    echo json_encode(['status' => 'error', 'message' => 'Please provide both current and new password.']);
    exit;
}

try {
    $stmt = $conn->prepare("SELECT password FROM students WHERE email = :email");
    $stmt->execute([':email' => $email]);
    $student = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($student) {
        // Verify current password
        if (password_verify($currentPassword, $student['password'])) {
            // Hash new password before storing
            $hashedNewPassword = password_hash($newPassword, PASSWORD_BCRYPT);

            $updateStmt = $conn->prepare("UPDATE students SET password = :newPassword WHERE email = :email");
            $updateStmt->execute([':newPassword' => $hashedNewPassword, ':email' => $email]);

            echo json_encode(['status' => 'success', 'message' => 'Password updated successfully!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Current password is incorrect.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'User not found.']);
    }
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
}
?>
