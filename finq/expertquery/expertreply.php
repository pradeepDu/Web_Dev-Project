<?php
include_once "../include/dbconnect.php";
session_start();

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Assuming you have a query_id from your form or session to identify the record
        $query_id = $_POST['query_id']; // Ensure this is properly sanitized or validated
        $expert_id = $_SESSION['eid']; // Assuming this is obtained from your session or form
        $reply = $_POST['query']; // Ensure this is properly sanitized or validated
        echo $query_id;
        // Prepare your update SQL, with a placeholder for updated_at
        // Note: You need to ensure you have a valid timezone set in your php.ini or use date_default_timezone_set()
        $currentDateTime = date('Y-m-d H:i:s');
        $query = "UPDATE queries SET expert_id=?, reply_text=?, status='resolved', updated_at=? WHERE query_id=?";

        // Prepare statement
        $stmt = $conn->prepare($query);
        if (!$stmt) {
            throw new Exception("Error in preparing statement: " . $conn->error);
        }

        // Bind parameters
        // Assuming query_id is an integer, adjust the types accordingly (i - integer, s - string, d - double, b - blob)
        $stmt->bind_param("issi", $expert_id, $reply, $currentDateTime, $query_id);

        // Execute statement
        if ($stmt->execute()) {
            // Query updated successfully
            header("Location: expertpage.php"); // Redirect might not work after echo
            echo "Query updated successfully.";
        } else {
            // Error occurred while updating query
            echo "Error in query execution: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    } else {
        // If the form is not submitted, handle accordingly
        exit("Form is not submitted.");
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

// Close connection
$conn->close();
?>
