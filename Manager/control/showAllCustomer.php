<?php
include '../config/database.php'; // Include the database class

$mydb = new mydb(); // Create a database object
$conobj = $mydb->openCon(); // Open the connection

$result = $mydb->showAllUsers("customers", $conobj); // Fetch all customers from the 'customers' table

$mydb->closeCon($conobj); // Close the connection

if ($result->num_rows > 0) {
    // Return the result (can be looped and displayed in the view)
    return $result;
} else {
    echo "No customers found.";
}
?>
