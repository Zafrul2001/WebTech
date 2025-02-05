<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "home_service";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to add a notification
function addNotification($sender_id, $receiver_id, $message) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO notifications (sender_id, receiver_id, message) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $sender_id, $receiver_id, $message);
    $stmt->execute();
    $stmt->close();
}

// Function to get notifications for a specific user
function getNotifications($receiver_id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM notifications WHERE receiver_id = ? ORDER BY created_at DESC");
    $stmt->bind_param("i", $receiver_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $notifications = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $notifications;
}

// Function to mark a notification as read
function markAsRead($notification_id) {
    global $conn;
    $stmt = $conn->prepare("UPDATE notifications SET is_read = TRUE WHERE id = ?");
    $stmt->bind_param("i", $notification_id);
    $stmt->execute();
    $stmt->close();
}

// Handle API requests
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['action']) && $_GET['action'] === 'getNotifications' && isset($_GET['receiver_id'])) {
        $receiver_id = intval($_GET['receiver_id']);
        $notifications = getNotifications($receiver_id);
        echo json_encode($notifications);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'addNotification') {
        $sender_id = intval($_POST['sender_id']);
        $receiver_id = intval($_POST['receiver_id']);
        $message = $_POST['message'];
        addNotification($sender_id, $receiver_id, $message);
        echo json_encode(['status' => 'success', 'message' => 'Notification added']);
    }

    if (isset($_POST['action']) && $_POST['action'] === 'markAsRead' && isset($_POST['notification_id'])) {
        $notification_id = intval($_POST['notification_id']);
        markAsRead($notification_id);
        echo json_encode(['status' => 'success', 'message' => 'Notification marked as read']);
    }
}
?>