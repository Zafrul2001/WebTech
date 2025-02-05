<?php
// Include the database connection
include('../config/database.php');

// Initialize variables
$errors = [];

// Create an instance of the mydb class and get the connection
$db = new mydb();
$conn = $db->openCon(); // Establish the connection

// Check if the form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input fields
    $username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
    $password = trim($_POST['password']);

    // Validate fields
    if (empty($username)) {
        $errors[] = 'Username is required';
    }
    if (empty($password)) {
        $errors[] = 'Password is required';
    }

    // If no errors, proceed to authenticate the user
    if (empty($errors)) {
        // Prepare SQL query to get user data
        $sql = "SELECT * FROM customers WHERE username = ?";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();

                // Verify the password
                if (password_verify($password, $user['password'])) {
                    // Password is correct, start the session and redirect
                    session_start();
                    $_SESSION['username'] = $username;
                    $_SESSION['user_id'] = $user['username']; // Use user id if you want

                    // Redirect to a dashboard or homepage
                    header('Location: ../view/dashboard.php');
                    exit();
                } else {
                    $errors[] = 'Invalid password';
                }
            } else {
                $errors[] = 'Username not found';
            }
        } else {
            echo "Error: Could not prepare the query.";
        }
    }

    // If there are errors, show the error message
    if (!empty($errors)) {
        echo "<div class='alert__message error'>";
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
        echo "</div>";
    }
}

// Close the connection when done
$db->closeCon();
?>
