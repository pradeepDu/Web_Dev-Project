<?php

session_start();


include_once "../include/dbconnect.php"; 

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $user_id = $_SESSION['uid'];
        //$user_id = 1;

        $type = $_POST['financialAdvice'];
        $eid = (int) $_POST['advisername'];
        echo $type;
        $query_text = $_POST['query'];
       
        $previd=$_POST['previous_query_id'];
        // Insert data into the database
        $query = "INSERT INTO queries (user_id, type, expert_id,query_text, status, created_at, updated_at,previous_query_id) 
                  VALUES (?, ?, ?, ?, 'open', NOW(), NOW(),?)";

        // Prepare statement
        $stmt = $conn->prepare($query);

        if (!$stmt) {
            throw new Exception("Error: " . $conn->error);
        }

        // Bind parameters
        $stmt->bind_param("isisi", $user_id, $type, $eid, $query_text,$previd);

        // Execute statement
        if ($stmt->execute()) {
            // Query inserted successfully
           header("Location: query.php");
 
            echo "Query submitted successfully.";
        } else {
            // Error occurred while inserting query
            echo "Error: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    

    } else {
        // If the form is not submitted, redirect the user to the form page
       Example:
        exit("Form is not submitted.");
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

// Close connection
$conn->close();
?>
