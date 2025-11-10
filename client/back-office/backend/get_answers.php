<?php

require '../security/authentication.php';

$assessmentID = $_GET['assessment_id'];
$studentID = $_GET['student_id'];

$query = "
SELECT q.question_id as id, q.questionText AS question, c.choiceText AS student_answer, c2.choiceText AS correct_answer, sa.isCorrect FROM student_answers sa JOIN questions q ON sa.questionID = q.question_id JOIN choices c ON sa.choiceID = c.choice_id JOIN choices c2 ON c2.questionID = q.question_id AND c2.isCorrectChoice = 0 JOIN studentresponse sr ON sa.response_id = sr.response_id WHERE sr.assessmentID = ? AND sr.studentID = ? GROUP BY q.question_id, c.choiceText, sa.isCorrect ORDER BY q.question_id ASC
";

$stmt = $con->prepare($query);
$stmt->bind_param("ii", $assessmentID, $studentID);
$stmt->execute();
$result = $stmt->get_result(); 

$answers = [];
while ($row = $result->fetch_assoc()) {
    $answers[] = $row;
}

echo json_encode($answers);
