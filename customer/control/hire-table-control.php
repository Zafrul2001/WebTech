<?php
session_start();  // Ensure session starts at the top of the script

include '../config/constaint.php';  // Include the necessary configuration

$mydb = new mydb();
$conobj = $mydb->openCon();

$customer_username = $_SESSION['username'];  // Get the logged-in customer username

// Fetch all hired workers and payment details for the customer
$sql = "SELECT hw.hire_id, hw.worker_username, hw.profession, hw.hire_date, 
               p.amount, p.payment_status 
        FROM hire_workers hw
        JOIN payments p ON hw.hire_id = p.hire_id
        WHERE hw.customer_username = ?";  // Using the customer_username column

$stmt = $conobj->prepare($sql);
if (!$stmt) {
    die("❌ SQL Error (hire_workers): " . $conobj->error);
}

$stmt->bind_param("s", $customer_username);  // Bind the customer username
$stmt->execute();
$result = $stmt->get_result();

$hire_records = [];
$worker_usernames = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $hire_records[] = $row;  // Store the hire records
        $worker_usernames[] = $row['worker_username'];  // Store the worker usernames for rating query
    }
}
$stmt->close();

// ✅ Fetch ratings correctly for the workers
$ratings = [];
if (!empty($worker_usernames)) {
    // Dynamically create placeholders for the query
    $placeholders = implode(',', array_fill(0, count($worker_usernames), '?'));
    $rating_query = "SELECT worker_username, AVG(rating) AS avg_rating 
                     FROM ratings 
                     WHERE worker_username IN ($placeholders) 
                     GROUP BY worker_username";
    
    $stmt = $conobj->prepare($rating_query);
    if (!$stmt) {
        die("❌ SQL Error (ratings): " . $conobj->error);
    }

    // Dynamically bind parameters
    $types = str_repeat("s", count($worker_usernames));  // String type for each username
    $stmt->bind_param($types, ...$worker_usernames);
    $stmt->execute();
    $rating_result = $stmt->get_result();
    
    while ($row = $rating_result->fetch_assoc()) {
        // Store the average rating for each worker
        $ratings[$row['worker_username']] = number_format($row['avg_rating'], 1);
    }
    $stmt->close();
}

$mydb->closeCon($conobj);  // Close the connection when done

// Optional: Handle case where no records or ratings are found
if (empty($hire_records)) {
    echo "No workers hired yet.";
} else {
    // Output hire records and ratings
    foreach ($hire_records as $hire) {
        $worker_username = $hire['worker_username'];
        $avg_rating = isset($ratings[$worker_username]) ? $ratings[$worker_username] : "No rating yet";
        echo "Worker: $worker_username, Rating: $avg_rating, Profession: " . $hire['profession'] . "<br>";
    }
}
?>
