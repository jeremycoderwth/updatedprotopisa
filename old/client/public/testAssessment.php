<?php
session_start();
include('../config/dbcon.php');
?>

<!DOCTYPE html>
<html lang="en">
  
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Test Assessments</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css" />
    <link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>
    <link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">
    <script src="https://kit.fontawesome.com/bbd71fca16.js" crossorigin="anonymous"></script>
    <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/scroll.css">
    <script defer src="../assets/js/scroll.js"></script>
  </head>

  <style>
        .imgContainer {
            width: 100%;
            height: auto;
            position: relative;
            margin-left: none !important;
            margin-right: none !important;
        }

        .imgContainer img {
            width: 80%;
            height: auto;
            position: absolute;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }

        /* Dropdown */

        .dropdown-toggle::after {
            display: flex !important;
            margin-left: 0 !important;
            vertical-align: 0 !important;
            content: "";
            border-top: none !important;
            border-right: none !important;
            border-bottom: none !important;
            border-left: none !important;
        }

        .profile-image{
            width: 2rem;
            margin-left: 0.5rem;
            margin-bottom: -0.3rem;
        }
    </style>

<!-- Header -->
  <body>
    <header class="scroll-hidden">
      <div class="testAssessment-header">
      <nav class="navbar navbar-expand-sm pt-4">
          <div class="container">
          <a class="navbar-brand" href="Homepage.php"><img class="logo-header" src="../assets/images/Logo.png" alt=""></a>

            <button
              class="navbar-toggler"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto mb-1 mb-lg-0">
                <li class="nav-item">
                  <a
                    class="nav-link active text-white px-3"
                    aria-current="page"
                    href="Homepage.php"
                    >Home</a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white px-3" href="AboutUs.php">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white px-3" href="ContactUs.php">Contact</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white px-3" href="faqs.php">FAQs</a>
                </li>
                <?php
                // Check if the user is authenticated using the 'auth' session variable
                if (isset($_SESSION['auth']) && $_SESSION['auth'] === true) {
                    $firstName = $_SESSION['auth_user']['fname'];
                    $profile_img = isset($_SESSION['auth_user']['profile_img']) ? $_SESSION['auth_user']['profile_img'] : '../assets/images/profile_pic/default-profile-icon.jpg';

                    echo '
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white px-3" href="standby.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span>My Profile</span>';

                          // if (!empty($profile_img)) {
                          //     echo '<img src="' . $profile_img . '" alt="Profile" class="rounded-circle profile-image">';
                          // } else {
                          //     echo '<img src="../assets/images/profile_pic/default-profile-icon.jpg" alt="Default Profile" class="rounded-circle profile-image">';
                          // }
                          echo '</div></a>
                          <ul class="dropdown-menu dropdown-menu-right fixed-width">
                                <li class="dropdown-header">
                                    <h6>' . $_SESSION['auth_user']['fname'] . '</h6>
                                    <span>';
                                if (isset($_SESSION['auth_user'])) {
                                    if ($_SESSION['auth_role'] == '0') {
                                        echo "Admin";
                                    } else if ($_SESSION['auth_role'] == '1') {
                                        echo "Teacher";
                                    } else {
                                        echo "Student";
                                    }
                                }
                                echo '</span>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>';
                                  echo '<li><a class="dropdown-item" href="standby.php">User Hub</a></li>';
                                
                                if ($_SESSION['auth_role'] === 0 || 1) {
                                echo '<li><a class="dropdown-item" href="../back-office/dashboard.php">Dashboard</a></li>';
                                }
                                echo '<li>
                                    <hr class="dropdown-divider">
                                </li>
                                <form action="backend/logout.php" method="POST" name="logout_form">
                                    <button style="border: none;background-color: white;"><a class="dropdown-item">Logout</a></button>
                                </form>
                            </ul>
                        </li>
                    ';
                } else {
                    echo '<li class="nav-item"><a class="nav-link text-white px-3" href="Login.php">Login/Sign Up</a></li>';
                }
                ?>
              </ul>
            </div>
          </div>
        </nav>
        <div class="container flex-lg-row-reverse align-items-center g-5">
          <div class="col-10 col-sm-8 col-lg-6"></div>
          <div class="col-lg-8">
            <h1 class="display-5 fw-bold lh-1 mb-3 text-white header-title">
              Unlocking Excellence
            </h1>
            <p class="lead text-white header-text">
              Discover a comprehensive collection of standardized tests and assessments 
              meticulously curated for educational excellence. Explore a diverse 
              range of assessments designed to support the mission of the Programme for 
              International Student Assessment (PISA) and empower global education initiatives.
            </p>
          </div>
        </div>
      </div>
    </header>
<!-- End Header -->

<!-- Page Contents -->

<!-- Searchbar -->
<section class="mt-4 scroll-slide-hidden">
    <div class="container w-75">
        <br/>
        <div class="row justify-content-center">
            <form class="card card-sm" id="search-form">
                <div class="card-body row no-gutters align-items-center">
                    <!-- Category Filter Dropdown -->
                    <input type="hidden" name="search" value="1">
                    <div class="col-auto">
                        <select class="form-control form-control-lg filter-dropdown-design" name="subject_filter">
                            <option value="all">Filter by Subject</option>
                            <?php
                            // Retrieve the available subjects from the database
                            $subjectQuery = "SELECT subject_id, subject_name FROM subject";
                            $subjectResult = mysqli_query($con, $subjectQuery);

                            if ($subjectResult) {
                                while ($row = mysqli_fetch_assoc($subjectResult)) {
                                    $subject_id = $row['subject_id'];
                                    $subject_name = $row['subject_name'];
                                    echo "<option value='$subject_id'>$subject_name</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <!-- Search Text Input for Assessment Name -->
                    <div class="col">
                      <input class="form-control form-control-lg form-control-borderless" type="search" placeholder="Search by Assessment Title" name="keyword">
                    </div>
                    <!-- Search Button -->
                    <div class="col-auto">
                      <button class="btn btn-lg srch-btn-color" type="submit">Search</button>
                  
                      <button class="btn btn-lg srch-btn-color" type="button" id="reset-button">
                        <i class="fa-solid fa-rotate"></i>
                      </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-12 col-md-10 col-lg-8 mt-4">
    </div>
</section>


<!-- Assessment List -->
<section class="mb-5" style="margin: 0 12.5%;">
    <div id="assessment-results" class="trans-delay-1 scroll-slide-hidden assessment-list">
        <!-- Results here -->
    </div>
</section>
<!-- Assessment List -->

<!-- EndPage Contents -->

<!-- Footer -->
<section class="gradient-background">
      <footer class="container py-5 text-white">
        <div class="row">
          <div class="col-sm-6 col-md-6 mb-3">
            <form>
              <img class="logo-footer" src="../assets/images/Logo.png" alt="PISA">
              <p class="py-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.
              </p>
            </form>
          </div>

          <div class="col-sm-3 col-md-3 mb-3">
            <h5>Quick links</h5>
            <ul class="nav flex-column">
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Home</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">About</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Contact</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">FAQs</a></li>
            </ul>
          </div>
          
          <div class="col-sm-3 col-md-2 mb-3">
            <h5>Contact info</h5>
            <ul class="nav flex-column">
            <li class="nav-item mb-2 "><a href="#" class="nav-link p-0 text-white">Address</a>
            <p>123 Fifth Avenue, New York, NY 10160</p>
            </li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Phone</a>
            <p>929-242-6868</p></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Email</a>
            <p>contact@info.com</p></li>
          </ul>
        </div>

   
      </div>
      
  <div class="row">
    <div class="col">
      <img class="mx-2 my-2" src="../assets/images/facebook.svg" alt="facebook">
      <img class="mx-2 my-2" src="../assets/images/twitter.svg" alt="twitter">
      <img class="mx-2 my-2" src="../assets/images/instagram.svg" alt="instagram">
      <img class="mx-2 my-2" src="../assets/images/youtube.svg" alt="youtube">
      <img class="mx-2 my-2" src="../assets/images/linkedin.svg" alt="linkedin">
      <img class="mx-2 my-2" src="../assets/images/share-fill.svg" alt="share">
    </div>
    <div class="col text-end">
      Copyright &copy; 2023
      <p><i>This is only a prototype intended for educational and dissertation use.</i></p>
    </div>
  </div>
    </footer>
  </section>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
      crossorigin="anonymous"
      ></script>

      <script>
        document.addEventListener("DOMContentLoaded", function() {
          function loadAllAssessments() {
              fetch("backend/fetchAllAssessments.php")
                  .then(response => response.text())
                  .then(data => {
                      const assessmentResults = document.querySelector("#assessment-results");
                      assessmentResults.innerHTML = data;
                  })
                  .catch(error => {
                      console.error("Error:", error);
                  });
          }

          loadAllAssessments();

          const searchForm = document.querySelector("#search-form");
          const resetButton = document.querySelector("#reset-button");

          searchForm.addEventListener("submit", function(event) {
              event.preventDefault();

              const formData = new FormData(searchForm);

              fetch("backend/fetchAssessmentDataPublic.php?" + new URLSearchParams(formData).toString())
              .then(response => response.text())
              .then(data => {
                  const assessmentResults = document.querySelector("#assessment-results");
                  assessmentResults.innerHTML = data;
              })
              .catch(error => {
                  console.error("Error:", error);
              });
          });

          resetButton.addEventListener("click", function() {
              loadAllAssessments();
          });
      });
      </script>

  </body>
  </html>