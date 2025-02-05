<?php
include '../config/database.php'; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username']; // Username of the customer to be blocked/unblocked
    $action = $_POST['action']; // 'block' or 'unblock'

    if (empty($username) || empty($action)) {
        echo "Username and action (block/unblock) are required.";
    } else {
        // Create a database object and open a connection
        $mydb = new mydb();
        $conobj = $mydb->openCon();

        // Determine the is_active value based on the action
        $is_active = ($action === 'block') ? 0 : 1;

        // Update the customer's status
        $result = $mydb->updateUserStatus("customers", $username, $is_active, $conobj);

        if ($result === TRUE) {
            echo $action === 'block' ? "Customer blocked successfully." : "Customer unblocked successfully.";
        } else {
            echo "Error updating customer status: " . $conobj->error;
        }

        // Close the connection
        $mydb->closeCon($conobj);
    }
}
?>
