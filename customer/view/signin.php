<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign In</title>
        <!-- Custom Stylesheet -->
        <link rel="stylesheet" href="../css/styles.css">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
        <!-- Google Montserrat Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    </head>
    <body>
        <section class="form__section">
            <div class="container form__section-container">
                <h2>Sign In</h2>
                <div class="alert__message error" style="display: none;">
                    <p id="error-message">Invalid credentials. Please try again.</p>
                </div>
                <form id="signin-form" action="../controller/controlsignin.php" method="POST" enctype="multipart/form-data">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username" required>

                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>

                    <button type="submit" class="btn">Sign In</button>
                    <small>Don't have an account? <a href="signup.html">Sign Up</a></small>
                </form>
            </div>
        </section>

        <script src="../js/signin.js"></script> <!-- Your custom JS file -->
    </body>
</html>
