<?php
include '../config/database.php';
session_start();

$mydb = new mydb();
$conobj = $mydb->openCon();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_username = $_SESSION['username']; // Logged-in customer
    $worker_username = $_POST['worker_username'];
    $profession = $_POST['profession'];

    // Validate inputs
    if (empty($worker_username) || empty($profession)) {
        $_SESSION['error'] = "All fields are required!";
        header("Location: ../view/hire-worker.php");
        exit();
    }

    // Insert hire record
    $sql = "INSERT INTO hire_workers (customer_username, worker_username, profession) 
            VALUES (?, ?, ?)";
    
    $stmt = $conobj->prepare($sql);
    
    if (!$stmt) {
        $_SESSION['error'] = "SQL Error: " . $conobj->error;
        header("Location: ../view/hire-worker.php");
        exit();
    }
    
    $stmt->bind_param("sss", $customer_username, $worker_username, $profession);
    
    if ($stmt->execute()) {
        $_SESSION['success'] = "Worker hired successfully!";
    } else {
        $_SESSION['error'] = "Error hiring worker: " . $stmt->error;
    }
    
    $stmt->close();
    $mydb->closeCon($conobj);

    // Redirect back to hire page
    header("Location: ../view/hire-worker.php");
    exit();
}
?>
