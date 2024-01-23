<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "bakery";

// Connect to the database
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission for updating data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $content = $_POST["content"];

    $stmt = $conn->prepare("UPDATE about_us SET title = ?, content = ? WHERE id = 1");
    $stmt->bind_param("ss", $title, $content);

    if ($stmt->execute()) {
        echo "Data updated successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Retrieve data from the database
$aboutUsData = getAboutUsData();

// Close the database connection
/*$conn->close();*/

// Function to retrieve data from the about_us table
function getAboutUsData() {
    global $conn;
    $result = $conn->query("SELECT * FROM about_us WHERE id = 1");

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return false;
    }
}
function getWhatWeDoContent() {
    global $conn;
    
    if ($conn->connect_error) {
        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    }

    $result = $conn->query("SELECT content FROM about_us WHERE id = 2");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['content'];
    } else {
        return false;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Bakery</title>
  <link rel="stylesheet" href="Bakery.css">
  <link href="https://fonts.googleapis.com/css?family=Adamina" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css"
      rel="stylesheet">
</head>

<script src="Bakery.jsx"></script>
    <!-- Include Header -->
    <div id="header-container">
      <div id="Divi1" class="clearfix">
        <div id="logo"><img src="img/logo.png" alt="" class="img" style="height: 80.3px;
          width: 131.41px;;"></div>
        <div id="navigation">
          <ul>
            <li ><a href="LoginForm.html" style="padding-top: 8px;  background-color: initial;"><button class="P2" type="button">Sign Out</button></a></li>
            <li><a href="Menu.html">Menu</a></li>
            <li><a href="ContactUs.html">ContactUs</a></li>
            <li><a href="AboutUs.html">AboutUs</a></li>
            <li><a href="Bakery.html">Home</a></li>
          </ul>
        </div>
      </div>
    </div>
 
<body>


 
  <div class="sweet-container">
    <img src="img/macar2.webp" alt="Snow" style="width:100%; height: 400px;">
    <div class="centered">   <p style="font-family:Castellar;
        font-size:40px;padding-bottom: 100px;color:lightcoral">About us </p></div>
  </div>

  <div class="About">
        <div class="Texti">
            <div class="Aboutus">
                <h1 class="T1"><?php echo $aboutUsData['title']; ?></h1>
                <p><?php echo $aboutUsData['content']; ?></p>
</div>

    <div class="what-we-do">
    <h2 class="T2">What do we do?</h2>
    <p><?php echo getWhatWeDoContent(); ?></p>
    </div>


      <!--<h2 class="T2">What do we do?</h2>
      <p>We cook traditional and modern cakes, as well as cookies, and different puddings. We offer sweet and non-sweet food items, and we also accept new ideas from our customers.We offer a variety of hot beverages including Downeast Coffee, Tea, Espresso and Cappuccino as well as a variety of Cold Beverages including ice coffee.
        Breakfast and Lunch Sandwiches are served all day long. (all lunch sandwiches are served on Homemade Sunnyfield Brickoven Bakery Bread)
        We have a variety of pastry and desserts on hand every day.
        We specialize in custom cakes! If you’re looking for a cake, contact us to order ahead. Most cake orders should be placed at least 2 weeks in advance. Please NEVER hesitate to call with a last minute cake request, we just may be able to squeeze you in!</p>
    </div>-->
  </div>
  
      

<div class="slider-korniza">

  <div class="Slajder fade">
    <div class="numbertext"></div>
    <img src="img/p1.jpg" style="width:50%">
    <div class="text">Will has worked at a number of well regarded restaurants across Kent including,<br> The Dog at Wingham, Pork & Co and The Corner House. <br>It was when he joined Cafe Du Soliel as the pizza chef, that he discovered a love for dough. In the years since, particularly during lockdown, he began perfecting his bread-making techniques.</div>
    
  </div>
  
  
  <div class="Slajder  fade">
    <div class="numbertext"></div>
    <img src="img/P2.jpg" style="width:50%">
    <div class="text">Allison is the Retail Operations Manager at Duchess Bake Shop and is the glue that binds us all together. She joined the Duchess team in 2017 as a front of house server at our 124th Street location. Allison is dedicated to every one of her team members and works with our front of house teams to keep our cafes running smoothly.</div>
  </div>
  
  <div class="Slajder  fade">
    <div class="S1">
    <img src="img/P3.jpg" style="width:50% ">
    <div class="text">Lex learned the craft in his father's bakery in homeland Korea.  Later on, he trained and worked at international bakery in Korea  gaining experience in bread making, cake decorating, and pastry production.
   </div>
  </div>
  </div>

  <div class="Slajder  fade">
    <div class="S2">
    <img src="img/P4.jpg" style="width:50%">
    <div class="text">Jon started his career in finance in London working
      as an asset manager. However, in his mid 20s,
       his passion for adventure took him to live and 
       work in San Sebastian</div>
      </div>
  </div>

  <div class="Slajder  fade">
    <div class="numbertext"></div>
    <img src="img/P5.jpg" style="width:50%">
    <div class="text">Josh is the newest member of the team, joining in October 23. During lockdown, Josh discovered his passion for making sourdough at home, which he’d always wanted to take more seriously. In 2022, he stopped his work in the media advertising industry to start a baker role at Docker in Folkestone</div>
  </div>

  <div class="Slajder fade">
    <div class="numbertext"></div>
    <img src="img/P6.jpg" style="width:50%">
    <div class="text">Ben has always had a passion for sourdough, which started in his home kitchen. He decided to follow that love for bread and began work at Wild Bread, where he gained most of his sourdough-making experience, before moving briefly to Grain and Hearth and then onto the Gilda team in February 2023. </div>
  </div>
  
  <a class="prev" onclick="plusSlides(-1)">❮</a>
  <a class="next" onclick="plusSlides(1)">❯</a>
  
  </div>
  <br>
  
  <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span> 
    <span class="dot" onclick="currentSlide(2)"></span> 
    <span class="dot" onclick="currentSlide(3)"></span> 
    <span class="dot" onclick="currentSlide(4)"></span> 
    <span class="dot" onclick="currentSlide(5)"></span> 
    <span class="dot" onclick="currentSlide(6)"></span>
  </div>
</div>
  <script>
  let slideIndex = 1;
  showSlides(slideIndex);
  
  function plusSlides(n) {
    showSlides(slideIndex += n);
  }
  
  function currentSlide(n) {
    showSlides(slideIndex = n);
  }
  
  function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("Slajder ");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}    
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
  }
  </script>
  </div>
</body>
<!------FOOTERI------------------------------------------------------------>
<footer class="footer">
  <div class="footer-Majtas">
    <h3>N-<span>BAKERY</span></h3>

    <p class="footer-navigimi">
      <a href="Bakery.html">Home</a>
      |
      <a href="AboutUs.html">About Us</a>
      |
      <a href="ContactUs.html">Contact Us</a>
      |
      <a href="Recetat.html">Menu</a>
    </p>

    <p class="footer-Emri">© 2020 Engineering Project.</p>
    </p>
    <p class="Open">Open Hours
      <br>Monday-Friday:
      <br> 08:00 AM-08:00 PM
      <br> Saturday-Sunday
      <br> 02:00 AM- 08:00 PM

  </div>

  <div class="footer-Mesi">
    <div>
      <i class="fa fa-map-marker"></i>
      <p><span>82 - Rr:Luan Haradinaj <a href="https://www.google.com/maps/place/Luan+Haradinaj,+Prishtina"></span> Prishtin, - 1000</p></a>
    </div>

    <div>
      <i class="fa fa-phone"></i>
      <p>+383 045/643-412</p>
    </div>
    <div>
      <i class="fa fa-envelope"></i>
      <p>
        <a href="mailto:support@eduonix.com">do39566@ubt-uni.net,<br />
          yllnora.G@ubt-uni.net
        </a>
      </p>
    </div>
  </div>
  <div class="footer-Djathtas">
    <p class="footer-About">
      <span>About Company</span>
      Ne jemi nje kompani e krijuar ne vitin 2023 , qellimi yne eshte te
      promovojm Biznesin tone , sa me ëmbel.
    </p>
    <div class="footer-links">
      <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
      <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
      <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
      <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
      <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
    </div>
  </div>
</footer>
  </div>
</html>
