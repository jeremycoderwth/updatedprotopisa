<?php

session_start();

include './../../config/dbcon.php';

if (!isset($_SESSION['auth_user']['user_id']) && $_SESSION['auth_role'] !== 2) {
    die(json_encode(['error' => 'Unauthorized access']));
}

$student_id = $_SESSION['auth_user']['user_id'];

$sql = "
    SELECT 
        sa.assessmentID,
        a.assessment_name,
        q.question_id,
        q.questionText,
        c.choiceText,
        sa.isCorrect,
        s.subject_name,
        COUNT(DISTINCT sa.questionID) AS total_answered,
        SUM(sa.isCorrect) AS total_correct
    FROM student_answers sa
    INNER JOIN assessment a ON sa.assessmentID = a.assessment_id
    INNER JOIN questions q ON sa.questionID = q.question_id
    INNER JOIN choices c ON sa.choiceID = c.choice_id
    INNER JOIN subject s ON a.subjectID = s.subject_id
    WHERE sa.studentID = ?
    GROUP BY sa.assessmentID, a.assessment_name, s.subject_name, q.question_id, q.questionText, c.choiceText, sa.isCorrect
    ORDER BY sa.assessmentID DESC
";

$stmt = $con->prepare($sql);
$stmt->bind_param("i", $student_id);
$stmt->execute();
$result = $stmt->get_result();

$assessments = [];

while ($row = $result->fetch_assoc()) {
    $assessments[] = $row;
}

echo json_encode($assessments, JSON_UNESCAPED_UNICODE);
