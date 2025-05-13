<?php
include 'database.php'; // Include the database connection

// The following variables are just placeholders, modify them as needed based on your data source
$schoolYear = '2020-2021'; // Example school year
$gradeLevel = 'Grade 10';  // Example grade level
$semester = '1st Semester'; // Example semester

try {
    // Query to fetch the student attendance for the selected school year, grade level, and semester
    $query = "
        SELECT s.subject, COUNT(a.id) AS total, 
            SUM(CASE WHEN a.status = 'Present' THEN 1 ELSE 0 END) AS present
        FROM attendance a
        JOIN schedule s ON a.schedule_id = s.id
        WHERE s.school_year = :schoolYear
            AND s.grade_level = :gradeLevel
            AND s.semester = :semester
        GROUP BY s.subject
    ";

    // Prepare the statement using the correct connection variable
    $stmt = $conn->prepare($query);

    // Bind parameters to the SQL query
    $stmt->bindParam(':schoolYear', $schoolYear, PDO::PARAM_STR);
    $stmt->bindParam(':gradeLevel', $gradeLevel, PDO::PARAM_STR);
    $stmt->bindParam(':semester', $semester, PDO::PARAM_STR);
    
    // Execute the query
    $stmt->execute();
    
    // Fetch all results
    $attendanceData = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Prepare the response data
    $response = [
        'Filipino' => 0,
        'Math' => 0,
        'English' => 0
    ];

    // Populate the response with calculated attendance percentages
    foreach ($attendanceData as $row) {
        $attendancePercentage = ($row['total'] > 0) ? ($row['present'] / $row['total']) * 100 : 0;

        switch ($row['subject']) {
            case 'Filipino':
                $response['Filipino'] = round($attendancePercentage, 2);
                break;
            case 'Math':
                $response['Math'] = round($attendancePercentage, 2);
                break;
            case 'English':
                $response['English'] = round($attendancePercentage, 2);
                break;
        }
    }

    // Return the response as JSON
    echo json_encode($response);

} catch (PDOException $e) {
    // Handle database connection or query errors
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}

