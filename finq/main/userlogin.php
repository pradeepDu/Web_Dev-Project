<!DOCTYPE html>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../css/login.css">
    <title>Login into your account</title>

</head>

<body class="back">

    <div class="container" id="container">
        <div class="form-container sign-up">

            <form action="login.php" method="post" >
                <h1>Create Account</h1>
             
                <span>or use your email for registeration</span>
                <input type="text" placeholder="UserName" name="user_name">
                <input type="userfullname" placeholder="Full Name" name ="userfullname">
                <input type="email" placeholder="Email" name="email">
                <input type="password" placeholder="Password" name = "password">
                <input type="password" placeholder="Confirm-Password" name ="confirmpass">

      
                <button name="signup">Sign Up</button>
                <script src ="validate.js"></script>

            </form>
        </div>
        <div class="form-container sign-in">
            <form action="login.php" method="post" >
                <h1>Sign In</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your username password</span>
                <input type="text" placeholder="User-Name" name="signin_user_name">
                <input type="password" placeholder="Password" name="signin_password">
                <a href="#">Forget Your Password?</a>
                <button name="signin">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>COntinue from where you left.</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello lil bro</h1>
                    <p>Register with your personal info to start your journey with a bang!!!.</p>
                    <button class="hidden" id="register">Sign Up</button>
                    
                </div>
                <canvas id="myCanvas"></canvas>

                <script>
                    var canvas = document.getElementById('myCanvas');
                    var ctx = canvas.getContext('2d');
                
                    // Set canvas size to window size
                    canvas.width = window.innerWidth;
                    canvas.height = window.innerHeight;
                
                    function getRandomBlueColor() {
                        // Generate random blue color with a gradient of white
                        var blue = Math.floor(Math.random() * 156) + 100; // Random blue value between 100 and 255
                        var white = Math.floor(Math.random() * 100) + 156; // Random white value between 156 and 255
                        return 'rgb(' + white + ', ' + white + ', ' + blue + ')'; // Use RGB format with varying blue and white
                    }
                
                    // Circle class
                    class Circle {
                        constructor(x, y, dx, dy, radius, color) {
                            this.x = x;
                            this.y = y;
                            this.dx = dx;
                            this.dy = dy;
                            this.radius = radius;
                            this.color = color;
                        }
                
                        draw() {
                            ctx.beginPath();
                            ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
                            var gradient = ctx.createRadialGradient(this.x, this.y, 0, this.x, this.y, this.radius);
                            gradient.addColorStop(0, this.color);
                            gradient.addColorStop(1, 'white');
                            ctx.fillStyle = gradient;
                            ctx.fill();
                            ctx.closePath();
                        }
                    }
                
                    // Create circles with random radius and blue color
                    var circles = [];
                    for (var i = 0; i < 50; i++) {
                        var x = Math.random() * canvas.width;
                        var y = Math.random() * canvas.height;
                        var dx = (Math.random() - 0.5) * 4;
                        var dy = (Math.random() - 0.5) * 4;
                        var radius = Math.random() * 20 + 10; // Variable radius
                        var color = getRandomBlueColor(); // Blue color
                        var circle = new Circle(x, y, dx, dy, radius, color);
                        circles.push(circle);
                    }
                
                    // Animation loop
                    function animate() {
                        requestAnimationFrame(animate);
                        ctx.clearRect(0, 0, canvas.width, canvas.height);
                
                        circles.forEach(circle => {
                            circle.draw();
                            circle.x += circle.dx;
                            circle.y += circle.dy;
                            if (circle.x + circle.radius < 0 || circle.x - circle.radius > canvas.width ||
                                circle.y + circle.radius < 0 || circle.y - circle.radius > canvas.height) {
                                // Reset position if circle goes off screen
                                circle.x = Math.random() * canvas.width;
                                circle.y = Math.random() * canvas.height;
                            }
                        });
                    }
                
                    animate();
                  
                </script>
                
                
            </div>
        </div>
    </div>

    <script src="../scripts/script.js"></script>
    <script src="../scripts/validate.js"></script>
</body>

</html>