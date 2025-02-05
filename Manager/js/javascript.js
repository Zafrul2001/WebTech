function validateForm() {
    let isValid = true;
    // Clear all previous error messages
    const errors = document.querySelectorAll('.error');
    errors.forEach(error => error.innerHTML = "");
    // Username validation
    const username = document.getElementById("username").value.trim();
    if (username === "") {
        document.getElementById("usernameError").innerHTML = "Username is required.";
        isValid = false;
    }
    // Full name validation
    const fullname = document.getElementById("fullname").value.trim();
    if (fullname === "") {
        document.getElementById("fullnameError").innerHTML = "Full name is required.";
        isValid = false;
    }
    // Gender validation
    const gender = document.querySelector('input[name="gender"]:checked');
    if (!gender) {
        document.getElementById("genderError").innerHTML = "Gender is required.";
        isValid = false;
    }
    // Email validation
    const email = document.getElementById("email").value.trim();
    const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (email === "") {
        document.getElementById("emailError").innerHTML = "Email is required.";
        isValid = false;
    } else if (!emailRegex.test(email)) {
        document.getElementById("emailError").innerHTML = "Enter a valid email address.";
        isValid = false;
    }
    // Phone validation
    const phone = document.getElementById("phone").value.trim();
    const phoneRegex = /^01\d{9}$/;
    if (phone === "") {
        document.getElementById("phoneError").innerHTML = "Phone number is required.";
        isValid = false;
    } else if (!phoneRegex.test(phone)) {
        document.getElementById("phoneError").innerHTML = "Phone number must be 11 digits and start with '01'.";
        isValid = false;
    }
    // Password validation
    const password = document.getElementById("password").value.trim();
    if (password === "") {
        document.getElementById("passwordError").innerHTML = "Password is required.";
        isValid = false;
    } else if (password.length < 8) {
        document.getElementById("passwordError").innerHTML = "Password must be at least 8 characters long.";
        isValid = false;
    }
    // Confirm password validation
    const confirmPassword = document.getElementById("confirm-password").value.trim();
    if (confirmPassword === "") {
        document.getElementById("confirmPasswordError").innerHTML = "Confirm password is required.";
        isValid = false;
    } else if (password !== confirmPassword) {
        document.getElementById("confirmPasswordError").innerHTML = "Passwords do not match.";
        isValid = false;
    }
    // Address validation
    const address = document.getElementById("address").value.trim();
    if (address === "") {
        document.getElementById("addressError").innerHTML = "Address is required.";
        isValid = false;
    }
    // Picture upload validation
    const picture = document.getElementById("picture").value;
    if (picture === "") {
        document.getElementById("pictureError").innerHTML = "Please upload a picture.";
        isValid = false;
    }
    // Document upload validation
    const documentFile = document.getElementById("document").value;
    if (documentFile === "") {
        document.getElementById("documentError").innerHTML = "Please upload a document.";
        isValid = false;
    }
    // Return false if any validation fails
    return isValid;
 }