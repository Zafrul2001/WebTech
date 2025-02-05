document.getElementById("transaction-form").addEventListener("submit", function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    fetch("../php/process-transaction.php", {
        method: "POST",
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById("transaction-message").innerText = data.message;
        document.getElementById("transaction-message").style.color = data.success ? "green" : "red";

        if (data.success) {
            // Update balance dynamically
            let currentBalance = parseFloat(document.getElementById("balance").innerText);
            let amount = parseFloat(document.getElementById("amount").value);
            let transactionType = document.getElementById("transaction_type").value;

            if (transactionType === "Deposit") {
                currentBalance += amount;
            } else {
                currentBalance -= amount;
            }

            document.getElementById("balance").innerText = currentBalance.toFixed(2);
        }
    });
});
