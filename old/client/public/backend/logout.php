<?php
session_start();

// Check if the user is logged in before allowing logout
if(isset($_SESSION['auth']) && $_SESSION['auth'] === true) {
    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect the user to the login page or any other desired page
    header("Location: ../../public/Login.php");
    exit(0);
} else {
    // If the user is not logged in, redirect them to the login page
    header("Location: ../../public/Login.php");
    exit(0);
}
?>
