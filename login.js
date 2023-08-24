document.addEventListener("DOMContentLoaded", function () {
    const loginForm = document.getElementById("index");

    loginForm.addEventListener("submit", function (event) {
        event.preventDefault();

        const username = document.getElementById("username").value;
        const password = document.getElementById("password").value;
        

        // Send the username and password to the server for validation
        fetch("check_login.php", {
            method: "POST",
            body: JSON.stringify({ username: username, password: password }),
            headers: {
                "Content-Type": "application/json"
            }
        })

        .then(response => response.json())
        .then(data => {
            if (data.valid) {
                // Redirect to the next page if login is valid
                window.location.href = "entry.html";
            } else {
                alert("Invalid username or password. Please try again.");
            }
        })
        .catch(error => {
            console.error("An error occurred:", error);
        });
    });
});
