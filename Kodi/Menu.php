<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "bakery";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM menu_table ORDER BY id DESC");

$menuData = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $menuData[] = $row;
    }
} else {
    echo "No data available in menu_table.";
}

$conn->close();
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
          <img src="img/sweet.jpg" alt="Snow" style="width:100%; height: 400px;">
          <div class="centered">   <p style="font-family:Castellar;
              font-size:40px;padding-left: 500px;padding-top: 90px;color:lightcoral">Menu </p></div>
        </div>
  <div >
    <div class="saying" style="padding-right: 100px;">
      <p style="font-family: Brush Script MT, Brush Script Std, cursive;
      font-size:40px;color: black;">Miresevini ne faqen tone</p></div>
     
</div>
</div>
<div class="slideshow-container" >

  <div class="mySlides fade">
    <div class="numbertext">1 / 3</div>
    <img src="img/oferta11.png" style="width:100%; height: 400px;">
  </div>
  
  <div class="mySlides fade">
    <div class="numbertext">2 / 3</div>
    <img src="img/oferta21.png" style="width:100%; height: 400px;">
  </div>
  
  <div class="mySlides fade">
    <div class="numbertext">3 / 3</div>
    <img src="img/oferta31.png" style="width:100%; height: 400px;">
  </div>
  
  </div>
  <br>
  
  <div class="dots">
    <span class="dot"></span> 
    <span class="dot"></span> 
    <span class="dot" ></span> 
  </div>
</div>

<script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 4000); 
}
</script>

<main class="clearfix">

<div class="Fotot">
            <?php foreach ($menuData as $menuItem) : ?>
                <div class="Boxi">
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($menuItem['img']); ?>" alt="" class="img">
                    <div class="views_date">
                        <p>
                            <?php echo $menuItem['title']; ?><br>
                            <?php echo $menuItem['data_created']; ?><br>
                            <?php echo $menuItem['price']; ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
</main>
</div>
</body>
            
    </div>
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
      promovojm Biznesin tone .
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
</html>