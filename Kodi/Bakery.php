<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// I merre  te dhenat  nga Data baza , 
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
          <li><a href="AboutUs.php">AboutUs</a></li>
          <li><a href="Bakery.html">Home</a></li>
        </ul>
      </div>
    </div>
  </div>
  <body>
  <div id="content-container">
    <div class="sweet-container">
      <img src="img/photoss1.jpg" alt="Snow" style="width:100%; height: 400px;">
      <div class="centered">   <p style="font-family:chiller;
          font-size:90px;color: black;">SWEET BAKERY </p></div>
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
    
    <main >
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
<section>
  <form action="data.php" method="post" enctype="multipart/form-data">

    <label for="title">Title:</label>
    <input type="text" name="title" required>

    <label for="content">Content:</label>
    <textarea name="content" required></textarea>

    <label for="image">Image:</label>
    <input type="file" name="image">

    <label for="pdf">PDF File:</label>
    <input type="file" name="pdf" accept=".pdf">

    <input type="submit" value="Submit">
</form>

<div class=Order>
<form action="order_data.php" method="post" enctype="multipart/form-data">
<p>POROSIT TORTETN TENDE:</p>
  <p>First Name:</p>
    <input type="text" name="firstname" placeholder="firstname">
  <p>Last Name:</p>
  <input type="text" name="lastname" placeholder="lastname">
  <p>Email:</p>
  <input type="email" name="email" placeholder="example@gmail.com">
  <p>Phone:</p>
  <input type="tel" name="phone" placeholder="###-###-####">
  <p>Prefered contact method:</p>
  <select class="option" name="contact">
  <option value="contact">Contect me</option>
            <option value="contact">call</option>
            <option value="contact">text me</option>
            <option value="contact">Email me</option>
        </select>
<p>When do you need your cake?</p>
<input type="date" id="orderDate" name="orderDate">
  <p>Madhesia?</p>
        <select class="option" name="size">
            <option value="e_vogel">e vogel (2-3 persona)</option>
            <option value="e_mesme">e mesme (4-8 persona)</option>
            <option value="e_madhe">e madhe (8-12 persona)</option>
        </select>
  <p>Which cake flavor(s) would you like?</p>
  <select class="option" name="cake_flavor">
            <option value="vanilla">vanilla</option>
            <option value="chocolate">chocolate</option>
            <option value="earlgrey">earlgrey</option>
            <option value="Caramel">Caramel</option>
            <option value="Lemon">Lemon</option>
            <option value="Spice">Spice</option>
            <option value="Carro">Carrot</option>
            <option value="Chocolate Stout">Chocolate Stout</option>
        </select>

        <p>Which buttercream flavors sound tasty?</p>
        <select class="option" name="buttercreamFlavor">
            <option value="vanilla">vanilla</option>
            <option value="Dark Chocolate">Dark Chocolate</option>
            <option value="Cream Cheese">Cream Cheese</option>
            <option value="Mascarpone">Mascarpone</option>
            <option value="Mocha">>Mocha</option>
            <option value="Berry">Berry</option>
            <option value="Lemon">Lemon</option>
            <option value="Coffee">Coffee</option>
        </select>

        
  <p>Would you like a ganache drip?</p>
  <select class="option" name="ganache_drip">
            <option value="Chocolate">Chocolate</option>
            <option value="White Chocolate">White Chocolate</option>
            <option value="Salted Caramel">Salted Caramel</option>
        </select>
 
  
  <p>Shall we fancy it up?</p>
  
  <select class="option" name="fancy">
            <option value="fancy">Yes, please!</option>
            <option value="fancy">No, thanks! Keep it basic. </option>
        </select>

  <p>Any other information we may need?</p>
   <div class="option">
    <textarea rows="10" cols="100" class="FormMessage" type="text" name="message" placeholder="As a matter of fact...">
     </textarea>
  </div>
  <button type="submit">Send</button>
 </form>
</div>
</section>

<style>

section
{
  background-color: #ffdbdb;
}
form {
  max-width: 400px;
  margin: 0 auto;
  padding: 20px;
  background-color: #ffdbdb;
  border: 1px solid #ddd;
  border-radius: 15px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  margin-bottom: 20px;
}


form[action="data.php"] {
  float: left;
  margin-right: 20px;
}
.Order form {
  float: right;
}

form p {
  margin-bottom: 10px;
}

form input[type="text"],
form input[type="email"],
form input[type="tel"],
form textarea,
form select,
.Order form input[type="text"],
.Order form input[type="email"],
.Order form input[type="tel"],
.Order form textarea,
.Order form select {
  width: 100%;
  padding: 10px;
  margin-bottom: 15px;
  box-sizing: border-box;
  background-color: white;
  border: 1px solid #ddd;
  border-radius: 20px;
}

form select,
.Order form select {
  padding: 10px;
}

form input[type="submit"],
.Order form input[type="submit"] {
  background-color: pink;
  color: #fff;
  padding: 12px 15px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-weight: bold;
}

form input[type="submit"]:hover,
.Order form input[type="submit"]:hover {
  background-color: #ff8c94;
}

.formMessage textarea {
  width: 100%;
  padding: 10px;
  margin-bottom: 15px;
  box-sizing: border-box;
  background-color: white;
  border: 1px solid #ddd;
  border-radius: 5px;
}

/* Clear the float after the forms */
section:after {
  content: "";
  display: table;
  clear: both;
}

</style>
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
