<?php
include 'database.php'; 
header("Content-Type: application/json");

try {
    $stmt = $conn->query("SELECT id, name FROM classes ORDER BY name ASC");
    $classes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(['success' => true, 'data' => $classes]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
