<?php

function validateInput($input, $fieldName) {
    if (empty($input)) {
        return "Error: $fieldName is required.";
    }
    if ($fieldName == 'Name') {
        if (!preg_match('/^[a-zA-Z\s]{1,40}$/', $input)) {
            return "Error: $fieldName should only contain alphabetic characters and have a maximum length of 40 characters.";
        }
    }
    if ($fieldName == 'age') {
        if ($input <= 11) { 
            return "Error: $fieldName should be greater than 11.";
        }
    }
    if ($fieldName == 'email') {
        if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
            return "Error: Invalid email format.";
        }
    }
    if ($fieldName == 'phone') {
        if (strlen($input) > 15) {
            return "Error: Phone number should not exceed 15 characters.";
        }
    } 
    
    return ""; 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $dbHost = "localhost";
    $dbName = "fincrusive";
    $dbUser = "root";
    $dbPassword = "";

    $conn = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $fields = array(
        'uname' => 'Name',
        'email' => 'email',
        'age' => 'age',
        'phone' => 'phone',
        'query' => 'query'
    );
    $errorMessages = array();
    foreach ($fields as $fieldName => $fieldLabel) {
        if (!isset($_POST[$fieldName])) {
            $errorMessages[$fieldName] = "Error: $fieldLabel is required.";
        } else {
            $errorMessage = validateInput($_POST[$fieldName], $fieldLabel);
            if ($errorMessage !== "") {
                $errorMessages[$fieldName] = $errorMessage;
            }
        }
    }

    if (empty($errorMessages)) {
        $uname = mysqli_real_escape_string($conn, $_POST['uname']); 
        $email = mysqli_real_escape_string($conn, $_POST['email']); 
        $age = mysqli_real_escape_string($conn, $_POST['age']); 
        $phone = mysqli_real_escape_string($conn, $_POST['phone']); 
        $query = mysqli_real_escape_string($conn, $_POST['query']); 
        $method = "AES-256-CBC";
        $key = "encryptionKey123";
        $options = 0;
        $iv = '1234567891011121';
    
        $encryptedphone= openssl_encrypt($phone, $method, $key, $options,$iv);
        $sql = "INSERT INTO ucontact (uname, email, age, phoneno, query) VALUES ('$uname', '$email', '$age', '$encryptedphone', '$query')";

        if (mysqli_query($conn, $sql)) {
            // Start a session
            session_start();
            // Store name in session variable
            $_SESSION['uname'] = $uname;
            // Redirect to a new PHP file
            header("Location: whyinvest.php");
            exit(); // Ensure that subsequent code is not executed after redirection
        } else {
            $errorMessages['server'] = "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>