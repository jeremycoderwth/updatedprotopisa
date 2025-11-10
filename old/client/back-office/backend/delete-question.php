<?php
include('../security/authentication.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $questionId = $_POST["questionId"];
    

    $query = "DELETE FROM questions WHERE question_id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $questionId);
    $result = $stmt->execute();

    if ($result) {
        echo 'success';
    } else {
        echo 'error';
    }

    $con->close();
} else {
    echo 'Invalid request.';
}
?>
