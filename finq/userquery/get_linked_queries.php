<?php
// Include necessary files
include "../include/dbconnect.php";

// Function to fetch linked queries


function getLinkedQueries($conn, $queryId) {
    $linkedQueries = array();
    $sql = "SELECT * FROM queries WHERE query_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $queryId);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $linkedQueries[] = $row;
            if (!empty($row['previous_query_id'])) {
                $linkedQueries = array_merge($linkedQueries, getLinkedQueries($conn, $row['previous_query_id']));
            }
        }
    }
    $stmt->close();
    return $linkedQueries;
}

// Check if the query_id parameter is set in the POST data and it's a positive integer
if (isset($_POST['query_id']) && ctype_digit($_POST['query_id'])) {
    // Get the query_id from the POST data and sanitize it to prevent SQL injection
    $query_id = intval($_POST['query_id']);
    
    // Fetch linked queries
    $linkedQueries = getLinkedQueries($conn, $query_id);
    
    // Output linked queries as JSON
    header('Content-Type: application/json');
    echo json_encode($linkedQueries);
    exit;
} else {
    // If query_id is not provided or not a positive integer, return an empty JSON array
    echo json_encode([]);
    exit;
}
?>
