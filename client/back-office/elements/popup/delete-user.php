<?php

include './../../security/dbcon.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $con->prepare("DELETE FROM users WHERE user_id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: ./../../users.php?message=User deleted successfully");
        exit();
    } else {
        header("Location: users.php?error=Error deleting user");
        exit();
    }
} else {
    header("Location: users.php");
    exit();
}
