<?php

session_start();

// include '../../config/dbcon.php';
include './../../security/dbcon.php';

if (isset($_GET['assessment_id'])) {
    $assessment_id = intval($_GET['assessment_id']);

    // Fetch assessment details + subject
    $sql = "SELECT 
                a.assessment_id, 
                a.assessment_name, 
                a.comment, 
                a.attach_file, 
                s.subject_name
            FROM assessment a
            LEFT JOIN subject s ON a.subjectID = s.subject_id
            WHERE a.assessment_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $assessment_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {

        // Default thumbnail if none exists
        if (empty($row['attach_file'])) {
            $row['attach_file'] = 'http://localhost/clonepisa-main/client/back-office/assessment-files/FixingScienceLead.0.jpg';
        }

        // Fetch questions belonging to this assessment
        $questionQuery = "
            SELECT 
                q.question_id,
                q.questionText,
                q.image_attachment
            FROM questions q
            WHERE q.assessmentID = ?
        ";
        $stmt2 = $con->prepare($questionQuery);
        $stmt2->bind_param("i", $assessment_id);
        $stmt2->execute();
        $questionsResult = $stmt2->get_result();

        $questions = [];

        while ($qRow = $questionsResult->fetch_assoc()) {
            $question_id = $qRow['question_id'];

            // Fetch choices for this specific question
            $choiceQuery = "
                SELECT 
                    c.choice_id,
                    c.choiceText,
                    c.IsCorrectChoice
                FROM choices c
                WHERE c.questionID = ?
            ";
            $stmt3 = $con->prepare($choiceQuery);
            $stmt3->bind_param("i", $question_id);
            $stmt3->execute();
            $choicesResult = $stmt3->get_result();

            $choices = [];
            while ($cRow = $choicesResult->fetch_assoc()) {
                $choices[] = $cRow;
            }

            $qRow['choices'] = $choices; // attach choices to this question
            $questions[] = $qRow;

            $stmt3->close();
        }

        $row['questions'] = $questions; // attach question list to assessment data

        echo json_encode($row, JSON_UNESCAPED_UNICODE);

    } else {
        echo json_encode(['error' => 'Assessment not found']);
    }

    $stmt->close();
    $stmt2->close();
    $con->close();
}
