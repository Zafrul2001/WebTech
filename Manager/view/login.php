<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="../controller/loginControl.php" onsubmit="return validateForm()">
        <table>
            <tr>
                <td><label for="username">Username:</label></td>
                <td><input type="text" id="username" name="username" ></td>
                <td><span id="usernameError" class="error"></span></td>
            </tr>
            <tr>
                <td><label for="password">Password:</label></td>
                <td><input type="password" id="password" name="password" ></td>
                <td><span id="passwordError" class="error"></span></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <button type="submit">Login</button>
                </td>
            </tr>
        </table>
    </form>
    <script src="../js/login.js"></script>
    <p>Don't have an account? <a href="register.html">Register here</a></p>
</body>
</html>
