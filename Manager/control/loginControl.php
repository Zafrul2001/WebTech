<?php
include '../config/database.php';
session_start();

$usernameError = $passwordError = "";
$hasError = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];

    // Validate username
    if (empty($username)) {
        $usernameError = "Please enter a username";
        $hasError++;
    }

    // Validate password
    if (empty($password)) {
        $passwordError = "Please enter a password";
        $hasError++;
    }

    if ($hasError > 0) {
        echo "Please correct the errors and try again.";
    } else {
        // Proceed with login
        $mydb = new mydb();
        $conobj = $mydb->openCon();
        $result = $mydb->login("managers", $username, $password, $conobj);

        if ($result->num_rows > 0) {
            $_SESSION["username"] = $username;
            header("Location: ../view/manager_profile.php");
        } else {
            echo "Invalid login credentials or inactive account.";
        }

        $mydb->closeCon($conobj);
    }
}
?>