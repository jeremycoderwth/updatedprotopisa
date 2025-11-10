<?php
include('../security/authentication.php');

// Assuming you have a database connection established

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    
    // Perform a database query to fetch user data based on $user_id
    $query = "SELECT user_id, email, fname, lname, suffix, username, password, status FROM users WHERE user_id = $user_id";
    $result = mysqli_query($con, $query);
    
    if ($result) {
        $userData = mysqli_fetch_assoc($result);
        echo json_encode($userData);
    } else {
        // Handle query error
        echo json_encode(['error' => 'Query failed']);
    }
} else {
    // Handle missing user_id parameter
    echo json_encode(['error' => 'User ID not provided']);
}
?>
