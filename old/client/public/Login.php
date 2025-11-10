<?php
session_start();

if (isset($_SESSION['auth_user']['user_id'])) {
  header('Location: Homepage.php');
  exit();
}

include('includesClient/header.php');
?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
</head>
  

    <section class="gradient-background scroll-hidden">
      <div class="container mt-5">
        <div class="row align-items-center g-lg-1 py-3">
          <div class="col-lg-6 text-center text-lg-start">
            <h1 class="LoginSignup display-4 fw-bold lh-1 text-white mb-3">
              Unlock Knowledge, Empower Change
            </h1>
            <p class="col-lg-10 fs-4 text-white">
              Log in to Navigate PISA's World of Education Excellence.
            </p>
           <div class="imgContainer">
            <img src="../assets/images/login-img.png" class="login-img" alt="">
           </div>
          </div>

          <div class="col-md-10 mx-auto col-lg-5">
            
            <form action="backend/logincode.php" method="post" class="shadow-lg p-4 p-md-4 border rounded-4 bg-body-tertiary">
              <h1 class="text-center text-secondary-color paddingTB">Login</h1>
              <?php include('message.php')?>
              <div class="form-floating mb-3">
                <input
                  type="email"
                  class="form-control"
                  id="floatingInput"
                  placeholder="name@example.com"
                  required
                  name="email"
                />
                <label for="floatingInput">Enter your email address</label>
              </div>


              <div class="col-sm-12">
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


              <button class="d-grid gap-2 col-6 mx-auto btn text-white font-weight marginTB btn-secondary-color p-3 mt-5 mb-4"
              type="submit" name="login_btn" value="login">
              Log in
              </button>
            <div class="text-center">
              <p>Don't you have an account? <a class="sign-up_link" href="Signup.php">Sign up</a></p>
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

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
