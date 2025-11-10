<?php

include './../security/dbcon.php';

if (isset($_GET['id'])) {
    $userID = $_GET['id'];

    $stmt = $con->prepare("DELETE FROM users WHERE user_id = ?");
    $stmt->bind_param("i", $userID);

    if ($stmt->execute()) {
        header("Location: ./../dashboard.php?message=User deleted successfully");
        exit();
    } else {
        header("Location: dashboard.php?error=Error deleting user");
        exit();
    }
} else {
    header("Location: dashboard.php");
    exit();
}