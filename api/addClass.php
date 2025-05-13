<?php
require_once 'database.php'; 
$inputData = json_decode(file_get_contents("php://input"));

if (!isset($inputData->student_id) || !isset($inputData->schedule_id) || !isset($inputData->date) || !isset($inputData->status)) {
    echo json_encode(['success' => false, 'message' => 'Missing required fields.']);
    exit();
}

$student_id = $inputData->student_id;
$schedule_id = $inputData->schedule_id;
$date = $inputData->date;
$status = $inputData->status;

try {
    global $conn;

    // Prepare SQL statement
    $sql = "INSERT INTO attendance (student_id, schedule_id, date, status) VALUES (:student_id, :schedule_id, :date, :status)";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':student_id', $student_id);
    $stmt->bindParam(':schedule_id', $schedule_id);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':status', $status);

    // Execute the query
    $stmt->execute();

    // Respond with success message
    echo json_encode(['success' => true, 'message' => 'Attendance added successfully.']);
} catch (PDOException $e) {
    // Respond with error message
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}
?>
