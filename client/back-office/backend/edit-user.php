<?php
include('../security/authentication.php');

// Initialize a response array
$response = array();

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate user inputs
    $user_id = filter_input(INPUT_POST, 'user_id', FILTER_VALIDATE_INT);
    $firstname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
    $lastname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
    $suffix = filter_input(INPUT_POST, 'suffix', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $status = filter_input(INPUT_POST, 'status', FILTER_VALIDATE_INT);

    // Check if all required fields are set and valid
    if ($user_id !== false && $firstname !== null && $lastname !== null && $username !== null && $email !== null && $password !== null && $status !== false) {
        // Prepare the SQL statement
        $query = "UPDATE users SET fname=?, lname=?, suffix=?, username=?, email=?, password=?, status=? WHERE user_id=?";
        $stmt = mysqli_prepare($con, $query);

        if ($stmt) {
            // Bind the parameters to the prepared statement
            mysqli_stmt_bind_param($stmt, "ssssssii", $firstname, $lastname, $suffix, $username, $email, $password, $status, $user_id);

            // Execute the statement
            if (mysqli_stmt_execute($stmt)) {
                $_SESSION['message'] = "Updated Successfully";
                $response['success'] = true;
            } else {
                $_SESSION['message'] = "Something Went Wrong!";
                $response['success'] = false;
                $response['error'] = mysqli_error($con);
            }

            // Close the statement
            mysqli_stmt_close($stmt);
        } else {
            $_SESSION['message'] = "Statement Preparation Failed";
            $response['success'] = false;
            $response['error'] = mysqli_error($con);
        }
    } else {
        $_SESSION['message'] = "Invalid or Missing Data";
        $response['success'] = false;
    }
} else {
    $_SESSION['message'] = "Invalid Request Method";
    $response['success'] = false;
}

// Send the JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>