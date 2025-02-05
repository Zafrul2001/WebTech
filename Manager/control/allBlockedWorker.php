<?php
include '../config/database.php'; 

$mydb = new mydb(); 
$conobj = $mydb->openCon(); 

// Query to fetch all blocked workers (where is_active = 0)
$result = $mydb->showBlockedUser("workers", $conobj);

$mydb->closeCon($conobj); // Close the connection

// Return the result directly
return $result;
?>
