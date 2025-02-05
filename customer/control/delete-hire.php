<?php
include '../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hire_id = $_POST['hire_id'];

    $mydb = new mydb();
    $conobj = $mydb->openCon();

    // First delete from payments to maintain referential integrity
    $delete_payments = "DELETE FROM payments WHERE hire_id = ?";
    $stmt = $conobj->prepare($delete_payments);
    $stmt->bind_param("i", $hire_id);
    $stmt->execute();
    $stmt->close();

    // Then delete from hire_workers
    $delete_hire = "DELETE FROM hire_workers WHERE hire_id = ?";
    $stmt = $conobj->prepare($delete_hire);
    $stmt->bind_param("i", $hire_id);
    $stmt->execute();
    $stmt->close();

    $mydb->closeCon($conobj);
    
    header("Location: ../views/hire-worker.php");
    exit();
}
?>
