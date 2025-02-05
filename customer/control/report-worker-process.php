<?php
session_start();
include '../config/database.php'; // Include your DB connection

// Create a new database connection
$mydb = new mydb();
$conobj = $mydb->openCon();

// Check if the form data is received
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Validate the data
    if (empty($title) || empty($description)) {
        echo json_encode(['success' => false, 'message' => 'Both title and description are required.']);
        exit();
    }

    // Insert the report into the database
    $sql = "INSERT INTO worker_reports (title, description) VALUES (?, ?)";

    $stmt = $conobj->prepare($sql);
    if (!$stmt) {
        echo json_encode(['success' => false, 'message' => 'Error preparing the query: ' . $conobj->error]);
        exit();
    }

    $stmt->bind_param("ss", $title, $description);

    if ($stmt->execute()) {
        // Return success response
        echo json_encode(['success' => true, 'message' => 'Report submitted successfully!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error submitting the report: ' . $stmt->error]);
    }

    $stmt->close();
    $mydb->closeCon($conobj); // Close the database connection
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}
?>
