<?php

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "bakery";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit_contact"])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);

        $sql = "INSERT INTO contact (name, email, phone, gender, message) VALUES ('$name', '$email', '$phone', '$gender', '$message')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

function getContactFormMessages($conn) {
    $messages = [];
    $result = $conn->query("SELECT * FROM contact ORDER BY ID DESC");

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $messages[] = $row;
        }
    } else {
        echo "Error fetching contact form messages: " . $conn->error;
    }

    return $messages;
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

<script src="Bakery.jsx"></script>
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
          font-size:40px;padding-bottom: 100px;color:lightcoral">Contact Us </p></div>
    </div>
  <!---------------ContactUS-------------------------------------------------->
  
   <!--<form onsubmit="sendEmail(); reset(); return false;" >-->
    <div class="ContactUs-Korniza">
      <form name="contact-form" action="ContactUs.php" method="post" onsubmit="return validation();">
          <h3>Contact Us</h3>
          <input type="text" id="name" name="name" placeholder="Your Name" required>
          <input type="email" id="email" name="email" placeholder="Email id" required>
          <input type="text" id="phone" name="phone" placeholder="Phone number" required>
          <select id="gender" name="gender">
              <option value="male">Male</option>
              <option value="female">Female</option>
          </select>
          <textarea id="message" name="message" rows="4" placeholder="How can we help you"></textarea>
    <button type="submit">Send</button>
      </form>
  
      <script>
          function validation() {
              var name = document.getElementById('name').value;
              var phone = document.getElementById('phone').value;
              var email = document.getElementById('email').value;
              var gender = document.getElementById('gender').value;
              var message = document.getElementById('message').value;
  
              if (name === '' || phone === '' || email === '') {
                  alert("Fill out required fields!");
                  return false;
              } else if (isNaN(phone) || phone.length < 9 || !(/^\d+$/.test(phone))) {
                  alert("Phone number must contain numbers and be at least 4 characters!");
                  return false;
              } else {
                  return true;
              }
          }
      </script>
  </div>
  


<!--- Permes  webfaqes SMTPJS-ku dergohen en emailin tim , kush do qe kontakton ne webfaqe .
     <script src="https://smtpjs.com/v3/smtp.js"></script>
     <script>
       function sendEmail()
       {
        Email.send
        ({
         Host : "smtp.gmail.com",
         Username : "noora-o@live.com",
         Password : "password",
         To : 'do39566@ubt-uni.net',
         From : document.getElementById("email").value,
         Subject : "New contact form ",
         Body : 
         "Name:"+document.getElementById("name").value
         +"<br> Email: "+document.getElementById("email").value
         +"<br> Phone no: "+document.getElementById("phone").value
         +"<br> Message: "+document.getElementById("message").value
         })
         .then(
  message => alert("Message sent Succesfully")
);
       }
     </script>
    -->

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
  </div>
</html>