document.addEventListener("DOMContentLoaded", function () {
    document.querySelector("form").addEventListener("submit", function (event) {
        let username = document.getElementById("username").value.trim();
        let password = document.getElementById("password").value.trim();
        let usernameError = document.getElementById("usernameError");
        let passwordError = document.getElementById("passwordError");

        // Clear previous error messages
        usernameError.textContent = "";
        passwordError.textContent = "";

        // Validate the form fields
        if (username === "") {
            usernameError.textContent = "Username is required";
            event.preventDefault(); // Prevent form submission
            return;
        }
        if (password === "") {
            passwordError.textContent = "Password is required";
            event.preventDefault(); // Prevent form submission
            return;
        }
    });
});
