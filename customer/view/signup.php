<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="../css/styles.css">
    <!-- Link to the external JS file -->
    <script src="../js/signup.js" defer></script>
</head>
<body>
    <section class="form__section">
        <div class="container form__section-container">
            <h2>Sign Up</h2>
            <form action="../controller/controlsignup.php" method="POST" enctype="multipart/form-data">
                <label for="firstname">First Name</label>
                <input type="text" name="firstname" placeholder="First Name" required>
                <label for="lastname">Last Name</label>
                <input type="text" name="lastname" placeholder="Last Name" required>
                <label for="username">User Name</label>
                <input type="text" name="username" placeholder="Enter your name" required>
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Enter your email" required>
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Enter your password" required>
                <label for="confirm-password">Confirm Password</label>
                <input type="password" name="confirm-password" placeholder="Confirm your password" required>
                <label for="address">Address</label>
                <input type="text" name="address" placeholder="Enter your address" required>
                <div class="gender">
                    <label for="gender">Gender</label>
                    <label><input type="radio" name="gender" value="male" required> Male</label>
                    <label><input type="radio" name="gender" value="female" required> Female</label>
                </div>
                <label for="file-upload">Upload File</label>
                <input type="file" name="file-upload">
                <button type="submit" class="btn">Sign Up</button>
                <small>Already Have An Account? <a href="signin.php">Sign In</a></small>
            </form>
        </div>
    </section>
</body>
</html>
