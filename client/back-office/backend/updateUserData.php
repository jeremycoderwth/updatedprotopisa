<?php
include('../security/authentication.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user ID from session or hidden input field
    $user_id = isset($_SESSION['auth_user']['user_id']) ? $_SESSION['auth_user']['user_id'] : $_POST['user_id'];

    // Retrieve form data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $new_password = $_POST['password'];
    $confirm_new_password = $_POST['confirmpassword'];

    // Validate and sanitize form data as needed

    // Check if the new password and confirm password match
    if ($new_password === $confirm_new_password) {
        // Passwords match

        // Define a directory where you want to save the uploaded images
        $uploadDirectory = '../profileImage/';

        if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
            $tempName = $_FILES['profile_image']['tmp_name'];
            $originalName = $_FILES['profile_image']['name'];

            // Create a unique filename (e.g., user_id + original filename)
            $uniqueFilename = $user_id . '_' . $originalName;

            if (move_uploaded_file($tempName, $uploadDirectory . $uniqueFilename)) {
                // Update the profile_img column in the users table
                $update_query = "UPDATE users SET fname='$fname', lname='$lname', email='$email', username='$username', password='$new_password', profile_img='$uniqueFilename' WHERE user_id='$user_id'";
            } else {
                $_SESSION['message'] = "Error uploading profile picture.";
                header("Location: ../dashboard.php");
                exit;
            }
        } else {
            // No new profile picture uploaded, update other user data (including password)
            $update_query = "UPDATE users SET fname='$fname', lname='$lname', email='$email', username='$username', password='$new_password' WHERE user_id='$user_id'";
        }

        if (mysqli_query($con, $update_query)) {
            $_SESSION['message'] = "Profile was Updated Successfully";
            header("Location: ../dashboard.php");
        } else {
            $_SESSION['message'] = "Something Went Wrong!";
            header("Location: ../dashboard.php");
        }
    } else {
        $_SESSION['message'] = "New password and confirm password do not match.";
        header("Location: ../dashboard.php");
    }
} else {
    $_SESSION['message'] = "Something Went Wrong!";
    header("Location: ../dashboard.php");
}


?>
