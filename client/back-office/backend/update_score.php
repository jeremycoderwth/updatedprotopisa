<?php

include '../../config/dbcon.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);
$response_id = $data['response_id'];
$total_score = $data['total_score'];
echo var_dump($total_score);

$stmt = $con->prepare("UPDATE studentresponse SET score = ? WHERE response_id = ?");
$stmt->bind_param("ii", $total_score, $response_id);
$stmt->execute();

echo json_encode(["success" => true]);
$stmt->close();
$con->close();
