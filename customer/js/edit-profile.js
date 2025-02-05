// AJAX form submission for profile edit
document.getElementById('edit-profile-form').addEventListener('submit', function(e) {
    e.preventDefault(); // Prevent default form submission

    // Get form values
    const firstname = document.getElementById('firstname').value;
    const lastname = document.getElementById('lastname').value;
    const username = document.getElementById('username').value;
    const email = document.getElementById('email').value;
    const address = document.getElementById('address').value;
    const fileUpload = document.getElementById('file-upload').files[0];

    // Client-side validation
    if (firstname === "" || lastname === "" || username === "" || email === "" || address === "") {
        alert("All fields are required.");
        return;
    }

    const formData = new FormData();
    formData.append('firstname', firstname);
    formData.append('lastname', lastname);
    formData.append('username', username);
    formData.append('email', email);
    formData.append('address', address);
    formData.append('file-upload', fileUpload);

    // AJAX request to send form data to PHP for processing
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../controller/edit-profile-process.php", true);

    xhr.onload = function() {
        if (xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            if (response.success) {
                alert(response.message);
                window.location.href = 'profile.php'; // Redirect to the profile page
            } else {
                alert(response.message);
            }
        } else {
            alert("An error occurred. Please try again later.");
        }
    };

    xhr.send(formData);
});

// Exit button functionality
document.getElementById('exit-btn').addEventListener('click', function() {
    window.location.href = 'profile.php'; // Exit to profile page
});
