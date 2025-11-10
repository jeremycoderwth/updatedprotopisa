<?php
include('../../config/dbcon.php');

if(isset($_POST['student_signup']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);

    $firstname = mysqli_real_escape_string($con, $_POST['fname']);
    $lower_fname = strtolower($firstname);
    $final_firstname = ucwords($lower_fname);
    $fname = $final_firstname;
        
    $lastname = mysqli_real_escape_string($con, $_POST['lname']);
    $lower_lname = strtolower($lastname);
    $final_lastname = ucwords($lower_lname);
    $lname = $final_lastname;

    $suffix = mysqli_real_escape_string($con, $_POST['suffix']);

    $username = mysqli_real_escape_string($con, $_POST['username']);

    $role_as = 2;

    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirmpassword = mysqli_real_escape_string($con, $_POST['confirmpassword']);

    // Check if password and confirm password match
    if ($password !== $confirmpassword) {
        $_SESSION['message'] = "Password and Confirm Password do not match!";
        header("Location: ./Signup.php");
        exit();
    }

    $user_query = "INSERT INTO users (email, fname, lname, suffix, username, role_as, password) VALUES ('$email', '$fname', '$lname', '$suffix', '$username', '$role_as', '$password')";
    $user_query_run = mysqli_query($con, $user_query);

    if($user_query_run)
    {
        $last_id = mysqli_insert_id($con);
        if ($last_id){
            $code = rand(1,99999);
            $userCode = "S".$code."_".$last_id;
            $query = "UPDATE users SET userCode = '".$userCode."' WHERE user_id = '".$last_id."'";
            $res = mysqli_query($con, $query);

            if ($res)
            {
                $_SESSION['message'] = "Registered Successfully!";
                header("Location: ../Login.php");
                exit();
            }
            else
            {
                $_SESSION['message'] = "Something Went Wrong!";
                header("Location: ./Signup.php");
                exit(0);
            }
        }
    }
    else {
        $_SESSION['message'] = "Error: " . mysqli_error($con);
        header("Location: ./Signup.php");
        exit();
    }
}
?>