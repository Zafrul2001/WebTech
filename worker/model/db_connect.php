<?php
$host = "localhost";
$dbname = "home_service_management_system";
$user = "himel";
$pass = "faishal127"; // Consider storing this securely

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Database connection failed: " . $e->getMessage(), 3, "../logs/db_errors.log");
    
    if (php_sapi_name() !== 'cli') { // Hide errors in production (except CLI mode)
        exit(json_encode(["message" => "Database connection failed. Please try again later."]));
    } else {
        exit("Database connection failed: " . $e->getMessage());
    }
}
?>
