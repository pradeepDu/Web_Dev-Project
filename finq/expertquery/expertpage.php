<?php include "../include/navbar.php"?>
<?php include "../include/dbconnect.php"?>
<link rel="stylesheet" href="../css/expertpage.css">


<style>

body, html {
    margin: 0;
    padding: 0;
    height: 100%;
}

.maincontainer {
    display: flex;
    height: 100%;
   
 

}

.sidebar {
    width: 20vw;
    background-color: #2D9596;
    padding: 20px;

    height:100vh;
    overflow-x: hidden;
    overflow-y: auto;
}

.content-box {
    flex: 1;
    background-color: white;
    padding: 20px;
}

.query-box {
    background-color: white;
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 10px;
    width: auto;
    color: #265073;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 10px;

}






.resolved-query-box{
    background-color: #ECF4D6;
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 10px;
    width: auto;
    color: #265073;
    display: flex;
    justify-content: center;
    align-items: center;

    border-radius: 10px;
}



.query-box-pending{
    background-color: white;
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 10px;
    width: auto;
    color: #265073;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 10px;
}


    </style>

<div class="maincontainer">
    <div class="sidebar">

        <div style:"width:100%;background-color:red;">Pending Queries</div>
        <?php

        

        $expert_id = $_SESSION['eid']; 
   
      
        $stmt = $conn->prepare("SELECT * FROM queries WHERE status = 'open' AND expert_id=?");
        $stmt->bind_param("i",$expert_id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Display queries in boxes
        while ($row = $result->fetch_assoc()) {

            echo '<div class="query-box">' . $row['query_id'] . '</div>';
        }
        ?>
        <div style:"width:100%;background-color:red;">Resolved Queries</div>
        <?php
  
       // $user_id = 1; 

        $stmt = $conn->prepare("SELECT * FROM queries where status = 'resolved' AND expert_id=?");
        $stmt->bind_param("i",$expert_id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Display queries in boxes
        while ($row = $result->fetch_assoc()) {
            echo '<div class="resolved-query-box">' . $row['query_id'] . '</div>';
        }
        ?>
    </div>
    <div class="content-box">
      
    </div>
</div>

<?php include "../include/footer.php" ?>
<script>
    // Function to add event listeners
    function addEventListeners() {
        // Add click event listener to query boxes
        const queryBoxes = document.querySelectorAll('.query-box');
        queryBoxes.forEach(function(box) {
            box.addEventListener('click', function() {
                const queryId = this.textContent; 
                const contentBox = document.querySelector('.content-box');
                
                const formData = new FormData();
                formData.append('query_id', queryId);

                fetch('expertquery.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    contentBox.innerHTML = data;
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });
        });

        // Add click event listener to resolved query boxes
        const resolvedQueryBoxes = document.querySelectorAll('.resolved-query-box');
        resolvedQueryBoxes.forEach(function(box) {
            box.addEventListener('click', function() {
                const queryId = this.textContent; 
                const contentBox = document.querySelector('.content-box');
                
                const formData = new FormData();
                formData.append('query_id', queryId);

                fetch('expertr.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    contentBox.innerHTML = data;
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