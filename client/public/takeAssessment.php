<?php

session_start();

include '../config/dbcon.php';

// $choiceID = $_POST['choiceID'];
// $questionID = $_POST['questionID'];
// $responseID = $_POST['responseID'];
// $studentID = $_POST['studentID'];
// $assessmentID = $_POST['assessmentID'];

// $stmt = $conn->prepare("SELECT IsCorrectChoice FROM choices WHERE choice_id = ?");
// $stmt->bind_param("i", $choiceID);
// $stmt->execute();
// $result = $stmt->get_result();
// $row = $result->fetch_assoc();
// $isCorrect = $row['IsCorrectChoice'];

// $insert = $conn->prepare("
//     INSERT INTO student_answers (response_id, studentID, assessmentID, questionID, choiceID, isCorrect)
//     VALUES (?, ?, ?, ?, ?, ?)
// ");
// $insert->bind_param("iiiiii", $responseID, $studentID, $assessmentID, $questionID, $choiceID, $isCorrect);
// $insert->execute();

$studentID = $_SESSION['auth_user']['user_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Take Assessment</title>

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/takeAssessment.css" />
    <link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>
    <link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">
    <script src="https://kit.fontawesome.com/bbd71fca16.js" crossorigin="anonymous"></script>
    <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/scroll.css">
    <script defer src="../assets/js/scroll.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script defer src="../assets/js/quiz-script.js"></script>
    <style>
        .toast {
        opacity: 0.95;
        border-radius: 0.75rem;
        font-size: 0.95rem;
        }
        .toast-container {
        max-width: 320px;
        }
        .toast-body {
        padding-right: 0.5rem;
        }
    </style>

  </head>
<body>

<!-- LOGO SECTION -->
    <div class="gradient-background">
        <div class="col-lg-12 logo-section d-flex justify-content-center">
            <div class="pt-3 pb-3">
                <nav class="navbar navbar-expand-sm">
                    <div class="container">
                        <a class="navbar-brand" href="Homepage.php"><img class="logo-pisa" src="../assets/images/Logo.png" alt=""></a>
                    </div>
                </nav>
            </div>
        </div>
    </div>

<!-- MAIN SECTION -->
    <!-- Main Section // Page 1 -->
    <div class="container my-5" id="page1">
        <?php
        if (isset($_GET['assessment_id'])) {
            $assessmentID = $_GET['assessment_id'];

            // Query to fetch assessment data based on assessment ID
            $query = "SELECT 
                        a.assessmentCode, 
                        a.assessment_name, 
                        a.comment,
                        a.attach_file,
                        q.image_attachment AS question_image
                        FROM assessment a
                        LEFT JOIN questions q
                            ON a.assessment_id = q.assessmentID
                        WHERE assessment_id = ?
            ";

            // Prepare the statement
            $stmt = mysqli_prepare($con, $query);

            if (!$stmt) {
                die("Query preparation failed: " . mysqli_error($con));
            }

            // Bind the assessment ID parameter
            mysqli_stmt_bind_param($stmt, 'i', $assessmentID);

            // Execute the query
            mysqli_stmt_execute($stmt);

            // Bind the result variables
            mysqli_stmt_bind_result($stmt, $assessmentCode, $assessmentName, $comment, $attach_file, $questionImage);

            // Fetch the result
            mysqli_stmt_fetch($stmt);

            // Close the statement
            mysqli_stmt_close($stmt);

            // Display the assessment data
            echo '<h3>' . $assessmentName . '</h3>';
            echo '<p>Introduction</p>';
            echo '<br>';
            echo '<i>Read the Introduction. Then click on the Start Assessment button to proceed.</i>';
            echo '<div class="card text-center mt-4">';
            echo '<div class="card-body" style="padding: 5rem 8rem;">';
            echo '<p class="card-text">' . $comment . '</p>';
        } else {
            echo '<p>No assessment ID provided.</p>';
        }

        // Close the database connection
        mysqli_close($con);
        ?>
                <button class="btn btn-primary mt-5 start-screen" id="start-button" onclick="showNextPage()">Start Assessment</button>
            </div>
        </div>

    </div>

    <!-- Main Section // Page 2 -->
    <div class="container my-5" id="page2" style="display: none;">
        <div class="row d-flex align-items-center justify-content-center">
            <!-- Main Section // Page 2 // Left Side (Questions) -->
            <div class="col-6">
                <div id="display-container">
                    <div class="header">
                        <div class="number-of-count">
                            <span class="number-of-question">1 of 3 questions</span>
                        </div>
                    </div>
                        <div id="container">
                            <!-- questions and options will be displayed here -->
                        </div>
                        <!-- RATIONALE BOX -->
                        <div id="rationale-box" class="alert alert-info mt-3 mb-3" style="display:none;"></div>
                        <button onclick="showNextPage()" id="next-button">Next</button>
                        <button onclick="finishQuiz()" id="finish-button" style="display: none;">Finish</button>               
                </div>
            </div>
            <!-- <div class="col-6 d-flex justify-content-center" id="attachment-container"> 
                <?php 
                    $defaultImage = "https://via.placeholder.com/400x250?text=No+Image";
                    
                    if (!empty($questionImage)) { 
                        echo '<img src="' . $questionImage . '" alt="Question Image" style="max-width: 100%;">';
                    } elseif (!empty($attach_file)) { 
                        $file_extension = pathinfo($attach_file, PATHINFO_EXTENSION);

                        if (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif'])) { 
                            echo '<img src="../back-office/assessment-files/' . $attach_file . '" alt="Attachment" style="max-width: 100%;">'; 
                        } elseif (in_array($file_extension, ['mp4', 'avi', 'mov', 'mkv'])) { 
                            echo '<video src="../back-office/assessment-files/' . rawurldecode($attach_file) . '" controls style="max-width: 100%;"></video>'; 
                        } else { 
                            echo 'Unsupported file type'; 
                        }  
                    } else { 
                        echo '<img src"' . $defaultImage . '" alt="Question Image" style="max-width: 100%;" />'; 
                    }
                ?> 
            </div> -->
        </div>
    </div>

    <!-- Main Section // Page 3 -->
    <div class="container my-5" id="page3" style="display: none;">
        <div class="card">
            <div class="card-body p-5">
                <div class="score-container hide">
                    <!-- <p><i>This is the feedback for CR548Q09 in English.</i></p> -->
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <img class="assessment_score" src="../assets/images/assessment_score.png" alt="">
                        </div>
                        <div class="col-6 my-auto">
                            <h1 id="user-score">Demo Score</h1>
                            <button onclick="finishAssessment()" id="finish-assessment" class="btn btn-primary">Finish</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- simple toast for answering -->
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
        <div id="liveToast" class="toast align-items-center text-white bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
            <div class="toast-body" id="toastMessage">
                <!-- Message text goes here -->
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>

    <!-- Toast container (bottom right corner) -->
    <div id="toastContainer" class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1100;"></div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function showNextPage() {
            // Hide the first page
            document.getElementById('page1').style.display = 'none';
            
            // Show the second page
            document.getElementById('page2').style.display = 'block';
        }

        // Function to finish the quiz
        function finishQuiz() {
            // Hide the second page
            document.getElementById('page2').style.display = 'none';

            // Show the third page
            document.getElementById('page3').style.display = 'block';

            const image = document.querySelector('#page3 img');
            image.src = '../assets/images/assessment_score.png';
        }

        // Function to finish the quiz and redirect to testAssessment.php
        function finishAssessment() {
            // Redirect to the testAssessment.php page
            window.location.href = 'testAssessment.php';
        }

        // Add a click event listener to the "Finish" button
        const finishButton = document.getElementById('finish-assessment');
        finishButton.addEventListener('click', finishQuiz);

        const STUDENT_ID = <?php echo json_encode($studentID); ?>;
        if (STUDENT_ID) {
            localStorage.setItem("studentID", STUDENT_ID);
        } else {
            console.error("Student ID not found in session.");
        }
    </script>
</body>
</html>