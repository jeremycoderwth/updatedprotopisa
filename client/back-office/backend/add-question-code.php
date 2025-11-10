<?php
include('../security/authentication.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $assessmentId = $_POST["assessment_id"];
    $questionText = $_POST["question"];
    $explanation = $_POST["explanation"] ?? '';
    $image = $_FILES["image"]['name'];
    $imageAttachment = "";
    $videoAttachment = "";

    $imageDIR = "../assessment-files/image-attachments/";
    $imageWebPath = "http://localhost/clonepisa-main/client/back-office/assessment-files/image-attachments/";
    $videoDIR = "../assessment-files/video-attachments/";
    
    // Check if an image file is uploaded
    if (isset($image) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileExtension = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];
        
        if (in_array($fileExtension, $allowedExts)) {
            // Generate unique filename
            $newFileName = uniqid('question_img_', true) . '.' . $fileExtension;
            $destPath = $imageDIR . $newFileName;

            if (move_uploaded_file($fileTmpPath, $destPath)) {
                // Save relative path (for displaying in browser)
                $imageAttachment = $imageWebPath . $newFileName;
            }
        }
    }
    
    echo var_dump($imageAttachment);
    
    // Check if a video file is uploaded
    if (isset($_FILES["video"]) && $_FILES["video"]["error"] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['video']['tmp_name'];
        $videoName = $_FILES["video"]["name"];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedExts = ['mp4', 'mov', 'avi', 'mkv'];
        
        if (in_array($fileExtension, $allowedExts)) {
            // Generate unique filename
            $newFileName = uniqid('question_img_', true) . '.' . $fileExtension;
            $destPath = $videoDIR . $newFileName;

            if (move_uploaded_file($fileTmpPath, $destPath)) {
                // Save relative path (for displaying in browser)
                $videoAttachment = "../assessment-files/video-attachments/" . $newFileName;
            }
        }
    }

    // Insert data into the "questions" table
    $sql = "INSERT INTO questions (assessmentID, questionText, image_attachment, video_attachment, rationale) 
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("issss", $assessmentId, $questionText, $imageAttachment, $videoAttachment, $explanation);

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
