<?php
session_start();
include '../config/database.php';

// Check if form data is received via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch the data from the form
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $fileUpload = $_FILES['file-upload'];

    // Validate form data
    if (empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($address)) {
        echo json_encode(['success' => false, 'message' => 'All fields are required.']);
        exit();
    }

    // Handle file upload (if any)
    $fileName = "";
    if ($fileUpload['error'] === UPLOAD_ERR_OK) {
        $targetDir = "../uploads/profile_pictures/";
        $fileName = time() . '_' . basename($fileUpload["name"]);
        $targetFilePath = $targetDir . $fileName;

        // Validate the file type (optional)
        $allowedFileTypes = ["jpg", "png", "jpeg"];
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        if (!in_array($fileType, $allowedFileTypes)) {
            echo json_encode(['success' => false, 'message' => 'Only JPG, PNG, JPEG files are allowed.']);
            exit();
        }

        // Move the uploaded file to the server
        if (!move_uploaded_file($fileUpload["tmp_name"], $targetFilePath)) {
            echo json_encode(['success' => false, 'message' => 'Failed to upload file.']);
            exit();
        }
    }

    // Establish database connection
    $mydb = new mydb();
    $conobj = $mydb->openCon();

    // Update the user's profile information in the database
    $sql = "UPDATE customers SET firstname = ?, lastname = ?, email = ?, address = ?, picture = ? WHERE username = ?";
    $stmt = $conobj->prepare($sql);

    if (!$stmt) {
        echo json_encode(['success' => false, 'message' => 'Database error.']);
        exit();
    }

    // Bind parameters
    $stmt->bind_param("ssssss", $firstname, $lastname, $email, $address, $fileName, $username);

    // Execute query and check if successful
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Profile updated successfully!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update profile.']);
    }

    // Close statement and connection
    $stmt->close();
    $mydb->closeCon($conobj);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}
?>
