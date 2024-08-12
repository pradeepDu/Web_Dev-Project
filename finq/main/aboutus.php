<?php
include "navbar.php" 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About us</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    
        body {
            font-family: 'Poppins', sans-serif;
            font-weight: 400;
            line-height: 1.6;
            background-color: #F0F3BD; 
        }
    
        .sec {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            padding: 2rem;
        }
    
        #content {
            display:flex;
            text-align:center;
            background-color: #fff;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
        }
    
        #but {
            background-color:  #2c88d5;
            height: 50px;
            border-radius: 25px;
            text-decoration: none;
            width: 250px;
            color: white;
            font-size: 1rem;
            font-weight: 700;
            text-transform: uppercase;
            text-align: center;
            line-height: 50px; 
            cursor: pointer;
            transition: background-color 0.3s ease; 
        }
    
        #but:hover {
            background-color: white; 
        }
    
        .Blue {
            color: rgb(42, 119, 161);
            font-weight: 700;
        }
    
        .head {
            font-size: 2rem;
            margin-bottom: 1rem;
            font-weight: 700;
        }
    
        @media (max-width: 600px) {
            .head {
                font-size: 1.5rem;
            }
        }
    
        @media (max-width: 400px) {
            .head {
                font-size: 1.2rem;
            }
        }
         .head {
            color: rgb(42, 119, 161);
            padding: 20px;
            transition: color 0.3s ease; 
            cursor: pointer; 
        }

        .head:hover {
            color: #2c88d5; 
        }

        /*.image-container {
        position: relative;
        overflow: hidden;
        height: 52vh;
        width: 52vw;
    }*/

    .image {
        width: 100%;
        height: 100%;
    }
        /*object-fit: cover;*/

       /*transition: transform 0.3s ease;

    .image-container::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.8)); 
        opacity: 0; 
        transition: opacity 0.3s ease;
    }

    .image-container:hover::before {
        opacity: 1; 
    }*/
    .footer {
            background-color: whitesmoke;
            color: black;
            padding: 20px 0;
            text-align: center;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        .footer a {
            color:black;
            text-decoration: none;
            font-weight: bold;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .team{
            display: flex;
            justify-content:center;
            text-align: center;
        }

        .m{
            height: 100%;
            width: 100%;
            background-color: aqua;
            margin: 0 10px;
            border: 5px;
            border-color: steelblue;
            }
      
    .container{
        padding-top:8vh;
        padding-bottom:5vh;
        color: white;
    }
    .heading{
        display:flex;
        margin:10vh 10vh;
        justify-content:center;
        font-size: 30px;
        color: #49949e;
    }
    .profiles{
        display: flex;
        justify-content: space-around;
        margin: 10vh;
    }
    .profile{
        flex-basis: 260px;
        margin-bottom:5vh;
    }
    .profile .profileimg{
        height:260px;
        width: 260px;
        border-radius: 50%;
        filter:grayscale(100%);
        cursor: pointer;
        transition: 400ms;
    }
    .profile:hover .profileimg{
        filter:grayscale(0);
    }
    .username{
        margin-top: 30px;
        font-size: 35px;
        color: #49949e;
    }
    .profile h5{
        font-size: 18px;
        font-weight: 100;
        letter-spacing: 3px;
        color: #49949e;
    }
    .profile p{
        font-size: 16px;
        margin-top: 20px;
        text-align: justify;
        color:black;
    }
a{text-decoration:1 none;}
        
    </style>
    
</head>
<body>
    <div class="sec">
    <div class="image-container">
    <img class="image" src="https://media.licdn.com/dms/image/C4D12AQH3moW8i3ewrw/article-cover_image-shrink_423_752/0/1628589993746?e=1712188800&v=beta&t=s70kDOxD9kYMXB_W2w53rL1_O_zyu_jIHV2ZSP-DJsw" alt="team"></center>
    
    </div>
   

    </div>
    <div class="sec">
    <div class="head"> <p>ABOUT US</p>
        <script>
              const aboutUsText = document.querySelector('.head p');

    aboutUsText.addEventListener('mouseover', () => {
    aboutUsText.style.transform = 'scale(1.1)'; 
    aboutUsText.style.color = '#2c88d5'; 
    });

    aboutUsText.addEventListener('mouseout', () => {
    aboutUsText.style.transform = 'scale(1)'; 
    aboutUsText.style.color = 'rgb(42, 119, 161)'; 
    });
        </script>
    </div>    
  
   <div id="content">
    <p>Welcome to Fincruise! We're your trusted source for clear, actionable financial advice. Our team of experts is dedicated to helping you navigate the world of finance with confidence and clarity. Whether you're saving for the future, investing wisely, or planning for retirement, we're here to support you every step of the way.   
    Whether you're just starting your financial journey or looking to optimize your existing strategies, Fincrusive is here to help. Through our articles, guides, and personalized consultations, we empower you to take control of your finances and achieve long-term prosperity.
        Whether you're striving to build wealth, minimize debt, or secure your financial future, Fincruise is committed to helping you succeed. With our dedication to transparency, integrity, and client-centric service, you can trust us to be your partner in achieving financial success.
        Join the Fincruise community today and embark on a journey towards financial empowerment and prosperity. Let us be your compass as you navigate the complexities of the financial landscape, guiding you towards a brighter and more secure future.

    </p>
    </div>
</div>

&nbsp;

<div class="container">
        <h1 class="heading">MEET OUR TEAM </h1>
        <div class="profiles">
            <div class="profile">
                <img src="./sujal.jpg" class="profileimg">
                <h3 class="username">Sujal</h3>
                <p>Sujal Ambatkar</p>
            </div>
            <div class="profile">
                <img src="./rucha.jpg" class="profileimg">
                <h3 class="username">Rucha</h3>
                <p>Rucha Gavade</p>
            </div>
            <div class="profile">
                <img src="./pradeep.jpg" class="profileimg">
                <h3 class="username">Pradeep</h3>
                <p>H. Pradeep</p>
            </div>
            <div class="profile">
                <img src="./atharva.jpg" class="profileimg">
                <h3 class="username">Atharva</h3>
                <p>Atharva Kalokhe</p>
            </div>
    </div>
</div>    

<footer class="footer">
    <p>&copy; 2024 Fincruise. All rights reserved.</p>
    <p>Designed by <a href="#">Rucha Gavade</a></p>
</footer>
</html>
