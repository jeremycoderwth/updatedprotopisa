<?php
session_start();
include('../../config/dbcon.php'); // Include your database connection script

if (isset($_GET['assessment_id'])) {
    $assessmentID = $_GET['assessment_id'];

    // Query to fetch questions and choices based on the assessment ID
    $query = "SELECT q.question_id, q.questionText, c.choice_id, c.choiceText, c.isCorrectChoice
            FROM questions AS q
            LEFT JOIN choices AS c ON q.question_id = c.questionID
            WHERE q.assessmentID = ?";

    // Prepare the statement
    $stmt = mysqli_prepare($con, $query);

    if (!$stmt) {
        die("Query preparation failed: " . mysqli_error($con));
    }

    // Bind the assessment ID parameter
    mysqli_stmt_bind_param($stmt, 'i', $assessmentID);

    // Execute the query
    mysqli_stmt_execute($stmt);

    // Fetch the result as an associative array
    $result = mysqli_stmt_get_result($stmt);

    $quizData = []; // Array to store quiz data

    // Loop through the results and organize data into an array
    while ($row = mysqli_fetch_assoc($result)) {
        $questionID = $row['question_id'];
        $questionText = $row['questionText'];
        $choiceID = $row['choice_id'];
        $choiceText = $row['choiceText'];
        $isCorrectChoice = $row['isCorrectChoice'];

        // Check if the question already exists in the quizData array
        $existingQuestion = array_search($questionID, array_column($quizData, 'id'));

        if ($existingQuestion === false) {
            // Question not found, add it to the array
            $quizData[] = [
                'id' => $questionID,
                'question' => $questionText,
                'options' => [],
                'correct' => null,
            ];
            $existingQuestion = count($quizData) - 1;
        }

        $quizData[$existingQuestion]['options'][] = $choiceText;

        // Set the correct answer for the question
        if ($isCorrectChoice == 0) {
            $quizData[$existingQuestion]['correct'] = $choiceText;
        }
    }

    // Close the statement
    mysqli_stmt_close($stmt);

    // Output the quiz data as JSON
    echo json_encode($quizData);
} else {
    echo 'Assessment ID not provided.';
}

// Close the database connection
mysqli_close($con);
?>