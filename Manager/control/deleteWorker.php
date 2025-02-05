<?php
include '../config/database.php'; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username']; // Username of the worker to be deleted

    if (empty($username)) {
        echo "Username is required to delete a worker.";
    } else {
        // Create a database object and open a connection
        $mydb = new mydb();
        $conobj = $mydb->openCon();

        // Prepare and execute the query to delete the worker
        $result = $mydb->deleteUser("workers", $username, $conobj);

        if ($result === TRUE) {
            echo "Worker deleted successfully.";
        } else {
            echo "Error deleting worker: " . $conobj->error;
        }

        // Close the connection
        $mydb->closeCon($conobj);
    }
}
?>
