document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("transaction-form").addEventListener("submit", function (e) {
        e.preventDefault();

        let formData = new FormData(this);
        let messageBox = document.getElementById("transaction-message");

        fetch("process_transaction.php", {
            method: "POST",
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            messageBox.textContent = data.message;
            if (data.new_balance) {
                document.getElementById("balance").textContent = data.new_balance;
            }
        })
        .catch(error => {
            messageBox.textContent = "Error processing transaction.";
            console.error(error);
        });
    });
});
