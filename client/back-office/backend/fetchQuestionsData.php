<?php
include('../security/authentication.php');

if (isset($_GET['question_id'])) {
    $question_id = $_GET['question_id'];

    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'];
    $imageFolder = '/clonepisa-main/client/back-office/assessment-files/image-attachments/';

    // Perform a database query to fetch question data based on $question_id
    $query = "SELECT q.question_id, q.questionText, q.rationale, q.image_attachment
              FROM questions q
              WHERE q.question_id = $question_id"; // Filter by question_id
    $result = mysqli_query($con, $query);

    if ($row = $result->fetch_assoc()) {
        if (empty($row['image_attachment'])) {
            $row['image_attachment'] = $protocol . $host . $imageFolder . 'FixingScienceLead.0.jpg';
        } else {
            $row['image_attachment'] = $protocol . $host . $imageFolder . $row['image_attachment'];
        }
        
        echo json_encode($row);
    } else {
        // Handle query error
        echo json_encode(['error' => 'Query failed']);
    }
} else {
    // Handle missing question_id parameter
    echo json_encode(['error' => 'Question ID not provided']);
}

