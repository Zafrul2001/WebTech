<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <section class="form__section">
        <div class="container form__section-container">
            <h2>Edit Profile</h2>
            <form id="edit-profile-form" enctype="multipart/form-data">
                <label for="firstname">First Name</label>
                <input type="text" id="firstname" name="firstname" placeholder="First Name">
                <label for="lastname">Last Name</label>
                <input type="text" id="lastname" name="lastname" placeholder="Last Name">
                <label for="username">User Name</label>
                <input type="text" id="username" name="username" placeholder="Enter your username">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" placeholder="Enter your address">
                <label for="file-upload">Upload File</label>
                <input type="file" id="file-upload" name="file-upload">
                <button type="submit" class="btn">Update</button>
                
            </form>
        </div>
    </section>

    <!-- Link to external JS file -->
    <script src="../js/edit-profile.js"></script>
</body>
</html>
