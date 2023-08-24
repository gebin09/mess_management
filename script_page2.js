document.addEventListener("DOMContentLoaded", function () {
    const nameInput = document.getElementById("name");
    const codeIdInput = document.getElementById("codeId");
    const submitButton = document.getElementById("submitData");
    
    nameInput.addEventListener("input", function () {
        // Allow only letters and spaces in name field
        const nameValue = nameInput.value.replace(/[^a-zA-Z ]/g, "");
        nameInput.value = nameValue;
    });
    
    codeIdInput.addEventListener("input", function () {
        // Allow only digits in codeId field
        const codeIdValue = codeIdInput.value.replace(/\D/g, "");
        codeIdInput.value = codeIdValue;
    });
    



    submitButton.addEventListener("click", function (event) {
        const nameValue = nameInput.value.trim();
        const codeIdValue = codeIdInput.value.trim();
        
        // Perform further validation if needed
        if (nameValue === "") {
            alert("Please enter a valid name.");
            event.preventDefault(); // Prevent form submission
        }
        
        if (codeIdValue === "") {
            alert("Please enter a valid code ID.");
            event.preventDefault(); // Prevent form submission
        }
        
        // You can also add more complex validation here
        
        // If all validation passes, the form will be submitted as usual
    });
});
