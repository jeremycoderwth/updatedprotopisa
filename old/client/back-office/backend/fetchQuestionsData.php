<?php
include('../security/authentication.php');

if (isset($_GET['question_id'])) {
    $question_id = $_GET['question_id'];

    // Perform a database query to fetch question data based on $question_id
    $query = "SELECT q.question_id, q.questionText
              FROM questions q
              WHERE q.question_id = $question_id"; // Filter by question_id
    $result = mysqli_query($con, $query);

    if ($result) {
        $questionData = mysqli_fetch_assoc($result);
        echo json_encode($questionData);
    } else {
        // Handle query error
        echo json_encode(['error' => 'Query failed']);
    }
} else {
    // Handle missing question_id parameter
    echo json_encode(['error' => 'Question ID not provided']);
}
?>
