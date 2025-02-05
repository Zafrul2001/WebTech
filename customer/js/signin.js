// Select the form and input elements
const form = document.getElementById('signin-form');
const usernameInput = document.getElementById('username');
const passwordInput = document.getElementById('password');
const errorMessage = document.getElementById('error-message');
const alertMessage = document.querySelector('.alert__message');

// Form submit event
form.addEventListener('submit', function (event) {
    let isValid = true;

    // Clear previous error messages
    alertMessage.style.display = 'none';

    // Check if username and password are filled
    if (usernameInput.value.trim() === "") {
        isValid = false;
        alertMessage.style.display = 'block';
        errorMessage.textContent = "Username is required!";
    }
    if (passwordInput.value.trim() === "") {
        isValid = false;
        alertMessage.style.display = 'block';
        errorMessage.textContent = "Password is required!";
    }

    // If form is invalid, prevent submission
    if (!isValid) {
        event.preventDefault();
    }
});
