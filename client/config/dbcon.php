<?php
$host = "localhost";
$username = "u235085615_pisa";
$password = "6gM+@@M8:K";
$database = "u235085615_pisaproto";
 
$con = mysqli_connect($host, $username, $password, $database);

if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}
