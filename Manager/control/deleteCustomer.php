<?php
include '../config/database.php'; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username']; // Username of the customer to be deleted

    if (empty($username)) {
        echo "Username is required to delete a customer.";
    } else {
        // Create a database object and open a connection
        $mydb = new mydb();
        $conobj = $mydb->openCon();

        // Prepare and execute the query to delete the customer
        $result = $mydb->deleteUser("customers", $username, $conobj);

        if ($result === TRUE) {
            echo "Customer deleted successfully.";
        } else {
            echo "Error deleting customer: " . $conobj->error;
        }

        // Close the connection
        $mydb->closeCon($conobj);
    }
}
?>
