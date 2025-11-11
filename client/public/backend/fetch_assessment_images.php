<?php

session_start();

include '../../config/dbcon.php';

if (isset($_GET['assessment_id'])) {
    $assessmentID = $_GET['assessment_id'];

    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'];
    $imageFolder = '/clonepisa-main/client/back-office/assessment-files/';

    $query = "SELECT attach_file, assessment_id FROM assessment WHERE assessment_id = ?";

    $stmt = $con->prepare($query);
    $stmt->bind_param('i', $assessmentID);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $id = $row['assessment_id'];
        $attach_file = $protocol . $host . $imageFolder . $row['attach_file'] ?: 'FixingScienceLead.0.jpg';
        echo json_encode([
            'attach_file' => $attach_file,
            'id' => $id
        ]);
    } else {
        echo json_encode(['error' => 'Assessment not found']);
    }
}