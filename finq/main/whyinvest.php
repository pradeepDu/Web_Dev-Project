<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>why invest</title>
    <link rel="stylesheet" href="./wistyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>

</head>


<body>

<center><h3 style="color:red;margin:20px;">Welcome <?php session_start(); echo $_SESSION['uname']; ?></h3></center>
  

    <div id="head">
    Demystifying Investment: An In -depth Exploration</div>


    <div class="container">
   
    <div id="b1" class="cards">
        <div class="conthead">Why you should invest</div>

        <p></p>
        <div class="content">
            <div class="left">
                Investing secures financial stability, beats inflation, and grows wealth long-term. Diverse assets like stocks, bonds, and real estate offer passive income and capital appreciation. With strategic allocation and compounding returns, investing paves the way for achieving financial goals and ensuring a prosperous future. Start investing today for long-term financial security.

         </div> 
         <div class="right">
            
                <img src="assets/img2.jpeg" alt="image1" id="image1">
             
         </div>
    </div>
    
    
    </div>

   
    <div id="b2" class="cards">
       <div class="conthead">How to start investing</div>
       <div class="content">
       <div class="left">

        <img src="assets/img1.jpeg" alt="image1">
       
    </div> 
    <div class="right">
        <p>
            To start investing, set clear financial goals, educate yourself on basic investment principles, assess your risk tolerance, create a budget, consider employer-sponsored retirement plans, open an investment account, choose diversified investments, monitor and adjust your portfolio, stay informed about the market, and, if needed, seek professional advice. Patience and discipline are crucial for long-term success.
        </p>
    </div>
</div>
    </div>

    <div id="b3" class="cards">
        <div class="conthead">Let's take a look at what <span style="display:block;color: rgba(18, 50, 207, 0.862); font-size: 1.5em; font-weight: bold;">Financial experts</span> say</div>
        <video controls loop autoplay>
            <source src="vid.mp4" type="video/mp4">
            <track label="English" kind="subtitles" srclang="en" src="eng.vtt" default>
            <track label="Hindi" kind="subtitles" srclang="Hindi" src="hindi.vtt" default>
           
        </video>
        <audio controls>
            <source src="horse.ogg" type="audio/ogg">
            <source src="horse.mp3" type="audio/mpeg">
          Your browser does not support the audio element.
          </audio>
    
    </div>
   

    <div id="b4" class="cards">
        <div class="conthead">Visit Us!</div>
        <p>For In-Person Financial Advice Visit Our Office Today!

            <div id="map" style="width: 60vw; height: 50vh"></div>
        </p>
       
    </div>  
</div>

<script>
        // Creating map options
        var mapOptions = {
            center: [19.0171, 73.0175],
            zoom: 10
        }

        // Creating a map object
        var map = new L.map('map', mapOptions);

        // Creating a Layer object
        var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');

        // Adding layer to the map
        map.addLayer(layer);
        
        //var circle = L.circleMarker([19.0171, 73.0175], {
          //  radius: 90,
            //color: '#00ffff',
            //opacity: 0.75,
        //});

        var greenIcon = L.icon({
    iconUrl: 'logo.png',

    iconSize:     [95, 95], // size of the icon
    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
    });

        var latlngs = [
            [19.0171, 73.0175]
        ];
       // var route = L.polyline(latlngs, { color: 'red' });
        // Creating a marker
        var marker = L.marker([19.0171, 73.0175],{icon: greenIcon});

        // Adding marker to the map
        marker.addTo(map).bindPopup("Fincruise HQ");;
        marker2.addTo(map);
        //route.addTo(map);

</script>
</body>

</html>