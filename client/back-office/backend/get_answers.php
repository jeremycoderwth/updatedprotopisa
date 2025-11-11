<?php

require '../security/authentication.php';

$assessmentID = $_GET['assessment_id'];
$studentID = $_GET['student_id'];
$responseID = $_GET['response_id'];

$query = "
SELECT 
    q.question_id AS id,
    q.questionText AS question,
    c.choiceText AS student_answer,
    c2.choiceText AS correct_answer,
    sa.isCorrect,
    sa.created_at
FROM student_answers sa
JOIN questions q 
    ON sa.questionID = q.question_id
JOIN choices c 
    ON sa.choiceID = c.choice_id
JOIN choices c2 
    ON c2.questionID = q.question_id AND c2.isCorrectChoice = 0
WHERE sa.response_id = ?
ORDER BY sa.created_at ASC
";

$stmt = $con->prepare($query);
$stmt->bind_param("i", $responseID);
$stmt->execute();
$result = $stmt->get_result(); 

$answers = [];
while ($row = $result->fetch_assoc()) {
    $answers[] = $row;
}

echo json_encode($answers);
