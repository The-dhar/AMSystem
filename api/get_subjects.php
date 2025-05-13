<?php
include 'database.php'; 
header("Content-Type: application/json");

try {
    $stmt = $conn->query("SELECT id, name FROM subjects ORDER BY name ASC");
    $subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(['success' => true, 'data' => $subjects]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}