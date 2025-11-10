<?php

include '../security/authentication.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $question_id = $_POST['question_id'];
    $question_text = $_POST['question'];
    $choices = $_POST['choice']; // ["Answer A", "Answer B", ...]
    $isCorrects = $_POST['is_correct_choice']; // ["1", "0", ...]
    $choiceIds = $_POST['choice_id'];
    $explanation = $_POST['explanation'];

    $imagePath = null;

    if (isset($_FILES['question_image']) && $_FILES['question_image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../assessment-files/image-attachments/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $fileName = time() . '_' . basename($_FILES['question_image']['name']);
        $targetFilePath = $uploadDir . $fileName;

        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($fileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES['question_image']['tmp_name'], $targetFilePath)) {
                $imagePath = 'http://localhost/clonepisa-main/client/back-office/assessment-files/image-attachments/' . $fileName;
            }
        }
    }

    if ($imagePath) {
        $sql = "UPDATE questions 
                SET questionText = ?, image_attachment = ?, rationale = ?
                WHERE question_id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param('sssi', $question_text, $imagePath, $explanation, $question_id);
    } else {
        $sql = "UPDATE questions 
                SET questionText = ?, rationale = ?
                WHERE question_id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param('ssi', $question_text, $explanation, $question_id);
    }

    if (!$stmt->execute()) {
        echo 'error';
        exit;
    }
    $stmt->close();

    foreach ($choices as $index => $choiceText) {
        $choiceText = trim($choiceText);
        $isCorrect = isset($isCorrects[$index]) ? intval($isCorrects[$index]) : 1; // default wrong (1)
        $choiceId = isset($choiceIds[$index]) ? intval($choiceIds[$index]) : null;

        if ($choiceId) {
            $stmt = $con->prepare("
                UPDATE choices
                SET choiceText = ?, IsCorrectChoice = ?
                WHERE choice_id = ? AND questionID = ?
            ");
            $stmt->bind_param('siii', $choiceText, $isCorrect, $choiceId, $question_id);
            $stmt->execute();
            $stmt->close();
        } else {
            // optional: insert new choice if no choiceId provided
            $stmt = $con->prepare("INSERT INTO choices (questionID, choiceText, IsCorrectChoice) VALUES (?, ?, ?)");
            $stmt->bind_param('isi', $question_id, $choiceText, $isCorrect);
            $stmt->execute();
            $stmt->close();
        }
    }
    echo 'success';
    $con->close();
}
