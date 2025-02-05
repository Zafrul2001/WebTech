<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Services</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <!-- Header Section -->
    <header class="header">
        <div class="logo">HOME SERVICE</div>
        <nav class="nav">
            <a href="#">Blog</a>
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#">Contact</a>
        </nav>
    </header>

    <!-- Main Container -->
    <div class="container">
        <!-- Sidebar Menu -->
        <aside class="sidebar">
            <ul>
                <li class="active">Edit Profile</li>
                <li><a href="dashboard.php">Edit Profile</a></li>
                <li><a href="account.php">Account</a></li>
                <li>Notification</li>
            </ul>
        </aside>

        <!-- Main Content with Table -->
        <main class="main-content">
            <h2>Worker History</h2>
            <table>
                <thead>
                    <tr>
                        <th><h5>Work Title</h5></th>
                        <th><h5>Worker Name</h5></th>
                        <th><h5>Date</h5></th>
                        <th><h5>Report</h5></th>
                        <th><h5>Delete</h5></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><h5>Plumber</h5></td>
                        <td><h5>Towhid</h5></td>
                        <td><h5>Date</h5></td>
                        <td><a href="worker-report.php" class="btn sm">Details</a></td>
                        <td><a href="delete.php" class="btn sm danger">Delete</a></td>
                    </tr>
                    <tr>
                        <td><h5>Plumber</h5></td>
                        <td><h5>Towhid</h5></td>
                        <td><h5>Date</h5></td>
                        <td><a href="worker-report.php" class="btn sm">Details</a></td>
                        <td><a href="delete.php" class="btn sm danger">Delete</a></td>
                    </tr>
                    <tr>
                        <td><h5>Plumber</h5></td>
                        <td><h5>Towhid</h5></td>
                        <td><h5>Date</h5></td>
                        <td><a href="worker-report.php" class="btn sm">Details</a></td>
                        <td><a href="delete.php" class="btn sm danger">Delete</a></td>
                    </tr>
                </tbody>
            </table>
        </main>
    </div>

    <!-- Footer Section -->
    <footer class="footer">
        <p>&copy; 2025 Home Service. All rights reserved.</p>
    </footer>
</body>
</html>
