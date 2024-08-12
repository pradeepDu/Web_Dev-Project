// validation.js

function validateForm() {
    // Retrieve form input values
    var name = document.getElementById('Name').value;
    var email = document.getElementById('Email').value;
    var password = document.getElementById('Password').value;
    var confirmPassword = document.getElementById('Confirm-Password').value;

    // Perform validations
    if (!name || !email || !password || !confirmPassword) {
        alert("All fields are required");
        return false;
    }

    // Validate name length and format
    var nameWords = name.split(' ');
    if (nameWords.length < 3) {
        alert("Name must contain at least 3 words");
        return false;
    }
    if (!isNaN(nameWords[0])) {
        alert("Name should not start with a number");
        return false;
    }

    // Validate email format
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert("Invalid email format");
        return false;
    }

    // Validate password strength
    var passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+]).{8,}$/;
    if (!passwordRegex.test(password)) {
        alert("Password must contain at least one number, one uppercase letter, one lowercase letter, one special character, and be at least 8 characters long");
        return false;
    }

    if (password !== confirmPassword) {
        alert("Passwords do not match");
        return false;
    }

    // If all validations pass, return true to allow form submission
    return true;
}
