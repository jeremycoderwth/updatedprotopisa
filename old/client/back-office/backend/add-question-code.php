<?php
include('../security/authentication.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $assessmentId = $_POST["assessment_id"];
    $questionText = $_POST["question"];
    $imageAttachment = "";
    $videoAttachment = "";
    
    // Check if an image file is uploaded
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
        $imageAttachment = $_FILES["image"]["name"];
        $imageTargetPath = "../assessment-files/imageAttachments/" . $imageAttachment;
        move_uploaded_file($_FILES["image"]["tmp_name"], $imageTargetPath);
    }
    
    // Check if a video file is uploaded
    if (isset($_FILES["video"]) && $_FILES["video"]["error"] === UPLOAD_ERR_OK) {
        $videoAttachment = $_FILES["video"]["name"];
        $videoTargetPath = "../assessment-files/videoAttachments/" . $videoAttachment;
        move_uploaded_file($_FILES["video"]["tmp_name"], $videoTargetPath);
    }

    // Insert data into the "questions" table
    $sql = "INSERT INTO questions (assessmentID, questionText, image_attachment, video_attachment) 
            VALUES (?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("isss", $assessmentId, $questionText, $imageAttachment, $videoAttachment);

    if ($stmt->execute()) {
        // Get the last inserted question ID
        $questionId = $con->insert_id;

        // Insert each choice individually into the "choices" table
        foreach ($_POST["choice"] as $index => $choiceText) {
            // Determine if the checkbox for this choice is checked
            $isCorrectChoice = isset($_POST["is_correct_choice"][$index]) ? 0 : 1;

            // Perform proper database connection and error handling here
            $sql = "INSERT INTO choices (questionID, choiceText, isCorrectChoice) 
                    VALUES (?, ?, ?)";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("iss", $questionId, $choiceText, $isCorrectChoice);
            $stmt->execute();
        }

        // Close the database connection
        $con->close();

        // Set a success message and redirect
        $_SESSION['message'] = "A new question has been added successfully!";
        header("Location: ../assessment-question.php?assessment_id=$assessmentId"); // Include assessment_id in the URL
        exit();
    } else {
        // Set an error message and redirect
        $_SESSION['message'] = "Something Went Wrong!";
        header("Location: ../assessment-question.php?assessment_id=$assessmentId"); // Include assessment_id in the URL
        exit();
    }
}
?>
