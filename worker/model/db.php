<?php
$servername = "localhost";
$username = "himel";  // Change if using a different user
$password = "faishal127";  // Set your database password
$dbname = "home_service_management_system";  // Change to your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
