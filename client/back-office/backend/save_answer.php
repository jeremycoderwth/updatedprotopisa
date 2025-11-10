<?php

include '../../config/dbcon.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);

$response_id = $data['response_id'] ?? null;
$student_id = $data['student_id'] ?? null;
$assessment_id = $data['assessment_id'] ?? null;
$question_id = $data['question_id'] ?? null;
$choice_text = $data['choice_text'] ?? null;
$is_correct = $data['is_correct'] ?? 0;

// Get the choice_id from the choices table
$choiceQuery = $con->prepare("SELECT choice_id FROM choices WHERE choiceText = ? AND questionID= ?");
$choiceQuery->bind_param("si", $choice_text, $question_id);
$choiceQuery->execute();
$choiceResult = $choiceQuery->get_result();
$choiceRow = $choiceResult->fetch_assoc();
$choice_id = $choiceRow['choice_id'] ?? null;
$choiceQuery->close();

if (!$choice_id) {
    echo json_encode(["success" => false, "message" => "Choice not found."]);
    exit;
}

// Insert or update student answer
$stmt = $con->prepare("
    INSERT INTO student_answers (response_id, studentID, assessmentID, questionID, choiceID, isCorrect)
    VALUES (?, ?, ?, ?, ?, ?)
");
$stmt->bind_param("iiiiii", $response_id, $student_id, $assessment_id, $question_id, $choice_id, $is_correct);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Answer recorded"]);
} else {
    echo json_encode(["success" => false, "message" => "DB error", "error" => $stmt->error]);
}

$stmt->close();
$con->close();
