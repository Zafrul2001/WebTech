<?php
session_start();
require '../config/db_connect.php';

// Ensure user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

// Fetch user balance
$stmt = $conn->prepare("SELECT balance FROM accounts WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch();

$balance = $user ? $user['balance'] : 0;

// Fetch transactions
$stmt = $conn->prepare("SELECT * FROM transactions WHERE username = ? ORDER BY transaction_date DESC");
$stmt->execute([$username]);
$transactions = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Overview</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script src="../js/account.js" defer></script>
</head>
<body>

<header class="header">
    <div class="logo">HOME SERVICE</div>
    <nav class="nav">
        <a href="#">Dashboard</a>
        <a href="#">Transactions</a>
        <a href="#">Settings</a>
        <a href="logout.php">Logout</a>
    </nav>
</header>

<div class="container">
    <aside class="sidebar">
        <ul>
            <li class="active">Account Summary</li>
            <li><a href="history.php">History</a></li>
            <li><a href="dashboard.php">Edit Profile</a></li>
            <li>Deposit Funds</li>
        </ul>
    </aside>

    <main class="main-content">
        <h2>Account Summary</h2>

        <div class="balance-box">
            <h3>Total Balance: $<span id="balance"><?= number_format($balance, 2) ?></span></h3>
        </div>

        <h3>Deposit / Withdraw Funds</h3>
        <form id="transaction-form">
            <label for="amount">Amount ($):</label>
            <input type="number" id="amount" name="amount" min="1" required>

            <label for="transaction_type">Transaction Type:</label>
            <select id="transaction_type" name="transaction_type">
                <option value="Deposit">Deposit</option>
                <option value="Withdrawal">Withdrawal</option>
            </select>

            <button type="submit">Submit</button>
        </form>

        <p id="transaction-message"></p>

        <h3>Transaction History</h3>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Transaction Type</th>
                    <th>Amount</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="transaction-history">
                <?php foreach ($transactions as $transaction): ?>
                    <tr>
                        <td><?= $transaction['transaction_date'] ?></td>
                        <td><?= $transaction['transaction_type'] ?></td>
                        <td>$<?= number_format($transaction['amount'], 2) ?></td>
                        <td><?= $transaction['status'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</div>

<footer class="footer">
    <p>&copy; 2025 Home Service. All rights reserved.</p>
</footer>

</body>
</html>
