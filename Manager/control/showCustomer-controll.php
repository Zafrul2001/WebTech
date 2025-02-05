<?php
include '../config/database.php'; // Include the database connection file

// Check if 'username' parameter is set
if (isset($_GET['username'])) {
    $username = $_GET['username'];

    $mydb = new mydb();
    $conobj = $mydb->openCon();

    // Show customer details
    $result = $mydb->getUserDetails("customers", $username, $conobj);

    $mydb->closeCon($conobj);

    // Return the customer details
    return $result;
}
?>
