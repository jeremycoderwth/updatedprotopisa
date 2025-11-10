<?php

include '../config/dbcon.php';

$data = json_decode(file_get_contents("php://input"), true);

$responseID   = $data['responseID'] ?? null;
$studentID    = $data['studentID'] ?? null;
$assessmentID = $data['assessmentID'] ?? null;
$questionID   = $data['questionID'] ?? null;
$choiceID     = $data['choiceID'] ?? null;

if (!$responseID || !$studentID || !$assessmentID || !$questionID || !$choiceID) {
    echo json_encode(["success" => false, "message" => "Missing data"]);
    exit;
}

// Check if the chosen answer is correct
$stmt = $con->prepare("SELECT IsCorrectChoice FROM choices WHERE choice_id = ?");
$stmt->bind_param("i", $choiceID);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$isCorrect = $row ? (int)$row['IsCorrectChoice'] : 0;

// Insert the student's answer
$insert = $con->prepare("
    INSERT INTO student_answers (response_id, studentID, assessmentID, questionID, choiceID, isCorrect)
    VALUES (?, ?, ?, ?, ?, ?)
");
$insert->bind_param("iiiiii", $responseID, $studentID, $assessmentID, $questionID, $choiceID, $isCorrect);

if ($insert->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "message" => "Failed to save answer"]);
}
