<?php
require 'db_connect.php';
session_start();

if (!isset($_SESSION['username'])) {
    echo json_encode(["message" => "User not authenticated."]);
    exit;
}

$username = $_SESSION['username'];
$amount = isset($_POST['amount']) ? floatval($_POST['amount']) : 0;
$transaction_type = isset($_POST['transaction_type']) ? $_POST['transaction_type'] : '';

if ($amount <= 0) {
    echo json_encode(["message" => "Invalid amount."]);
    exit;
}

if (!in_array($transaction_type, ['Deposit', 'Withdrawal'])) {
    echo json_encode(["message" => "Invalid transaction type."]);
    exit;
}

try {
    $conn->beginTransaction();

    $stmt = $conn->prepare("SELECT balance FROM accounts WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if (!$user) {
        echo json_encode(["message" => "User not found."]);
        exit;
    }

    $newBalance = $user['balance'];

    if ($transaction_type == "Deposit") {
        $newBalance += $amount;
    } elseif ($transaction_type == "Withdrawal") {
        if ($user['balance'] < $amount) {
            echo json_encode(["message" => "Insufficient funds."]);
            exit;
        }
        $newBalance -= $amount;
    }

    $stmt = $conn->prepare("UPDATE accounts SET balance = ? WHERE username = ?");
    $stmt->execute([$newBalance, $username]);

    $stmt = $conn->prepare("INSERT INTO transactions (username, transaction_type, amount, status) VALUES (?, ?, ?, 'Completed')");
    $stmt->execute([$username, $transaction_type, $amount]);

    $conn->commit();
    echo json_encode(["message" => "Transaction successful!", "new_balance" => number_format($newBalance, 2)]);
} catch (Exception $e) {
    $conn->rollBack();
    echo json_encode(["message" => "Transaction failed: " . $e->getMessage()]);
}
?>
