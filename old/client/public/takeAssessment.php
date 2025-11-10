<?php
include('../config/dbcon.php');
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
    <link rel="stylesheet" href="../assets/css/scroll.css">
    <script defer src="../assets/js/scroll.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script defer src="../assets/js/quiz-script.js"></script>
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
            $query = "SELECT assessmentCode, assessment_name, comment, attach_file FROM assessment WHERE assessment_id = ?";

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
            mysqli_stmt_bind_result($stmt, $assessmentCode, $assessmentName, $comment, $attach_file );

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
        <div class="row">
            <!-- Main Section // Page 2 // Left Side (Questions) -->
            <div class="col-6">
                <div id="display-container">
                    <div class="header">
                        <div class="number-of-count">
                            <span class="number-of-question">1 of 3 questions</span>
                        </div>
                        <div class="timer-div">
                            <img src="https://uxwing.com/wp-content/themes/uxwing/download/time-and-date/stopwatch-icon.png"
                                width="20px" />
                            <span class="time-left">10s</span>
                        </div>
                    </div>
                        <div id="container">
                            <!-- questions and options will be displayed here -->

                        </div>
                        <button onclick="showNextPage()" id="next-button">Next</button>
                        <button onclick="finishQuiz()" id="finish-button" style="display: none;">Finish</button>               
                </div>
            </div>
            <div class="col-6 d-flex justify-content-center" id="attachment-container">
                <?php
                if (!empty($attach_file)) {
                    $file_extension = pathinfo($attach_file, PATHINFO_EXTENSION);

                    // Check the file extension to determine the file type
                    if (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                        // Display an image if the file type is an image
                        echo '<img src="../back-office/assessment-files/' . $attach_file . '" alt="Attachment" style="max-width: 100%;">';
                    } elseif (in_array($file_extension, ['mp4', 'avi', 'mov', 'mkv'])) {
                        // Display a video if the file type is a video
                        echo '<video src="../back-office/assessment-files/' . rawurldecode($attach_file) . '" controls style="max-width: 100%;"></video>';
                    } else {
                        // Handle other file types or provide a message for unsupported types
                        echo 'Unsupported file type';
                    }
                }
                ?>
            </div>

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
    </script>
</body>
</html>