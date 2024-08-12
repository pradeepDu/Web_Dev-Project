<?php
// Your PHP code should be placed at the beginning of the file before any HTML content
include "../include/dbconnect.php"; 

// Function to update feedback in the database


// Check if the query_id parameter is set in the URL and it's a positive integer
if (isset($_POST['query_id']) && ctype_digit($_POST['query_id'])) {
    // Get the query_id from the URL and sanitize it to prevent SQL injection
    $query_id = intval($_POST['query_id']);
    


    // Prepare SQL statement to fetch the query details based on the query_id
    $stmt = $conn->prepare("SELECT * FROM queries WHERE query_id = ?");
    $stmt->bind_param("i", $query_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any row is found
    if ($result->num_rows > 0) {
        // Fetch the row
        $row = $result->fetch_assoc();}}




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

        $linkedQueries = getLinkedQueries($conn,$_POST['query_id']);


        $stmt = $conn->prepare("SELECT * FROM experts WHERE expert_id = ?");
    $stmt->bind_param("i",  $row['expert_id']);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any row is found
    if ($result->num_rows > 0) {
        // Fetch the row
        $expert = $result->fetch_assoc();
    
    
    
    }
    
?>





<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: aqua;
            height: 100vh;
            background: linear-gradient(90deg, #22b3ba, #fffbfb);
            font-family: "Poppins", sans-serif;
            font-weight: 400;
            font-style: normal;
            margin: 0;
            padding: 0;
        }
        #base {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }
        #main {
            width: 65vw;
            height: 80vh;
            position: relative;
            background-color: #9AD0C2;
            display: flex; 
       
           /* align-items: center;*/
            flex-direction: column;
           justify-content: flex-start;
            border-radius: 20px;
        
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
        }

        #left{
            display:flex;
            flex-direction:column;
            width:60%;
            align-items: center;
            


        }
        #right
        {
            display:flex;
            flex-direction:column;
            width:60%;
            background:  darkblue;
            margin: 0;
            border-radius: 20px;
            background:url("img4.jpeg");
            background-size: cover;

        }
        
        #card {
            width: 70vh;
            max-width: 200px; /* Limit card width */
        }
        #card input,
        #card button ,
        #card textarea{
            margin-bottom: 10px;
            width:20vw;
         
            border-radius: 5px 5px 0px 0px;
            border: 1px solid #ccc;
      
        }
        #errorContainer {
            color: red;
            margin-bottom: 10px;
        }
        #errorContainer .error {
            font-size: 12px;
        }
        #im img {
            max-width: 20%;
            border-radius: 50%;
            opacity: 0.8;
            margin-bottom: 20px;
        }
        button {
            color: white;
            background-color: darkblue;
            border: none;
            height:5vh;
            border-radius: 10px;
            cursor: pointer;
            width:15vw;
            margin:10px;
        }
        button:hover {
            background-color: blue;
        }
        @media (max-width: 768px) {
            #main {
                width: 90vw;
            }
        }
        form {
            display: flex;
            align-items: center;
            justify-content: center;
            padding-left:20%;

        }

        #card input[type="text"],
        #card input[type="number"],
        #card input[type="tel"] {
            padding-left: 30px; /* Adjust as needed */
        }

        /* Style the icons */
        #card .fa {
            position: absolute;
            margin-top: 10px; /* Adjust as needed */
            margin-left: 10px; /* Adjust as needed */
            color: #999; /* Adjust icon color */
        }
        #errorContainer
        {
            width:20vw;

        }

        #contactushead{
            margin:5vh;
            margin-top:3vh;
            padding-left:20%;
        }
        
        #query{
            border-radius:20px;
        }

        .query-details
        {

            display:flex;
            flex-direction: column;
            justify-content:center;
            align-items:center;

        }
        #headq{
    display: flex;
    justify-content: center;
    margin-top: 3vh;
    font-size: 2rem;
    
}
#update {
   
    position: absolute;
    bottom: 10px;
    right: 10px; 
}

#morebut{
    color:white;
    background-color: 265073;
    border: none;
    height:5vh;
    border-radius: 10px;
    cursor: pointer;
    width:15vw;
    margin:10px;
}
.upper
{
    margin-top: 5%;
}

p{
    margin:0.5vh;
}
    </style>


</head>
<body>
    <div id="base">
        <div id="main">
        <h2 id="headq">Query Details</h2>
            <div class="upper">
      
        

            <div class="query-details">
         
            <p><strong>Query ID:</strong> <?php echo htmlspecialchars($row['query_id']); ?></p>
            <p><strong>Expert Name:</strong> <?php echo htmlspecialchars($expert['expertfullname']); ?></p>
            <p><strong>Type:</strong> <?php echo htmlspecialchars($row['type']); ?></p>
            <p><strong>Query Text:</strong> <?php echo htmlspecialchars($row['query_text']); ?></p>
            <p><strong>Reply Text:</strong> <?php echo htmlspecialchars($row['reply_text']); ?></p>
            <p><strong>Status:</strong> <?php echo htmlspecialchars($row['status']); ?></p>
         

            <?php if (!empty($linkedQueries)): ?>
                <div>
                    <?php 
                    $count = 0; // Initialize counter
                    foreach ($linkedQueries as $query): 

                        if ($count==0):
                        {
                            echo '<center><h2>Previous Query</h2></center>';
                        }
                        elseif ($count > 0): // Check if it's not the first iteration
                    ?>
                    <div class="query-details">
                    
                    <div class="query-details">
        <p><strong>Query ID:</strong> <?php echo htmlspecialchars($query['query_id']); ?></p>
        <p><strong>Query:</strong> <?php echo htmlspecialchars($query['query_text']); ?>
        <strong>ExpertReply:</strong> <?php echo htmlspecialchars($query['reply_text']); ?></p>
                        <!-- Display linked query details -->
                    </div>

                    <?php 
                        
                        endif;

                        $count++; // Increment counter
                    endforeach; 
                endif;
                    ?>
                </div>
               
              
            </div>

            <div id="update">
       <p><strong>Updated At:</strong> <?php echo htmlspecialchars($row['updated_at']); ?></p>
            <p><strong>Created At:</strong> <?php echo htmlspecialchars($row['created_at']); ?></p>
       </div>
        </div>
    </div>
</body>
</html>
