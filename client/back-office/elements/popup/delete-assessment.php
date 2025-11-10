<?php

include './../../security/dbcon.php';

if (isset($_GET['assessment_id'])) {
    $assessmentID = $_GET['assessment_id'];

    $stmt = $con->prepare("DELETE FROM assessment WHERE assessment_id = ?");
    $stmt->bind_param("i", $assessmentID);

    if ($stmt->execute()) {
        header("Location: ./../../assessment.php?message=Assessment deleted successfully");
        exit();
    } else {
        header("Location: assessment.php?error=Error deleting assessment");
        exit();
    }
} else {
    header("Location: assessment.php");
    exit();
}