<?php
session_start();
include('../../config/dbcon.php');

// Fetch all available assessments
$sql = "SELECT a.assessment_id, a.assessment_name, a.comment, s.subject_name, u.fname, u.lname, u.suffix
        FROM assessment AS a
        JOIN subject AS s ON a.subjectID = s.subject_id
        JOIN users AS u ON a.teacherID = u.user_id
        WHERE a.status = 0";
$result = mysqli_query($con, $sql);

// Initialize an empty HTML variable to store all assessments
$html = '';

// Loop through the results and generate assessment cards
if ($result) {
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

// Output the generated HTML
echo $html;

// Close the database connection
mysqli_close($con);
?>
