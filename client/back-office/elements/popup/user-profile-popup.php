<style>
    .display-attachments-button.active-button {
        background-color: #f9900e;
        color: #fff;
        border: none;
        padding: 5px;
    }

    .display-attachments-button{
        width: 100%;
        height: 100%;
        border: none;
        background-color: white;
        padding: 5px;
        transition: .5s all;   
    }

    .display-attachments-button:hover {
        background-color: #f9900e;
        color: #fff;
    }

    .close-button:hover {
        background-color: red;
        color: white;
    }

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

<div id="profile-popup" class="popup">
    <div class="popup-content popup-content-assessment w-75 pb-5">

        <div class="d-flex flex-row-reverse form-group text-right m-2">
            <button type="button" class="btn close-button mr-2  rounded-circle" id="profile-close-popup">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <form action="backend/updateUserData.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" id="user-id" value="<?php echo $_SESSION['auth_user']['user_id']; ?>">
            <div class="container">
                <div class="row p-3">
                <div class="col-4">
                <?php
                if (isset($_SESSION['auth_user']['user_id'])) {
                    $user_id = $_SESSION['auth_user']['user_id'];
                    $users = "SELECT * FROM users WHERE user_id='$user_id'";
                    $user_run = mysqli_query($con, $users);

                    if (mysqli_num_rows($user_run) > 0) {
                        $user = mysqli_fetch_assoc($user_run);
                        $profile_image = $user['profile_img'];
                        $default_image_url = './profile_pic/default-profile-icon.jpg'; // Replace with the URL of your default image
                        ?>
                        <div class="p-2 d-flex justify-content-center">
                            <div class="profile-picture d-flex justify-content-center">
                                <img src="profileImage/<?php echo $profile_image ? $profile_image : 'default-profile-icon.jpg'; ?>"
                                    id="profile-image" alt="profile-image" class="rounded-circle" style="width:40%;">
                            </div>
                        </div>

                        <div class="p-2 d-flex justify-content-center">
                        <button class="btn btn-primary" type="button" onclick="document.getElementById('profile-image-upload').click()">
                            <i class="fa fa-fw fa-camera"></i>
                            <span>Change Photo</span>
                        </button>
                            <div style="display: none;">
                                <input type="file" id="profile-image-upload" name="profile_image" accept="image/*" onchange="uploadProfileImage(this)">
                            </div>                        
                        </div>
                        <div class="name-role d-flex justify-content-center mt-4">
                            <h4><?php echo $user['fname'] . ' ' . $user['lname'] . ' ' . $user['suffix']; ?></h4>
                        </div>
                        <div class="d-flex justify-content-center">
                            <p>
                                <?php
                                if ($user['role_as'] == 0) {
                                    echo "Admin";
                                } elseif ($user['role_as'] == 1) {
                                    echo "Teacher";
                                } elseif ($user['role_as'] == 2) {
                                    echo "Student";
                                }
                                ?>
                            </p>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>



                <div class="col-8">
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				            <h6 class="mb-2 text-primary mb-3">Personal Details</h6>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                                <label for="email">Name</label>
                                <div class="input-group">
                                    <input type="text" name="fname" class="form-control" placeholder="First Name">
                                    <input type="text" name="lname" class="form-control" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="yourname@email.com">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="username">
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4">
                            <h6 class="mb-2 text-primary mb-3">Change Password</h6>

                            <div class="col-sm-12 mb-2">
                                <div class="input-group" id="show_hide_password">
                                    <input type="password" class="form-control" id="passwordInput" placeholder="New Password" name="password">                                    
                                    <div class="input-group-addon">
                                        <a href="#" id="togglePassword" class="eye-link">
                                            <i class="fa fa-eye-slash" id="eyeSlashIcon" aria-hidden="true"></i>
                                            <i class="fa fa-eye" id="eyeIcon" aria-hidden="true" style="display: none;"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 mb-2">
                                <div class="input-group" id="show_hide_password">
                                        <input type="password" class="form-control" id="ConfirmPasswordInput" placeholder="Confirm Password" name="confirmpassword">
                                    <div class="input-group-addon">
                                        <a href="#" id="toggleConfirmPassword" class="eye-link">
                                            <i class="fa fa-eye-slash" id="confirmEyeSlashIcon" aria-hidden="true"></i>
                                            <i class="fa fa-eye" id="ConfirmEyeIcon" aria-hidden="true" style="display: none;"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="d-flex justify-content-center mt-4">
                    <button class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

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
