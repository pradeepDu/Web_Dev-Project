function formValidation() {
    var uname = document.getElementById("uname");
    var email = document.getElementsByName("email")[0];
    var age = document.getElementById("age");
    var phone = document.getElementsByName("phone")[0];
    var query = document.getElementsByName("query")[0];

    var errorContainer = document.getElementById("errorContainer");
    errorContainer.innerHTML = ""; // Clear previous errors

    var errors = [];

    // Reset border colors
    uname.style.border = '1px solid #ccc';
    email.style.border = '1px solid #ccc';
    age.style.border = '1px solid #ccc';
    phone.style.border = '1px solid #ccc';
    query.style.border = '1px solid #ccc';

    // Username validation
    if (!/^[a-zA-Z\s]{1,40}$/.test(uname.value)) {
        errors.push("Username must have alphabet characters only and be maximum 40 characters long.");
        uname.style.border = '1px solid red'; // Set border color to red
        uname.focus(); // Focus on the input field with the error
    }

    // Email validation
    if (!email.value || !/\S+@\S+\.\S+/.test(email.value)) {
        errors.push("Invalid email address.");
        email.style.border = '1px solid red'; // Set border color to red
        email.focus(); // Focus on the input field with the error
    }

    // Age validation
    if (age.value <= 11) {
        errors.push("Age must be greater than 11.");
        age.style.border = '1px solid red'; // Set border color to red
        age.focus(); // Focus on the input field with the error
    }

    // Phone validation
    if (!phone.value || phone.value.length > 15) {
        errors.push("Phone should not be empty and should not exceed 15 characters.");
        phone.style.border = '1px solid red'; // Set border color to red
        phone.focus(); // Focus on the input field with the error
    }

    // Query validation (assuming only letters, numbers, spaces, periods, and question marks are allowed)
    if (!/^[\w\s.?]+$/.test(query.value)) {
        errors.push("Query must contain only letters, numbers, spaces, periods, and question marks.");
        query.style.border = '1px solid red'; // Set border color to red
        query.focus(); // Focus on the input field with the error
    }

    // Display only the first error
    if (errors.length > 0) {
        var errorDiv = document.createElement("div");
        errorDiv.className = "error";
        errorDiv.textContent = errors[0];
        errorContainer.appendChild(errorDiv);
        return false; // Prevent form submission
    }

    // Reset border colors after successful validation
    uname.style.border = '1px solid #ccc';
    email.style.border = '1px solid #ccc';
    age.style.border = '1px solid #ccc';
    phone.style.border = '1px solid #ccc';
    query.style.border = '1px solid #ccc';

    return true; // Allow form submission
}