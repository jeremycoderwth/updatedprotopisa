<?php
include('../security/authentication.php');


//-------------------------------Archive Users-------------------------------//

if (isset($_POST['userId']) && isset($_POST['status'])) {
    $userId = $_POST['userId'];
    $status = $_POST['status'];
    
    // Update the user's status in the database
    $query = "UPDATE users SET status = $status WHERE user_id = $userId";
    $query_run = mysqli_query($con, $query);
    
    if ($query_run) {
        // Return "success" on successful archive
        echo "success";
    } else {
        // Return an error message on failure
        echo "Error updating user status: " . mysqli_error($con);
    }
} else {
    // Handle invalid or missing data
    echo "Invalid data received.";
}
//-------------------------------Archive Users-------------------------------//

?>