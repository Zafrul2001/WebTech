<?php
include '../config/database.php'; // Include the database class

$mydb = new mydb(); // Create a database object
$conobj = $mydb->openCon(); // Open the connection

// Query to fetch all blocked customers (where is_active = 0)
$result = $mydb->showBlockedUser("customers", $conobj);

$mydb->closeCon($conobj); // Close the connection

// Return the result directly
return $result;
?>