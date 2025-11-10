<?php

session_start();

include '../../config/dbcon.php';

if (!isset($_SESSION['auth_user']['user_id'])) {
    header("Location: ../login.php");
    exit;
}

$student_id = $_SESSION['auth_user']['user_id'];
$assessment_id = intval($_GET['assessment_id'] ?? 0);

if ($assessment_id <= 0) {
    die("Invalid assessment ID.");
}

// Fetch assessment details
$assessmentQuery = "
    SELECT 
        a.assessment_name,
        a.comment,
        a.attach_file,
        s.subject_name
    FROM assessment a
    LEFT JOIN subject s ON a.subjectID = s.subject_id
    WHERE a.assessment_id = ?
";
$stmt = $con->prepare($assessmentQuery);
$stmt->bind_param("i", $assessment_id);
$stmt->execute();
$assessment = $stmt->get_result()->fetch_assoc();
$stmt->close();

$defaultImage = 'http://localhost/clonepisa-main/client/back-office/assessment-files/FixingScienceLead.0.jpg';
$assessmentImage = !empty($assessment['attach_file']) ? $assessment['attach_file'] : $defaultImage;

$query = "
    SELECT 
        q.question_id,
        q.questionText,
        q.image_attachment AS question_image,
        sa.choiceID AS selected_choice,
        c.choiceText AS selected_choice_text,
        correct.choiceText AS correct_choice_text
    FROM questions q
    LEFT JOIN student_answers sa 
        ON sa.questionID = q.question_id 
        AND sa.studentID = ?
        AND sa.assessmentID = ?
    LEFT JOIN choices c 
        ON c.choice_id = sa.choiceID
    LEFT JOIN choices correct
        ON correct.questionID = q.question_id
        AND correct.IsCorrectChoice = 0
    WHERE q.assessmentID = ?
    GROUP BY q.question_id
";

$stmt2 = $con->prepare($query);
$stmt2->bind_param("iii", $student_id, $assessment_id, $assessment_id);
$stmt2->execute();
$result = $stmt2->get_result();

$questions = [];
$score = 0;
$total = 0;

while ($row = $result->fetch_assoc()) {
    $total++;

    // Compare the selected choice and correct choice
    if (trim((string)$row['selected_choice_text']) === trim((string)$row['correct_choice_text'])) {
        $score++;
    }

    $questions[] = $row;
}

$stmt2->close();
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Assessment Answers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-4">
    <a href="./../Student_dashboard.php" class="btn btn-secondary mb-3">&larr; Back to Dashboard</a>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h4><?= htmlspecialchars($assessment['assessment_name'] ?? 'Assessment') ?></h4>
            <p class="text-muted mb-1"><?= htmlspecialchars($assessment['subject_name'] ?? 'Unknown Subject') ?></p>
            <p><?= htmlspecialchars($assessment['comment'] ?? '') ?></p>
            <div class="text-center mt-3">
                <img src="<?= htmlspecialchars($assessmentImage) ?>" 
                     alt="Assessment Image" 
                     class="rounded" 
                     style="max-width: 100%; height: 250px; object-fit: cover;">
            </div>
        </div>
    </div>

    <div class="alert alert-info">
        <strong>Score:</strong> <?= $score ?> / <?= $total ?>
    </div>

    <?php foreach ($questions as $index => $q): ?>
        <div class="card mb-3">
            <div class="card-body">
                <h6>Question <?= $index + 1 ?>:</h6>
                <p><?= htmlspecialchars($q['questionText']) ?></p>

                <!-- Display image for question or fallback -->
                <?php
                $questionImage = $q['question_image'] ?: $assessmentImage;
                if (empty($q['question_image']) && empty($assessment['attach_file'])) {
                    $questionImage = $defaultImage;
                }
                ?>
                <div class="text-center mb-3">
                    <img src="<?= htmlspecialchars($questionImage) ?>" 
                         alt="Question Image" 
                         class="img-fluid rounded" 
                         style="max-width: 100%; height: 200px; object-fit: cover;">
                </div>

                <p><strong>Your Answer:</strong> 
                    <span class="<?= ($q['selected_choice_text'] === $q['correct_choice_text']) ? 'text-success' : 'text-danger' ?>">
                        <?= htmlspecialchars($q['selected_choice_text'] ?? 'No answer') ?>
                    </span>
                </p>

                <p><strong>Correct Answer:</strong> 
                    <span class="text-success"><?= htmlspecialchars($q['correct_choice_text']) ?></span>
                </p>
            </div>
        </div>
    <?php endforeach; ?>

    <?php if (empty($questions)): ?>
        <p class="text-muted">No answers found for this assessment.</p>
    <?php endif; ?>
</div>
</body>
</html>