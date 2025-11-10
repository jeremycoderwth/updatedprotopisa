<?php
include('../security/authentication.php');

// Check if the user is authenticated and auth_id is available (adjust this part based on your authentication system)
if (isset($_SESSION['auth_user']['user_id'])) {
    $auth_id = $_SESSION['auth_user']['user_id'];

    if (isset($_POST['save_assessment'])) {
        // Retrieve form data
        $assessmentName = $_POST['assessmentName'];
        $subjectID = $_POST['subject'];
        $comment = $_POST['comment'];

        // Handle file upload
        $fileUploaded = false;
        $targetDirectory = "../assessment-files/";

        // Check if a file was uploaded
        if (!empty($_FILES["fileToUpload"]["tmp_name"])) {
            $uploadedFileName = basename($_FILES["fileToUpload"]["name"]);
            $targetFile = $targetDirectory . $uploadedFileName; // Concatenate the directory path with the file name

            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
                $fileUploaded = true;
                $fileToStoreInDatabase = $uploadedFileName; // Store only the file name in the database
            } else {
                $_SESSION['message'] = "Error uploading the file.";
                header("Location: ../assessment.php");
                exit();
            }
        }


        // Insert data into the 'assessment' table
        $sql = "INSERT INTO assessment (assessment_name, subjectID, comment, teacherID, attach_file) VALUES (?, ?, ?, ?, ?)";
        $stmt = $con->prepare($sql);

        if (!$stmt) {
            // Handle the SQL statement preparation error
            $_SESSION['message'] = "Error in preparing the SQL statement: " . $con->error;
            header("Location: ../assessment.php");
            exit();
        } else {
            // Bind parameters
            $stmt->bind_param("sisis", $assessmentName, $subjectID, $comment, $auth_id, $targetFile);

            if ($stmt->execute()) {
                // Get the last inserted ID
                $last_id = mysqli_insert_id($con);

                if ($last_id) {
                    // Generate assessmentCode
                    $code = rand(1, 99999);
                    $assessmentCode = "Test" . $code . "_" . $last_id;

                    // Update the assessmentCode in the 'assessment' table
                    $query = "UPDATE assessment SET assessmentCode = '" . $assessmentCode . "' WHERE assessment_id = '" . $last_id . "'";
                    $res = mysqli_query($con, $query);

                    if ($res) {
                        $_SESSION['message'] = "New Assessment was created successfully";
                        header("Location: ../assessment.php");
                        exit();
                    } else {
                        // Handle the SQL update error
                        $_SESSION['message'] = "Error updating assessmentCode: " . mysqli_error($con);
                        header("Location: ../assessment.php");
                        exit();
                    }
                } else {
                    // Handle the case where the last_id is not retrieved
                    $_SESSION['message'] = "Error retrieving last inserted ID";
                    header("Location: ../assessment.php");
                    exit();
                }
            } else {
                // Handle the SQL execution error
                $_SESSION['message'] = "Something Went Wrong!";
                header("Location: ../assessment.php");
                exit();
            }

            // Close the statement
            $stmt->close();
        }

        // Close the database connection
        $con->close();
    }
} else {
    // Handle the case where the user is not authenticated
    $_SESSION['message'] = "User is not authenticated.";
    header("Location: ../assessment.php");
    exit();
}
?>
