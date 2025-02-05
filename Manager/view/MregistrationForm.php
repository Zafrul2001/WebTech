<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registration Page</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<section class="form__section">
<div class="container form__section-container">
<h2>Registration</h2>
<form id="registrationForm" onsubmit="return validateForm()" action="../controller/registrationControl.php" method="POST" enctype="multipart/form-data">
<!-- Username -->
<label for="username">Username</label>
<input type="text" id="username" name="username">
<span id="usernameError" class="error"></span>
<!-- Full Name -->
<label for="fullname">Full Name</label>
<input type="text" id="fullname" name="fullname">
<span id="fullnameError" class="error"></span>
<!-- Gender -->
<div class="gender">
<label for="gender">Gender</label>
<label><input type="radio" name="gender" value="Male"> Male</label>
<label><input type="radio" name="gender" value="Female"> Female</label>
<label><input type="radio" name="gender" value="Other"> Other</label>
</div>
<span id="genderError" class="error"></span>
<!-- Email -->
<label for="email">Email</label>
<input type="email" id="email" name="email">
<span id="emailError" class="error"></span>
<!-- Phone -->
<label for="phone">Phone</label>
<input type="tel" id="phone" name="phone">
<span id="phoneError" class="error"></span>
<!-- Password -->
<label for="password">Password</label>
<input type="password" id="password" name="password">
<span id="passwordError" class="error"></span>
<!-- Confirm Password -->
<label for="confirm-password">Confirm Password</label>
<input type="password" id="confirm-password" name="confirm-password">
<span id="confirmPasswordError" class="error"></span>
<!-- Address -->
<label for="address">Address</label>
<input type="text" id="address" name="address">
<span id="addressError" class="error"></span>
<!-- Picture Upload -->
<label for="picture">Upload Picture</label>
<input type="file" id="picture" name="picture" accept="image/*">
<span id="pictureError" class="error"></span>
<!-- Document Upload -->
<label for="document">Upload Document</label>
<input type="file" id="document" name="document" accept=".pdf,.doc,.docx,.txt">
<span id="documentError" class="error"></span>
<!-- Submit Button -->
<button type="submit" class="btn">Register</button>
<small>Already Have An Account? <a href="signin.html">Sign In</a></small>
</form>
</div>
</section>
<script src="../js/javascript.js"></script>
</body>
</html>