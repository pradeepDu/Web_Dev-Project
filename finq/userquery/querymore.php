<?php include "../include/dbconnect.php" ?>


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



        #card {
            width: 70vh;
            max-width: 200px;
            /* Limit card width */
        }

        #card input,
        #card button,
        #card textarea {
            margin-bottom: 10px;
            width: 20vw;

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
            height: 5vh;
            border-radius: 10px;
            cursor: pointer;
            width: 15vw;
            margin: 10px;
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
            flex-direction: column;
            

        }

        #card input[type="text"],
        #card input[type="number"],
        #card input[type="tel"] {
            padding-left: 30px;
            /* Adjust as needed */
        }

        /* Style the icons */
        #card .fa {
            position: absolute;
            margin-top: 10px;
            /* Adjust as needed */
            margin-left: 10px;
            /* Adjust as needed */
            color: #999;
            /* Adjust icon color */
        }

        #errorContainer {
            width: 20vw;

        }

        #contactushead {
     
            margin:3vh;
            display: flex;
         justify-content: center;
          
        }

        #query {
            border-radius: 20px;
        }

        #submit {
            color: white;
            background-color: darkblue;
            border: none;
            height: 5vh;
            border-radius: 10px;
            cursor: pointer;
            width: 20vw;
            margin: 10px;
            padding:3vh;


        }
        #morebutton{
            color:white;
    background-color: 265073;
    border: none;
    height:5vh;
    border-radius: 10px;
    cursor: pointer;
    width:20vw;
    margin:10px;
    padding:3vh;
}

#advisername{
    width:15vw;
}


    </style>


</head>

<body>
    <div id="base">
        <div id="main">
<h1 id="contactushead"> Take an Expert Advice <i class="fa-solid fa-headset"></i></h1>
  

<form name="form" method="post" action="querysubmit.php">
                <?php $t= $_POST['type']; ?>
                <?php $pq=$_POST['previous_query_id']; ?>


                <label for="advisername"><b>Select a financial advicer:</b></label>
                <select id="advisername" name="advisername">


                    <?php

                    $sql = "SELECT expert_id, expertfullname FROM experts";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row['expert_id'] . "'>" . $row['expertfullname'] . "</option>";
                        }
                    }
                    ?>
                </select>

                <br>

                <i class="fas fa-question-circle"></i><b> Query </b>
                <textarea cols="100" rows="10" name="query" placeholder="Query" id="query"></textarea>
                <br>
                <input type="hidden" name="previous_query_id" value="<?php echo $_POST['previous_query_id']; ?>">
                <input type="hidden" name="financialAdvice" value="<?php echo $_POST['type']; ?>">
                <input type="submit" id="submit">
                <div id="errorContainer" class="errorContainer"></div>
        </div></div>
    </div>

    
    </form>
    </div>
    </div>
</body>

</html>