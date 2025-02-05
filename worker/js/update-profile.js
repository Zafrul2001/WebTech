document.getElementById("updateForm").addEventListener("submit", function (e) {
    e.preventDefault();

    let formData = new FormData(this);
    let xhr = new XMLHttpRequest();

    xhr.open("POST", "php/update_profile.php", true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            document.getElementById("message").innerHTML = `<p>${xhr.responseText}</p>`;
        } else {
            document.getElementById("message").innerHTML = `<p style="color: red;">Error updating profile.</p>`;
        }
    };

    xhr.send(formData);
});
