<?php

session_start();

// include '../../config/dbcon.php';
include './../../security/dbcon.php';

if (isset($_GET['assessment_id'])) {
    $assessment_id = intval($_GET['assessment_id']);

    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'];

    $imageFolder = '/clonepisa-main/client/back-office/assessment-files/';
    $imageAttachmentFolder = '/clonepisa-main/client/back-office/assessment-files/image-attachments/';

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

        if (empty($row['attach_file'])) {
            $row['attach_file'] = $protocol . $host . $imageFolder . 'FixingScienceLead.0.jpg';
        } else {
            $row['attach_file'] = $protocol . $host . $imageFolder . $row['attach_file'];
        }

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
            $qRow['image_attachment'] = empty($qRow['image_attachment']) ? 
                $protocol . $host . $imageAttachmentFolder . 'FixingScienceLead.0.jpg' : 
                $protocol . $host . $imageAttachmentFolder . $qRow['image_attachment'];

            $question_id = $qRow['question_id'];

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

            $qRow['choices'] = $choices;
            $questions[] = $qRow;

            $stmt3->close();
        }

        $row['questions'] = $questions;

        echo json_encode($row, JSON_UNESCAPED_UNICODE);

    } else {
        echo json_encode(['error' => 'Assessment not found']);
    }

    $stmt->close();
    $stmt2->close();
    $con->close();
}
