<?php
session_start();

if (isset($_SESSION['auth_user']['user_id'])) {
  header('Location: Homepage.php');
  exit();
}

include('includesClient/header.php');
?>

<!DOCTYPE html>
<html lang="en">
  
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
      crossorigin="anonymous"
    />
    <script src="https://kit.fontawesome.com/bbd71fca16.js" crossorigin="anonymous"></script>
    <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/styles.css" />
    <link rel="stylesheet" href="../assets/css/scroll.css">
    <script defer src="../assets/js/scroll.js"></script>
  </head>

  <style>
    div.input-group-addon{
      padding: 0.5rem !important;
      display: flex !important;
      align-items: center !important;
      border-top: 1px solid #DEE2E6;    /* Add border to the top */
      border-right: 1px solid #DEE2E6;  /* Add border to the right */
      border-bottom: 1px solid #DEE2E6; /* Add border to the bottom */
      border-radius: 0 5px 5px 0;
    }

    .fa{
      color: #24B1D6;
      text-decoration: none;
    }

    .eye-link {
      text-decoration: none; /* Remove underline */
    }
  </style>

  <body class="gradient-background">

    <section class="gradient-background scroll-hidden">
      <div class="container">
        <div class="row align-items-center g-lg-1 py-2">
          <div class="col-lg-6 text-center text-lg-start">
            <h1 class="LoginSignup display-4 fw-bold lh-1 text-white mb-3">
                Join PISA Today
            </h1>
            <p class="col-lg-10 fs-4 text-white">
              Ignite Your Learning Potenial, Empower Your Future through Education Excellence!
            </p>
            <div class="imgContainer" >
              <img src="../assets/images/signup_img.png" class="signup-img" alt="">
             </div>
          </div>

          <div class="col-md-10 mx-auto col-lg-5">

            <form class="shadow-lg p-4 p-md-4 border rounded-4 bg-body-tertiary row g-3" 
                  action="backend/signupcode.php" method="POST">
              <h1 class="text-center text-secondary-color paddingTB">Sign up</h1>
              <?php include('message.php')?>
              <!-- First Name, Last Name, Suffix (3 Rows Side by Side) -->
            <div class="col-md-5">
              <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="First Name"
                name="fname" required>
                <label for="floatingInput">First Name <span style="color:red;">*</span></label>
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="Last Name"
                name="lname" required>
                <label for="floatingInput">Last Name <span style="color:red;">*</span></label>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="e.g. Jr."
                name="suffix">
                <label for="floatingInput">Suffix</label>
              </div>
            </div>

            <div class="col-12">
              <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"
                name="email" required>
                <label for="floatingInput">Email address <span style="color:red;">*</span></label>
              </div>
            </div>

            <div class="col-12">
              <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="username"
                name="username" required>
                <label for="floatingInput">Username <span style="color:red;">*</span></label>
              </div>
            </div>

            <div class="col-sm-6">
                <div class="input-group" id="show_hide_password">
                    <div class="form-floating">
                        <input type="password" class="form-control" id="passwordInput" placeholder="Password" name="password" required>
                        <label for="passwordInput">Password <span style="color:red;">*</span></label>
                    </div>
                    <div class="input-group-addon">
                        <a href="#" id="togglePassword" class="eye-link">
                            <i class="fa fa-eye-slash" id="eyeSlashIcon" aria-hidden="true"></i>
                            <i class="fa fa-eye" id="eyeIcon" aria-hidden="true" style="display: none;"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="input-group" id="show_hide_password">
                    <div class="form-floating">
                        <input type="password" class="form-control" id="ConfirmPasswordInput" placeholder="Password" name="confirmpassword" required>
                        <label for="ConfirmPasswordInput">Confirm Password <span style="color:red;">*</span></label>
                    </div>
                    <div class="input-group-addon">
                        <a href="#" id="toggleConfirmPassword" class="eye-link">
                            <i class="fa fa-eye-slash" id="confirmEyeSlashIcon" aria-hidden="true"></i>
                            <i class="fa fa-eye" id="ConfirmEyeIcon" aria-hidden="true" style="display: none;"></i>
                        </a>
                    </div>
                </div>
            </div>

              <button class="d-grid gap-2 col-6 mx-auto btn text-white font-weight marginTB btn-secondary-color p-3 mt-5 mb-4" 
                      type="submit" name="student_signup"> 
                  Sign up 
              </button>


            <div class="text-center">
              <p>Already have an account? <a class="sign-up_link" href="Login.php">Log in</a></p>
            </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <script>
    document.getElementById('togglePassword').addEventListener('click', function(e) {
        e.preventDefault();
        const passwordInput = document.getElementById('passwordInput');
        const eyeIcon = document.getElementById('eyeIcon');
        const eyeSlashIcon = document.getElementById('eyeSlashIcon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.style.display = 'inline';
            eyeSlashIcon.style.display = 'none';
        } else {
            passwordInput.type = 'password';
            eyeIcon.style.display = 'none';
            eyeSlashIcon.style.display = 'inline';
        }
    });
    </script>

    <script>
      document.getElementById('toggleConfirmPassword').addEventListener('click', function(e) {
          e.preventDefault();
          const ConfirmPasswordInput = document.getElementById('ConfirmPasswordInput');
          const ConfirmEyeIcon = document.getElementById('ConfirmEyeIcon');
          const confirmEyeSlashIcon = document.getElementById('confirmEyeSlashIcon');

          if (ConfirmPasswordInput.type === 'password') {
              ConfirmPasswordInput.type = 'text';
              ConfirmEyeIcon.style.display = 'inline';
              confirmEyeSlashIcon.style.display = 'none';
          } else {
              ConfirmPasswordInput.type = 'password';
              ConfirmEyeIcon.style.display = 'none';
              confirmEyeSlashIcon.style.display = 'inline';
          }
      });
      </script>



    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
      crossorigin="anonymous"
    ></script>



  </body>
</html>
