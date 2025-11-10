<?php
session_start();
include('../../config/dbcon.php'); // Include your database connection script

// Read the raw POST data as JSON
$data = json_decode(file_get_contents('php://input'), true);

if ($data !== null && isset($data['assessmentID'], $data['totalScore'])) {
    
    $assessmentID = $data['assessmentID'];
    $studentID = $_SESSION['auth_user']['user_id'];
    $totalScore = $data['totalScore'];

    $insertQuery = "INSERT INTO studentresponse (studentID, assessmentID, score, date_answered) VALUES (?, ?, ?, NOW())";
    $stmt = mysqli_prepare($con, $insertQuery);

    if (!$stmt) {
        die("Query preparation failed: " . mysqli_error($con));
    }

    // Bind the parameters
    mysqli_stmt_bind_param($stmt, 'iii', $studentID, $assessmentID, $totalScore);

    // Execute the query
    $result = mysqli_stmt_execute($stmt);

    // Close the statement
    mysqli_stmt_close($stmt);

    if ($result) {
        // Successfully inserted the user response
        echo 'Quiz submitted successfully.';
    } else {
        // Failed to insert the user response
        echo 'Failed to submit quiz.';
        echo 'Server error:', mysqli_error($con);
    }
} else {
    // If the request data is missing or incorrect, return an error message
    echo 'Invalid request data.';
}

// Close the database connection
mysqli_close($con);
?>
