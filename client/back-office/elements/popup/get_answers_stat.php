<?php

include './../../security/dbcon.php';

$assessmentID = $_GET['assessmentID'] ?? null;

if (!$assessmentID) {
    echo json_encode(["error" => "Missing assessment ID"]);
    exit;
}

$query = "
    SELECT 
        q.question_id AS id,
        q.questionText AS question,
        COUNT(sa.answer_id) AS total_answers,
        SUM(CASE WHEN sa.isCorrect = 1 THEN 1 ELSE 0 END) AS correct_count,
        SUM(CASE WHEN sa.isCorrect = 0 THEN 1 ELSE 0 END) AS incorrect_count
    FROM student_answers sa
    JOIN studentresponse sr ON sa.response_id = sr.response_id
    JOIN questions q ON sa.questionID = q.question_id
    WHERE sr.assessmentID = ?
    GROUP BY q.question_id, q.questionText
    ORDER BY q.questionText ASC
";

$stmt = $con->prepare($query);
$stmt->bind_param("i", $assessmentID);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    $row['percent_correct'] = $row['total_answers'] > 0 
        ? round(($row['correct_count'] / $row['total_answers']) * 100, 2)
        : 0;
    $data[] = $row;
}

echo json_encode($data);
