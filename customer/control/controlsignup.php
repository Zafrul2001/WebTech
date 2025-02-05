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
    $firstName = filter_var(trim($_POST['firstname']), FILTER_SANITIZE_STRING);
    $lastName = filter_var(trim($_POST['lastname']), FILTER_SANITIZE_STRING);
    $username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirm-password']);
    $address = filter_var(trim($_POST['address']), FILTER_SANITIZE_STRING);
    $gender = $_POST['gender'];
    $fileUpload = $_FILES['file-upload']['name'] ?? null;

    // Validate fields
    if (empty($firstName)) {
        $errors[] = 'First Name is required';
    }
    if (empty($lastName)) {
        $errors[] = 'Last Name is required';
    }
    if (empty($username)) {
        $errors[] = 'Username is required';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email address';
    }
    if (strlen($password) < 6) {
        $errors[] = 'Password must be at least 6 characters';
    }
    if ($password !== $confirmPassword) {
        $errors[] = 'Passwords do not match';
    }
    if (empty($address)) {
        $errors[] = 'Address is required';
    }
    if (empty($gender)) {
        $errors[] = 'Gender is required';
    }

    // If no errors, proceed to insert into the database
    if (empty($errors)) {
        // Hash password before storing it
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare SQL query
        $sql = "INSERT INTO customers (username, first_name, last_name, email, password, address, gender, file_upload) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ssssssss", $username, $firstName, $lastName, $email, $hashedPassword, $address, $gender, $fileUpload);
            $stmt->execute();

            // Redirect to the signin page after successful signup
            header('Location: ../view/signin.php');
            exit(); // Always call exit after header redirect
        } else {
            echo "Error: Could not prepare the query.";
        }
    } else {
        // Show validation errors
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
}

// Close the connection when done
$db->closeCon();
?>
