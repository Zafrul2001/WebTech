document.getElementById("registrationForm").addEventListener("submit", function (event) {
    let isValid = true;

    // Clear previous error messages
    document.querySelectorAll('.error').forEach(error => error.textContent = '');

    // Get form values
    let username = document.getElementById("username").value.trim();
    let fullname = document.getElementById("fullname").value.trim();
    let email = document.getElementById("email").value.trim();
    let phone = document.getElementById("phone").value.trim();
    let password = document.getElementById("password").value;
    let confirmPassword = document.getElementById("confirm-password").value;
    let address = document.getElementById("address").value.trim();
    let profession = document.getElementById("profession").value;
    let gender = document.querySelector('input[name="gender"]:checked');

    // Validation checks
    if (username === "") {
        document.getElementById("usernameError").textContent = "Username is required.";
        isValid = false;
    }
    if (fullname === "") {
        document.getElementById("fullnameError").textContent = "Full Name is required.";
        isValid = false;
    }
    if (!gender) {
        document.getElementById("genderError").textContent = "Gender is required.";
        isValid = false;
    }
    if (email === "" || !/^\S+@\S+\.\S+$/.test(email)) {
        document.getElementById("emailError").textContent = "Valid email is required.";
        isValid = false;
    }
    if (phone === "" || !/^\d{10,15}$/.test(phone)) {
        document.getElementById("phoneError").textContent = "Valid phone number is required.";
        isValid = false;
    }
    if (profession === "") {
        document.getElementById("professionError").textContent = "Profession is required.";
        isValid = false;
    }
    if (password.length < 6) {
        document.getElementById("passwordError").textContent = "Password must be at least 6 characters.";
        isValid = false;
    }
    if (password !== confirmPassword) {
        document.getElementById("confirmPasswordError").textContent = "Passwords do not match.";
        isValid = false;
    }
    if (address === "") {
        document.getElementById("addressError").textContent = "Address is required.";
        isValid = false;
    }

    // Prevent form submission if validation fails
    if (!isValid) {
        event.preventDefault();
    }
});
