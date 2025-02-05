<?php
include '../config/database.php';
session_start();
$usernameError = $fnameError = $genderError = $emailError = $phoneError = $passwordError = $addressError = $pictureError = $documentError = "";
$hasError = 0;
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_REQUEST["username"];
    $fullname = $_REQUEST["fullname"];
    $gender = $_REQUEST["gender"];
    $email = $_REQUEST["email"];
    $phone = $_REQUEST["phone"];
    $password = $_REQUEST["password"];
    $address = $_REQUEST["address"];
    $picture = $_FILES["picture"]["name"];
    $document = $_FILES["document"]["name"];
 
    // Validate username
    if (empty($username)) {
        $usernameError = "Please enter a username";
        $hasError++;
    } else {
        echo "Username: " . $username . "<br>";
    }
 
    // Validate full name
    if (empty($full_name)) {
        $fnameError = "Please enter the full name";
        $hasError++;
    } else {
        echo "Full Name: " . $full_name . "<br>";
    }
 
    // Validate gender
    if (empty($gender)) {
        $genderError = "Please select a gender";
        $hasError++;
    } else {
        echo "Gender: " . $gender . "<br>";
    }
 
    // Validate email
    if (empty($email)) {
        $emailError = "Please enter an email address";
        $hasError++;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Invalid email format";
        $hasError++;
    } else {
        echo "Email: " . $email . "<br>";
    }
 
    // Validate phone
    if (empty($phone)) {
        $phoneError = "Please enter a phone number";
        $hasError++;
    } elseif (!preg_match('/^[0-9]{10,15}$/', $phone)) {
        $phoneError = "Invalid phone number format";
        $hasError++;
    } else {
        echo "Phone: " . $phone . "<br>";
    }
 
    // Validate password
    if (empty($password)) {
        $passwordError = "Please enter a password";
        $hasError++;
    } else {
        echo "Password: " . $password . "<br>";
    }
 
    // Validate address
    if (empty($address)) {
        $addressError = "Please enter an address";
        $hasError++;
    } else {
        echo "Address: " . $address . "<br>";
    }
 
    // Handle picture upload
    if (!empty($picture)) {

        $target_dir = "../uploads/pictures/";
        $target_file = $target_dir . basename($_FILES["picture"]["name"]);
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
 
        // Validate the picture file
        if (!in_array($fileType, ['jpg', 'png', 'jpeg'])) {
            $pictureError = "Only JPG, JPEG, and PNG files are allowed.";
            $hasError++;
        } elseif (!move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
            $pictureError = "Failed to upload the picture.";
            $hasError++;
        } else {
            echo "Picture uploaded: " . $picture . "<br>";
        }
    }
 
    // Handle document upload
    if (!empty($document)) {
        $target_dir = "../uploads/documents/";
        $target_file = $target_dir . basename($_FILES["document"]["name"]);
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
 
        // Validate the document file
        if (!in_array($fileType, ['pdf', 'doc', 'docx'])) {
            $documentError = "Only PDF, DOC, and DOCX files are allowed.";
            $hasError++;
        } elseif (!move_uploaded_file($_FILES["document"]["tmp_name"], $target_file)) {
            $documentError = "Failed to upload the document.";
            $hasError++;
        } else {
            echo "Document uploaded: " . $document . "<br>";
        }
    }
 
    // Check if there are any errors
    if ($hasError > 0) {
        echo "Please correct the above errors.";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
 
        // Proceed with adding the manager to the database
        $mydb = new mydb();
        $conobj = $mydb->openCon();
        $result = $mydb->addManager("managers", $username, $full_name, $gender, $email, $phone, $hashed_password, $address, $picture, $document, $conobj);
 
        if ($result === TRUE) {
        $_SESSION["username"] = $username;
         header("Location: ../view/dashboard.php");
        } else {
            echo "Error: " . $conobj->error;
        }
 
        $mydb->closeCon($conobj);
    }
}
?>
