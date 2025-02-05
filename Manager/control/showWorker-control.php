<?php
include '../config/database.php'; // Include the database connection file

// Check if 'username' parameter is set
if (isset($_GET['username'])) {
    $username = $_GET['username'];

    $mydb = new mydb();
    $conobj = $mydb->openCon();

    // Show worker details
    $result = $mydb->getUserDetails("workers", $username, $conobj);

    $mydb->closeCon($conobj);

    // Return the worker details
    return $result;
}
?>
