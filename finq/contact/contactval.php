<!DOCTYPE html>
<html lang="en">
    <?php include "navbar.php"?>
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
            margin-top:30vh;
            background-color: aliceblue;
            display: flex; 
            justify-content: flex-start;
            flex-direction: row;
            border-radius: 20px;
        
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
        #card button {
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
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            width:15vh;
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
            height:10vh;

        }

    
    </style>


<script>
function formValidation() {
    var uname = document.getElementById("uname");
    var email = document.getElementsByName("email")[0];
    var age = document.getElementById("age");
    var phone = document.getElementsByName("phone")[0];
    var query = document.getElementsByName("query")[0];

    var errorContainer = document.getElementById("errorContainer");
    errorContainer.innerHTML = ""; // Clear previous errors

    var errors = [];

    // Reset border colors
    uname.style.border = '1px solid #ccc';
    email.style.border = '1px solid #ccc';
    age.style.border = '1px solid #ccc';
    phone.style.border = '1px solid #ccc';
    query.style.border = '1px solid #ccc';

    // Username validation
    if (!/^[a-zA-Z\s]{1,40}$/.test(uname.value)) {
        errors.push("Username must have alphabet characters only and be maximum 40 characters long.");
        uname.style.border = '1px solid red'; // Set border color to red
        uname.focus(); // Focus on the input field with the error
    }

    // Email validation
    if (!email.value || !/\S+@\S+\.\S+/.test(email.value)) {
        errors.push("Invalid email address.");
        email.style.border = '1px solid red'; // Set border color to red
        email.focus(); // Focus on the input field with the error
    }

    // Age validation
    if (age.value <= 11) {
        errors.push("Age must be greater than 11.");
        age.style.border = '1px solid red'; // Set border color to red
        age.focus(); // Focus on the input field with the error
    }

    // Phone validation
    if (!phone.value || phone.value.length > 15) {
        errors.push("Phone should not be empty and should not exceed 15 characters.");
        phone.style.border = '1px solid red'; // Set border color to red
        phone.focus(); // Focus on the input field with the error
    }

    // Query validation (assuming only letters, numbers, spaces, periods, and question marks are allowed)
    if (!/^[\w\s.?]+$/.test(query.value)) {
        errors.push("Query must contain only letters, numbers, spaces, periods, and question marks.");
        query.style.border = '1px solid red'; // Set border color to red
        query.focus(); // Focus on the input field with the error
    }

    // Display only the first error
    if (errors.length > 0) {
        var errorDiv = document.createElement("div");
        errorDiv.className = "error";
        errorDiv.textContent = errors[0];
        errorContainer.appendChild(errorDiv);
        return false; // Prevent form submission
    }

    // Reset border colors after successful validation
    uname.style.border = '1px solid #ccc';
    email.style.border = '1px solid #ccc';
    age.style.border = '1px solid #ccc';
    phone.style.border = '1px solid #ccc';
    query.style.border = '1px solid #ccc';

    return true; // Allow form submission
}</script>
</head>
<body>
    <div id="base">
        <div id="main">
            <div id=left>
            <h1 id="contactushead"><i class="fa-solid fa-envelope"></i>    Contact us </h1>
            <form name="form" method="post" action="./contact.php" onSubmit="return formValidation();">
                <div id="card">
                    <!-- Name -->
                    <i class="fas fa-user"> </i> Name
                    <input type="text" id="uname" name="uname" placeholder="Name">
                    <br>
                    <!-- Email -->
                    <i class="fas fa-envelope">  </i> Email
                    <input type="text" name="email" placeholder="Email">
                    <br>
                    <!-- Age -->
                    <i class="fas fa-birthday-cake"> </i> Email
                    <input type="number" name="age" id="age" placeholder="Age">
                    <br>
                    <!-- Phone -->
                    <i class="fas fa-phone"></i> Email
                    <input type="tel" name="phone" placeholder="Phone">
                    <br>
                    <!-- Query -->
                    <i class="fas fa-question-circle"></i> Query
                    <input type="textarea" cols="40" rows="5" name="query" placeholder="Query" id="query">
                    <br>
                    <button type="submit">Submit</button>
                    <div id="errorContainer" class="errorContainer"></div>
                </div>
                </div>

                <div id="right">

                </div>
            </form>
        </div>
    </div>
</body>
<script type="text/javascript" src="https://raw.githubusercontent.com/micku7zu/vanilla-tilt.js/master/dist/vanilla-tilt.js"></script>
<script type="text/javascript">
	VanillaTilt.init(document.querySelector("#main"), {
		max: 25,
		speed: 400
	});
	
	//It also supports NodeList
	VanillaTilt.init(document.querySelectorAll("#main"));
</script>
</html>
