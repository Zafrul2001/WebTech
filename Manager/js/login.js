function validateForm() {
    let isValid = true;

    // Username validation
    let username = document.getElementById("username").value.trim();
    let usernameError = document.getElementById("usernameError");
    if (username === "") {
        usernameError.innerHTML = "Username must not be empty.";
        isValid = false;
    } else {
        usernameError.innerHTML = "";
    }

    // Password validation
    let password = document.getElementById("password").value.trim();
    let passwordError = document.getElementById("passwordError");
    if (password === "") {
        passwordError.innerHTML = "Password must not be empty.";
        isValid = false;
    } else {
        passwordError.innerHTML = "";
    }

    // If validation fails, prevent form submission
    return isValid;
}
