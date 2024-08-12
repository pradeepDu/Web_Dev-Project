<?php
// Your PHP code should be placed at the beginning of the file before any HTML content
include "../include/dbconnect.php"; 
session_start();
// Check if the query_id parameter is set in the URL and it's a positive integer
if (isset($_POST['query_id']) && ctype_digit($_POST['query_id'])) {

    // Get the query_id from the URL and sanitize it to prevent SQL injection
    $query_id = intval($_POST['query_id']);
    $expert_id = $_SESSION['eid']; 
    // Prepare SQL statement to fetch the query details based on the query_id
    $stmt = $conn->prepare("SELECT * FROM queries WHERE query_id = ? and expert_id=?");
    $stmt->bind_param("ii", $query_id,$expert_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any row is found
    if ($result->num_rows > 0) {
        // Fetch the row
        $row = $result->fetch_assoc();

        $stmt = $conn->prepare("SELECT * FROM login WHERE user_id = ?");
        $stmt->bind_param("i",  $row['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
    
        // Check if any row is found
        if ($result->num_rows > 0) {
            // Fetch the row
            $user = $result->fetch_assoc();
        }        
?>

<?php
    } else {
        // If no row is found with the provided query_id
        echo "<p>No query found with the provided ID.</p>";
    }

    // Close the database connection
    $stmt->close();
} else {
    // If query_id parameter is not provided in the URL or it's not a positive integer
    echo "<p>No valid query ID provided.</p>";
}

// Close the database connection
$conn->close();
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
          
            background-color: #9AD0C2;
            display: flex; 
 
            flex-direction: row;
            border-radius: 20px;

            justify-content: center;
        align-items: center;
        
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
        }

        #left{
            display:flex;
            flex-direction:column;
            width:60%;
            align-items: flex-start;
            


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
      
        }
        
        #query{
            border-radius:20px;
        }
    .query-details{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    h2{
        margin:20px;
    }

    #submit{
        color:white;
    background-color: 265073;
    border: none;
    height:5vh;
    border-radius: 10px;
    cursor: pointer;
    width:15vw;
 
    }
    </style>


</head>
<body>
    <div id="base">
  
        <div id="main">
       
            <div class="query-details">
            <h2>Query Details</h2>
            <p><strong>Query ID:</strong> <?php echo htmlspecialchars($row['query_id']); ?></p>
   
            <p><strong>User Name:</strong> <?php echo htmlspecialchars($user['userfullname']); ?></p>
            <p><strong>Type:</strong> <?php echo htmlspecialchars($row['type']); ?></p>
            <p><strong>Query Text:</strong> <?php echo htmlspecialchars($row['query_text']); ?></p>
          
            <p><strong>Status:</strong> <?php echo htmlspecialchars($row['status']); ?></p>
           
            <p><strong>Posted:</strong> <?php echo htmlspecialchars($row['created_at']); ?></p>


            <form name="form" method="post" action="expertreply.php">
            <input type="hidden" name="query_id" value="<?php echo htmlspecialchars($row['query_id']); ?>">
                <div id="card">
              
                    
                <br>
       <br>
                    <i class="fas fa-question-circle"></i><b> Solution </b>
                    <textarea cols="100" rows="10" name="query" placeholder="Solution" id="query"></textarea>
                    <br>
                    <input type="submit" id="submit">
                    <div id="errorContainer" class="errorContainer"></div>
                </div>
                </div>

        </div>
        </div>
    </div>
</body>

<script>       function addEventListeners() {
        
        const queryBoxes = document.querySelectorAll('.query-box');
        queryBoxes.forEach(function(box) {
            box.addEventListener('click', function() {
                const queryId = this.textContent; 
                const contentBox = document.querySelector('.content-box');
                
                const formData = new FormData();
                formData.append('query_id', queryId);

                fetch('expertreply.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    contentBox.innerHTML = data;
             
                    addEventListeners();
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });
        });
    }

    // Call the function to add event listeners initially
    addEventListeners();
</script>
</html>


