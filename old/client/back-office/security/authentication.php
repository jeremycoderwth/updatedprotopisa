<?php
session_start();
include('dbcon.php');

if(!isset($_SESSION['auth']))
{
    $_SESSION['message'] = "Login to Access Dashboard";
    header("Location: ../public/Login.php");
    exit(0);
}
else{
    if($_SESSION['auth_role'] != "1" && $_SESSION['auth_role'] != "0")
    {
        $_SESSION['message']="You are not Authorised as ADMIN";
        header("Location: ../public/Login.php");
        exit(0);
    }
}
?>