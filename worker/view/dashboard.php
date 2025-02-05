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
                <li><a href="history.php">History</a></li>
                <li><a href="account.php">Account</a></li>
                <li>Notification</li>
            </ul>
        </aside>

        <!-- Main Content with Form -->
        <main class="main-content">
            <h1>Register for Our Services</h1>
            <form id="updateForm" action="#" method="post" enctype="multipart/form-data">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br>

    <label for="fullname">Full Name:</label>
    <input type="text" id="fullname" name="fullname" required><br>

    <label>Gender:</label><br>
    <label><input type="radio" name="gender" value="Male" required> Male</label>
    <label><input type="radio" name="gender" value="Female"> Female</label>
    <label><input type="radio" name="gender" value="Other"> Other</label><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>

    <label for="phone">Phone:</label>
    <input type="tel" id="phone" name="phone" required><br>

    <label for="profession">Profession:</label>
    <select id="profession" name="profession" required>
        <option value="Electrician">Electrician</option>
        <option value="Plumber">Plumber</option>
        <option value="Maid">Maid</option>
    </select><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password"><br>

    <label for="confirm_password">Confirm Password:</label>
    <input type="password" id="confirm_password" name="confirm_password"><br>

    <label for="address">Address:</label>
    <textarea id="address" name="address" required></textarea><br>

    <label for="picture">Upload Picture</label>
    <input type="file" id="picture" name="picture" accept="image/*"><br>
    
    <label for="document">Upload Document</label>
    <input type="file" id="document" name="document" accept=".pdf,.doc,.docx,.txt"><br>
    
    <button type="submit">Update</button>
</form>

<div id="message"></div>

<script src="../js/update-profile.js"></script>


            <!-- Worker History Section -->
            
        </main>
    </div>

    <!-- Footer Section -->
    <footer class="footer">
        <p>&copy; 2025 Home Service. All rights reserved.</p>
    </footer>
</body>
</html>
