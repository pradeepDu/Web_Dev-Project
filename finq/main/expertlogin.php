<?php
include "../include/dbconnect.php";

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if it's a sign-up request
        if (isset($_POST["signup"])) {
            // Retrieve form data
            $user_name = $_POST["user_name"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $confirmpass = $_POST["confirmpass"];
            $fullname=$_POST["fullname"];
            // Validate form data
            if (empty($user_name) || empty($email) || empty($password) || empty($confirmpass)) {
                throw new Exception("All fields are required");
            }

           

            // Additional validation for password strength
            if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{4,}$/', $password)) {
                throw new Exception("Password must contain at least one uppercase letter, one lowercase letter, one number, one special character, and be at least 4 characters long");
            }

            // Check if user_name already exists
            $stmt = $conn->prepare("SELECT expertname FROM experts WHERE expertname = ?");
            if (!$stmt) {
                throw new Exception("Prepare failed: " . $conn->error);
            }
            $stmt->bind_param("s", $user_name);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                throw new Exception("User name already exists");
            }
            $stmt->close();

            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            // Prepare SQL statement for sign-up
            $sql = $conn->prepare("INSERT INTO experts (expertfullname,expertname, email, password) VALUES (?, ?, ?,?)");
            if (!$sql) {
                throw new Exception("Prepare failed: " . $conn->error);
            }

            // Bind parameters to the prepared statement
            $sql->bind_param("ssss",$fullname ,$user_name, $email, $hashed_password);

            // Execute the statement
            if ($sql->execute()) {
                echo "New record created successfully";
            } else {
                throw new Exception("Error: " . $sql->error);
            }

            // Close the statement
            $sql->close();
        } 
        
        elseif (isset($_POST["signin"])) {
            // Retrieve form data
            $signin_user_name = $_POST["signin_user_name"];
            $signin_password = $_POST["signin_password"];

            // Prepare SQL statement for sign-in
            $stmt = $conn->prepare("SELECT * FROM experts WHERE expertname = ?");
            if (!$stmt) {
                throw new Exception("Prepare failed: " . $conn->error);
            }
            $stmt->bind_param("s", $signin_user_name);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows == 1) {
                // Fetch the result
                $row = $result->fetch_assoc();
                $hashed_password = $row['password'];

                // Verify the password
                if (password_verify($signin_password, $hashed_password)) {
                    echo "Login successful!";
                    session_start();
                    $_SESSION['eid']=$row['expert_id'];
                    $_SESSION['username']=$row['expertname'];
                     header("Location: ../expertquery/expertpage.php");
                     exit();
                } else {
                    throw new Exception("Invalid username or password");
                    echo $hashed_password;
                }
            } else {
                throw new Exception("Invalid username or password");
            }
            $stmt->close();
        }
    }

    // Close the connection
    $conn->close();

?>
