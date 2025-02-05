<?php
session_start();
require_once '../config/db.php'; // Include your database connection file

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (empty($username) || empty($password)) {
        echo json_encode(["success" => false, "message" => "All fields are required."]);
        exit;
    }

    // Prepare the SQL query to get user data
    $sql = "SELECT username, password FROM workers WHERE username = ? AND is_active = 1";
    
    // Prepare the statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters
        $stmt->bind_param("s", $username); // 's' means the parameter is a string

        // Execute the query
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();
        $user = $result->fetch_assoc(); // Fetch the user data

        if ($user) {
            // Verify the password
            if (password_verify($password, $user["password"])) {
                $_SESSION["username"] = $user["username"];
                header("Location: ../view/dashboard.php"); // Redirect to dashboard on successful login
                exit();
            } else {
                $_SESSION["login_error"] = "Invalid username or password.";
                header("Location: ../view/login.php"); // Redirect back to login on failure
                exit();
            }
        } else {
            $_SESSION["login_error"] = "Invalid username or password.";
            header("Location: ../view/login.php"); // Redirect back to login if user not found
            exit();
        }
    } else {
        error_log("SQL prepare failed: " . $conn->error, 3, "../logs/db_errors.log");
        echo json_encode(["success" => false, "message" => "Database error. Please try again later."]);
    }
}

$conn->close();
?>
