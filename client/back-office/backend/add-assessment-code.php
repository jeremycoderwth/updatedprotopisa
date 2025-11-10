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
        $image = $_FILES['fileToUpload']['name'];
        $fileUploaded = false;
        $imageDIR = "../assessment-files/";
        $imageWebPath = "http://localhost/clonepisa-main/client/back-office/assessment-files/";

        // Check if a file was uploaded
        if (!empty($_FILES["fileToUpload"]["tmp_name"])) {
            $fileTmpPath = $_FILES['fileToUpload']['tmp_name'];
            $fileExtension = strtolower(pathinfo($image, PATHINFO_EXTENSION));
            $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];
            // $uploadedFileName = basename($_FILES["fileToUpload"]["name"]);
            // $targetFile = $targetDirectory . $uploadedFileName; // Concatenate the directory path with the file name

            if (in_array($fileExtension, $allowedExts)) {
                $newFileName = uniqid('assessment_img', true) . '.' . $fileExtension;
                $targetDirectory = $imageDIR . $newFileName;

                if (move_uploaded_file($fileTmpPath, $targetDirectory)) {
                    $fileUploaded = true;
                    $targetFile = $imageWebPath . $newFileName;
                } else {
                    $_SESSION['message'] = "Error uploading the file.";
                    header("Location: ../assessment.php");
                    exit();
                }
            }
        }


        // Insert data into the 'assessment' table
        $sql = "INSERT INTO assessment (assessment_name, subjectID, comment, teacherID, attach_file) VALUES (?, ?, ?, ?, ?)";
        $stmt = $con->prepare($sql);

        if (!$stmt) {
            $_SESSION['message'] = "Error in preparing the SQL statement: " . $con->error;
            header("Location: ../assessment.php");
            exit();
        } else {
            $stmt->bind_param("sisis", $assessmentName, $subjectID, $comment, $auth_id, $targetFile);

            if ($stmt->execute()) {
                $last_id = mysqli_insert_id($con);

                if ($last_id) {
                    $code = rand(1, 99999);
                    $assessmentCode = "Test" . $code . "_" . $last_id;

                    $query = "UPDATE assessment SET assessmentCode = '" . $assessmentCode . "' WHERE assessment_id = '" . $last_id . "'";
                    $res = mysqli_query($con, $query);

                    if ($res) {
                        $_SESSION['message'] = "New Assessment was created successfully";
                        header("Location: ../assessment.php");
                        exit();
                    } else {
                        $_SESSION['message'] = "Error updating assessmentCode: " . mysqli_error($con);
                        header("Location: ../assessment.php");
                        exit();
                    }
                } else {
                    $_SESSION['message'] = "Error retrieving last inserted ID";
                    header("Location: ../assessment.php");
                    exit();
                }
            } else {
                $_SESSION['message'] = "Something Went Wrong!";
                header("Location: ../assessment.php");
                exit();
            }
        }
    }
} else {

    $_SESSION['message'] = "User is not authenticated.";
    header("Location: ../assessment.php");
    exit();
}

