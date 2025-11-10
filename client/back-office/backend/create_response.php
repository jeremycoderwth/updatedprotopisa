<?php

include '../../config/dbcon.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);
$assessment_id = $data['assessment_id'];
$student_id = $data['student_id'];

$stmt = $con->prepare("INSERT INTO studentresponse (assessmentID, studentID, score, date_answered) VALUES (?, ?, 0, NOW())");
$stmt->bind_param("ii", $assessment_id, $student_id);
$stmt->execute();

$response_id = $con->insert_id;

echo json_encode(["success" => true, "response_id" => $response_id]);
$stmt->close();
$con->close();
