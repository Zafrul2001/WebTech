document.getElementById('report-worker-form').addEventListener('submit', function(e) {
    e.preventDefault(); // Prevent the default form submission

    // Get the form values
    const title = document.getElementById('report-title').value;
    const description = document.getElementById('report-description').value;

    // Client-side validation
    if (title === "" || description === "") {
        alert("Both title and description are required.");
        return;
    }

    const formData = new FormData();
    formData.append('title', title);
    formData.append('description', description);

    // AJAX request to send the data to PHP
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../controller/report-worker-process.php", true);

    xhr.onload = function() {
        if (xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            if (response.success) {
                alert(response.message);  // Show success message
                window.location.href = "../view/report-history.php"; // Redirect to report history page
            } else {
                alert(response.message);  // Show error message
            }
        } else {
            alert("An error occurred. Please try again.");
        }
    };

    xhr.send(formData);
});
