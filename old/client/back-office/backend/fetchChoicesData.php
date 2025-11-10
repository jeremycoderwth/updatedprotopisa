<?php
include('../security/authentication.php');

if (isset($_GET['question_id'])) {
    $question_id = $_GET['question_id'];

    // Perform a database query to fetch choices data based on $question_id
    $query = "SELECT choiceText, IsCorrectChoice FROM choices WHERE questionID = $question_id";
    $result = mysqli_query($con, $query);

    if ($result) {
        $choicesData = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $choicesData[] = $row;
        }
        echo json_encode($choicesData);
    } else {
        // Handle query error
        echo json_encode(['error' => 'Query failed']);
    }
} else {
    // Handle missing question_id parameter
    echo json_encode(['error' => 'Question ID not provided']);
}
?>
