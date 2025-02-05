<?php
session_start();
require '../config/db.php';

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $username = trim($_POST['username']);
    $full_name = trim($_POST['fullname']);
    $gender = $_POST['gender'] ?? '';
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $profession = $_POST['profession'] ?? '';
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $address = trim($_POST['address']);
    $picture = $_POST['picture'];
    $document =$_POST['document'];

    // Handle file uploads
   
    // Handle Picture Upload
    


// Check if a picture was uploaded
if (isset($_FILES["picture"]) && !empty($_FILES["picture"]["name"])) {
    $target_dir = "../uploads/pictures/";
    $target_file = $target_dir . basename($_FILES["picture"]["name"]);
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Validate the picture file type
    if (!in_array($fileType, ['jpg', 'jpeg', 'png', 'gif'])) {
        $pictureError = "Only JPG, JPEG, PNG, and GIF files are allowed.";
        
    } elseif ($_FILES["picture"]["size"] > 2000000) {  // 2MB max size for pictures
        $pictureError = "The picture is too large. Maximum file size is 2MB.";
      
    } elseif (!move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
        $pictureError = "Failed to upload the picture.";
        
    } else {
        // If no errors, the file was uploaded successfully
        echo "Picture uploaded: " . basename($_FILES["picture"]["name"]) . "<br>";
    }
} else {
    $pictureError = "No picture uploaded.";
    
}

// If there was any error, you can store $pictureError in the database or display it in the form
if ($hasError > 0) {
    // Handle error, maybe redirect back with error message
    echo $pictureError;
}


    // Handle Document Upload
    

// Check if a document was uploaded
if (isset($_FILES["document"]) && !empty($_FILES["document"]["name"])) {
    $target_dir = "../uploads/documents/";
    $target_file = $target_dir . basename($_FILES["document"]["name"]);
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Validate the document file type
    if (!in_array($fileType, ['pdf', 'doc', 'docx'])) {
        $documentError = "Only PDF, DOC, and DOCX files are allowed.";
        
    } elseif ($_FILES["document"]["size"] > 5000000) {  // 5MB max size
        $documentError = "The document is too large. Maximum file size is 5MB.";
        
    } elseif (!move_uploaded_file($_FILES["document"]["tmp_name"], $target_file)) {
        $documentError = "Failed to upload the document.";
        
    } else {
        // If no errors, the file was uploaded successfully
        echo "Document uploaded: " . basename($_FILES["document"]["name"]) . "<br>";
    }
} else {
    $documentError = "No document uploaded.";
   
}

    // Check if the database connection is successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare the SQL query
    $stmt = $conn->prepare("INSERT INTO workers (username, full_name, gender, email, phone, profession, password, address, picture, document) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Check if the query was prepared successfully
    if ($stmt === false) {
        die("Error preparing the query: " . $conn->error);
    }

    // Bind the parameters
    $stmt->bind_param("ssssssssss", $username, $full_name, $gender, $email, $phone, $profession, $password, $address, $picturePath, $documentPath);

    // Execute the query and check for errors
    if ($stmt->execute()) {
        // Redirect to login page upon success
        header("Location: ../view/login.php");
        exit();
    } else {
        // If execution fails, display the error message
        echo "Error executing query: " . $stmt->error;
    }
}
?>
