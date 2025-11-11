<?php
include('../security/authentication.php');

// Assuming you have a database connection established

if (isset($_GET['assessment_id'])) {
    $assessment_id = $_GET['assessment_id'];

    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'];
    $imageFolder = '/clonepisa-main/client/back-office/assessment-files/';

    // Perform a database query to fetch assessment data based on $assessment_id
    $query = "SELECT a.assessment_id, a.assessmentCode, a.assessment_name, a.comment, a.subjectID, s.subject_name, u.fname, u.lname, u.suffix, a.status, a.attach_file FROM assessment a
                LEFT JOIN subject s ON a.subjectID = s.subject_id
                LEFT JOIN users u ON a.teacherID = u.user_id
                WHERE a.assessment_id = $assessment_id";
    $result = mysqli_query($con, $query);
    
    if ($row = $result->fetch_assoc()) {
        if (empty($row['attach_file'])) {
            $row['attach_file'] = $protocol . $host . $imageFolder . 'FixingScienceLead.0.jpg';
        } else {
            $row['attach_file'] = $protocol . $host . $imageFolder . $row['attach_file'];
        }

        echo json_encode($row);
    } else {
        // Handle query error
        echo json_encode(['error' => 'Query failed']);
    }
} else {
    // Handle missing assessment_id parameter
    echo json_encode(['error' => 'Assessment ID not provided']);
}
?>
