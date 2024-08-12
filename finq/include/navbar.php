<style>

* {
    margin: 0;
    padding: 0;
    font-family: "Poppins", sans-serif;
    box-sizing: border-box;
}

.header {
    position: sticky;
    top: 0;
    left: 0;
    width: 100%;
    padding: 20px 100px;
    background-color: #265073;
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 99;
}

.logo {
    display: flex;
    align-items: center;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
    border-radius: 30%;
   
}
    
.navbar a {
    font-size: 16px;
    color: #ffffff;
    text-decoration: none;
    font-weight: 520;
    margin-right: 40px;
    position: relative;
}
.navbar a::before {
    content: '';
    position: absolute;
    width: 0;
    background: black;
    height: 2px;
    left: 0;
    bottom: -2px;
    opacity: 0.85;
    transition: 0.4s;
    color: #ccf9ff;
}

.navbar a:hover::before {
   width: 100%;
}
.navbar .login{
    border: 2px solid #ccf9ff;
    border-radius: 6px;
   padding: 8px 16px;
}

.logo img{
max-height: 50px;
}
.intro-container{
    background-color: 	#FFF;
    border-radius: 30px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
    position: relative;
    overflow: hidden;
    width: 1100px;
    max-width: 100%;
    min-height: 480px;
    margin:150px auto 0;

}

.dropdown {
    position: relative;
    display: inline-block;
    margin-left: 5px;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}



.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .login {
    background-color:  #ccf9ff;
}



</style>


<body style="background-color:  white;">

    <header class="header">
        <a href="../index.php"  class="logo"><img src="../assets/logo6.png" alt="logo" id="logo" onerror="fallbackImage()"></a>
        <?php session_start();

         if(isset($_SESSION['username'])) {
            echo "<p style='color:white;'>Welcome\t".$_SESSION['username'].'</p>';
        }?>
        <nav class="navbar">
        <a href="../main/index.php">Home</a>
        <a href="../omnipotent/omnipotent.php">Omnipotent</a>
        <a href="../calculator/auten.php">Discover</a>
        <a href="../whyinvest/whyinvest.php">Why Invest</a>
        <a href="../aboutus/aboutus.php">About Us</a>
        <div class="dropdown">
            <button class="login" style="background-color:#265073;color:white;margin-right:15px;">Login</button>
            <div class="dropdown-content">
                <a href="../main/userlogin.php">User</a>
                <a href="../main/loginexpert.php">Expert</a>
            </div>
        </div>
        <a class="logout" href ="../include/logout.php">Logout</a>
        </nav>
    </header>
    <script>
    function fallbackImage() {
        document.getElementById('logo').src = './assets/logo6.png'; // replace 'fallback-image-url.jpg' with your fallback image URL
    }
</script>