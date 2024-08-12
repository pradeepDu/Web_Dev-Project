<!DOCTYPE html>
<?php include("../include/navbar.php");?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Plans</title>
    <style>
       /* CSS styles */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: Arial, sans-serif;
}

body {
  position: relative; /* Set position relative */
  height: 100vh;
  background-color: #f4f4f4;
}

.subback {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: -1; /* Ensure background image is behind content */
}

.subscription-container {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  display: flex;
  justify-content: space-between;
  padding: 20px;
  max-height: 1000px;
  max-width: 1000px;
  width: 100%;
  z-index: 1; /* Ensure subscription cards are above background image */
}
.feature-marker {
  margin-right: 5px; /* Add space between marker and feature text */
  color: #007bff; /* Color for tick (blue) */
}

.feature-marker.fail {
  color: red; /* Color for cross (red) */
}
.plan {
  flex: 1;
  padding: 20px;
  background-color: rgba(255, 255, 255, 0.2); /* Slightly transparent white background */
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease;
  cursor: pointer;
  margin: 30px;
  overflow: hidden; /* Hide overflow content */
  transform-style: preserve-3d; /* Preserve 3D transformations */
  position: relative;
}

.plan:hover {
  transform: translateY(-5px);
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
}

.plan.selected {
  flex: 1.2;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
  background: linear-gradient( #A6E3E9, #b3f6ff);
  z-index: 2; 
}

.plan:not(.selected) {
  background-color: rgba(0, 0, 0, 0.2); /* Slightly transparent black background for unselected cards */
}

.plan-title {
  font-size: 24px;
  margin-bottom: 10px;
  color: black; /* Darker text color */
}

.tag {
  font-size: 16px;
  color: #333;
  margin-bottom: 5px;
}

.plan-price {
  font-size: 20px;
  font-weight: bold;
  margin-bottom: 10px;
  color: #333;/* Primary color */
}

.plan-features {
  list-style: none;
  padding: 0;
  margin: 0;
}

.plan-features li {
  margin-bottom: 5px;
  color: #333; /* Slightly darker text color */
}

.plan-button {
  padding: 10px 20px;
  background:transparent;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.plan-button:hover {
  background-color: #0056b3;
}

    </style>
</head>
<body>

<a href="#" class="subback"><img src="subback2.jpg" style="height:95vh;width:100vw;"></a>

<div class="subscription-container">
  <div class="plan">
    <h2 class="plan-title">Basic Plan</h2>
    <div class="tag">Basic</div>
    <p class="plan-price">$10/month</p>
    <ul class="plan-features">
      <li><span class="feature-marker">&#10003;</span> Feature 1</li>
            <li><span class="feature-marker">&#10003;</span> Feature 2</li>
            <li><span class="feature-marker fail">&#10007;</span> Feature 3</li>
            <li><span class="feature-marker">&#10003;</span> Feature 4</li>
            <li><span class="feature-marker fail">&#10007;</span> Feature 5</li>
     
    </ul>
    <button class="plan-button">Subscribe</button>
</div>

<!-- Expert Plan -->
<div class="plan">
    <h2 class="plan-title">Expert Plan</h2>
    <div class="tag">Expert</div>
    <p class="plan-price">$20/month</p>
    <ul class="plan-features">
      <li><span class="feature-marker">&#10003;</span> Feature 1</li>
            <li><span class="feature-marker">&#10003;</span> Feature 2</li>
            <li><span class="feature-marker fail">&#10007;</span> Feature 3</li>
            <li><span class="feature-marker">&#10003;</span> Feature 4</li>
            <li><span class="feature-marker fail">&#10007;</span> Feature 5</li>
    </ul>
    <button class="plan-button">Subscribe</button>
</div>

<!-- Enterprise Plan -->
<div class="plan">
    <h2 class="plan-title">Enterprise Plan</h2>
    <div class="tag">Enterprise</div>
    <p class="plan-price">$30/month</p>
    <ul class="plan-features">
      <li><span class="feature-marker">&#10003;</span> Feature 1</li>
      <li><span class="feature-marker">&#10003;</span> Feature 2</li>
      <li><span class="feature-marker fail">&#10007;</span> Feature 3</li>
      <li><span class="feature-marker">&#10003;</span> Feature 4</li>
      <li><span class="feature-marker fail">&#10007;</span> Feature 5</li>
    </ul>
    <button class="plan-button">Subscribe</button>
</div>
</div>
    


<!-- JavaScript -->
<script>
    document.querySelectorAll('.plan').forEach(item => {
        item.addEventListener('click', event => {
            document.querySelectorAll('.plan').forEach(item => {
                item.classList.remove('selected');
            });
            item.classList.add('selected');
        });
    });
</script>

</body>
</html>