<?php
session_start();
include '../config/database.php'; // Include database connection

// Get the report_id from the query string
$report_id = isset($_GET['id']) ? $_GET['id'] : null;

if ($report_id) {
    // Create a new database connection
    $mydb = new mydb();
    $conobj = $mydb->openCon();

    // SQL query to delete the report
    $query = "DELETE FROM worker_reports WHERE report_id = ?";
    $stmt = $conobj->prepare($query);
    $stmt->bind_param("i", $report_id);

    if ($stmt->execute()) {
        // Redirect to the report history page after successful deletion
        header("Location: ../view/report-history.php");
        exit();
    } else {
        echo "Error deleting report: " . $stmt->error;
    }

    $stmt->close();
    $mydb->closeCon($conobj); // Close the database connection
} else {
    echo "Invalid report ID.";
}
?>
