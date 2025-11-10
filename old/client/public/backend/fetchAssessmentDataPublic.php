<?php
session_start();
include('../../config/dbcon.php');

if (isset($_SESSION['auth_user']['user_id'])) {
    header('Location: ./login.php');
    exit();
  }

if (isset($_GET['search'])) {
    $keyword = '%' . $_GET['keyword'] . '%';
    $subjectFilter = $_GET['subject_filter'];

    // Build the SQL query
    if ($subjectFilter === 'all') {
        // Search by keyword only
        $sql = "SELECT a.assessment_id, a.assessment_name, a.comment, s.subject_name, u.fname, u.lname, u.suffix
                FROM assessment AS a
                JOIN subject AS s ON a.subjectID = s.subject_id
                JOIN users AS u ON a.teacherID = u.user_id
                WHERE (a.assessment_name LIKE ? OR s.subject_name LIKE ?)
                AND a.status = 0"; // Add the status condition here
    } else {
        // Search by both subject and keyword
        $sql = "SELECT a.assessment_id, a.assessment_name, a.comment, s.subject_name, u.fname, u.lname, u.suffix
                FROM assessment AS a
                JOIN subject AS s ON a.subjectID = s.subject_id
                JOIN users AS u ON a.teacherID = u.user_id
                WHERE s.subject_id = ?
                AND (a.assessment_name LIKE ? OR s.subject_name LIKE ?)
                AND a.status = 0"; // Add the status condition here
    }
    

    // Prepare the statement
    $stmt = mysqli_prepare($con, $sql);

    if (!$stmt) {
        die("Query preparation failed: " . mysqli_error($con)); // Check for query preparation errors
    }

    // Bind parameters and execute the query
    if ($subjectFilter === 'all') {
        mysqli_stmt_bind_param($stmt, 'ss', $keyword, $keyword);
    } else {
        mysqli_stmt_bind_param($stmt, 'sss', $subjectFilter, $keyword, $keyword);
    }

    mysqli_stmt_execute($stmt);

    $html = '';
    
    // Get the result set
    $result = mysqli_stmt_get_result($stmt);

    if ($result === false) {
        die("Query execution failed: " . mysqli_error($con)); // Check for query execution errors
    }

    // Check for results
    if (mysqli_num_rows($result) > 0) {
        // Loop through the results and generate assessment cards
        while ($assessment = mysqli_fetch_assoc($result)) {
            $html .= '<div class="card w-100 p-4 custom-border">';
            $html .= '<div class="d-flex">';
            $html .= '<div class="col-9">';
            $html .= '<h5 class="card-title assessment-title-custom">' . $assessment['assessment_name'] . '</h5>';
            $html .= '<p class="card-text"><span>Posted by </span><strong>' . $assessment['fname'] . ' ' . $assessment['lname'] . ' ' . $assessment['suffix'] . '</strong></p>';
            $html .= '</div>';
            // Check if the user is authenticated (logged in)
            if (isset($_SESSION['auth_user']['user_id'])) {
                $html .= '<div class="col-3 align-items-center justify-content-center">';
                $html .= '<a type="button" class="btn-takeAssessment text-middle" href="takeAssessment.php?assessment_id=' . $assessment['assessment_id'] . '">';
                $html .= '<span>Take Assessment</span>';
                $html .= '</a>';
            } else {
                // If not authenticated, provide a link to the login page
                $html .= '<div class="col-3 d-flex align-items-center justify-content-center">';
                $html .= '<a type="button" class="btn btn-primary text-middle" href="Login.php">';
                $html .= '<span>Login to take Assessment</span>';
                $html .= '</a>';
            }
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            
        }
    } else {
        $html = 'No assessments found.'; // Display a message if no assessments are found
    }

    // Close the statement
    mysqli_stmt_close($stmt);

    // Output the generated HTML
    echo $html;
} else {
    echo 'No search request received.'; // Display a message if no search request is detected
}

// Close the database connection
mysqli_close($con);
?>
