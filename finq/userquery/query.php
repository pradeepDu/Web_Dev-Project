<?php include "../include/navbar.php"?>
<?php include "../include/dbconnect.php"?>

<link rel="stylesheet" href="../css/query.css">
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


#addq{
    color:white;
    background-color: 265073;
    border: none;
    height:5vh;
    border-radius: 10px;
    cursor: pointer;
    width:15vw;
    margin:10px;
}

#submit{
        color: white;
        background-color: darkblue;
        border: none;
        height:5vh;
        border-radius: 10px;
        cursor: pointer;
        width:15vw;
        margin:10px; 
}

.resolved-query-box{
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
        <button id="addq">Add New Queries</button>
        <div style:"width:100%;background-color:red;">Pending Queries</div>
        <?php

        $user_id = $_SESSION['uid']; // Assuming user ID 1 for demonstration

        // Prepare SQL statement
        $stmt = $conn->prepare("SELECT * FROM queries WHERE user_id = ? AND status = 'open'");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Display queries in boxes
        while ($row = $result->fetch_assoc()) {
            echo '<div class="query-box-pending">' . $row['query_id'] . '</div>';
        }
        ?>
        <div style:"width:100%;background-color:red;">Resolved Queries</div>
        <?php
  
        $user_id = $_SESSION['uid'];

        $stmt = $conn->prepare("SELECT * FROM queries WHERE user_id = ? AND status = 'resolved'");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Display queries in boxes
        while ($row = $result->fetch_assoc()) {
            echo '<div class="query-box">' . $row['query_id'] . '</div>';
        }
        ?>
    </div>
    <div class="content-box">
       <?php include "queryform.php" ?>
    </div>
</div>



<?php include "../include/footer.php" ?>
<script>

    document.addEventListener('DOMContentLoaded', function() {
        // Function to add event listeners
        function addEventListeners() {
            // JavaScript code to add forms on button click
            const addFormButtons = document.querySelectorAll('#addq');

            addFormButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const contentBox = document.querySelector('.content-box');
                    fetch('queryform.php')
                        .then(response => response.text())
                        .then(data => {
                            contentBox.innerHTML = data;
                    
                            addEventListeners();
                        });
                });
            });
            const queryBoxespending = document.querySelectorAll('.query-box-pending');
            queryBoxespending.forEach(function(box) {
                box.addEventListener('click', function() {
                    const queryId = this.textContent; 
                    const contentBox = document.querySelector('.content-box');
                    
                    const formData = new FormData();
                    formData.append('query_id', queryId);

                    fetch('querypending.php', {
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

            // Add click event listener to query boxes
            const queryBoxes = document.querySelectorAll('.query-box');
            queryBoxes.forEach(function(box) {
                box.addEventListener('click', function() {
                    const queryId = this.textContent; 
                    const contentBox = document.querySelector('.content-box');
                    
                    const formData = new FormData();
                    formData.append('query_id', queryId);

                    fetch('querydetail.php', {
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

            const moreQueryForm = document.querySelector('#more-query-form');

            if (moreQueryForm) {
                moreQueryForm.addEventListener('submit', function(event) {
                    event.preventDefault();

                    const formData = new FormData(this);

                    fetch('querymore.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.text())
                    .then(data => {
                        const contentBox = document.querySelector('.content-box');
                        contentBox.innerHTML = data;
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                });
            }
        }
  
        // Call the function to add event listeners initially
        addEventListeners();
    });
</script>
