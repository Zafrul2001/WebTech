document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    
    form.addEventListener('submit', function (event) {
        // Get input fields
        const firstName = document.querySelector('input[name="firstname"]');
        const lastName = document.querySelector('input[name="lastname"]');
        const username = document.querySelector('input[name="username"]');
        const email = document.querySelector('input[name="email"]');
        const password = document.querySelector('input[name="password"]');
        const confirmPassword = document.querySelector('input[name="confirm-password"]');
        const address = document.querySelector('input[name="address"]');
        const gender = document.querySelectorAll('input[name="gender"]');

        // Validate First Name
        document.addEventListener('DOMContentLoaded', firstName)(
            
        )
        if (firstName.value.trim() === '') {
            alert('First Name is required');
            event.preventDefault();
            return;
        }

        // Validate Last Name
        if (lastName.value.trim() === '') {
            alert('Last Name is required');
            event.preventDefault();
            return;
        }

        // Validate Username
        if (username.value.trim() === '') {
            alert('Username is required');
            event.preventDefault();
            return;
        }

        // Validate Email
        const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (!emailPattern.test(email.value)) {
            alert('Please enter a valid email');
            event.preventDefault();
            return;
        }

        // Validate Password
        if (password.value.length < 6) {
            alert('Password must be at least 6 characters');
            event.preventDefault();
            return;
        }

        // Validate Confirm Password
        if (password.value !== confirmPassword.value) {
            alert('Passwords do not match');
            event.preventDefault();
            return;
        }

        // Validate Address
        if (address.value.trim() === '') {
            alert('Address is required');
            event.preventDefault();
            return;
        }

        // Validate Gender
        if (![...gender].some(g => g.checked)) {
            alert('Please select your gender');
            event.preventDefault();
            return;
        }
    });
});
