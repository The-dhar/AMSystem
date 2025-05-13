<?php

$host = 'sql207.infinityfree.com';
$dbname = 'if0_38973110_amsystemdb';
$username = 'if0_38973110';
$password = '9VXR6EfRIB296z';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Enable exceptions for errors
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed: ' . $e->getMessage()]);
    exit(); 
}
