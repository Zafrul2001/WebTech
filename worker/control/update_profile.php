<?php
require '../config/db_connect.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $profession = $_POST['profession'];
    $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : null;
    $address = $_POST['address'];
    
    // File Uploads
    $picture = $_FILES['picture']['name'] ? "uploads/" . basename($_FILES['picture']['name']) : null;
    $document = $_FILES['document']['name'] ? "uploads/" . basename($_FILES['document']['name']) : null;

    move_uploaded_file($_FILES['picture']['tmp_name'], $picture);
    move_uploaded_file($_FILES['document']['tmp_name'], $document);

    // Database Connection
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbuser, $dbpass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE workers SET full_name=?, gender=?, email=?, phone=?, profession=?, address=?";
        if ($password) $sql .= ", password=?";
        if ($picture) $sql .= ", picture=?";
        if ($document) $sql .= ", document=?";
        $sql .= " WHERE username=?";

        $stmt = $conn->prepare($sql);

        $params = [$fullname, $gender, $email, $phone, $profession, $address];
        if ($password) $params[] = $password;
        if ($picture) $params[] = $picture;
        if ($document) $params[] = $document;
        $params[] = $username;

        $stmt->execute($params);

        echo "Profile updated successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
