<?php

$conn = mysqli_connect('localhost', 'root', '', 'bakery');

if ($conn->connect_error) {
    die("Connection to the database failed: " . $conn->connect_error);
}

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"])) {
    $email = $_POST['signupEmail'];
    $password = $_POST['signupPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    // Basic validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address";
        exit();
    }

    if (strlen($password) < 8) {
        echo "Password must be at least 8 characters long";
        exit();
    }

    if ($password !== $confirmPassword) {
        echo "Passwords do not match";
        exit();
    }

    // Hash the password before storing
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Assign a default role (modify as needed)
    $role = 'user';

    $stmt = $conn->prepare("INSERT INTO user (email, password, role) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $email, $hashedPassword, $role);

    if ($stmt->execute()) {
        // Redirect to login page after successful registration
        header("Location: login.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $email = $_POST['loginEmail'];
    $password = $_POST['loginPassword'];

    $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param('s', $email);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            // User is registered, proceed with login
            $_SESSION["id"] = $user['id'];
            $_SESSION["email"] = $user['email'];
            $_SESSION["role"] = $user['role'];

            // Redirect based on the user's role
            if ($user['role'] == 'admin') {
                header("Location: Admin.html");
            } else {
                header("Location: Bakery.html");
            }
            exit();
        } else {
            echo "Invalid password";
        }
    } else {
        echo "User not found. Please sign up.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Sign Up | Log In</title>
  <link rel="stylesheet" href="LoginStyle.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div class="wrapper">
    <div class="title-text">
      <div class="title login">
        Account
      </div>
      <div class="title signup">
        Account
      </div>
    </div>
    <div class="form-container">
      <div class="slide-controls">
        <input type="radio" name="slide" id="login" checked>
        <input type="radio" name="slide" id="signup">
        <label for="login" class="slide login">Login</label>
        <label for="signup" class="slide signup">SignUp</label>
        <div class="slider-tab"></div>
      </div>
      <div class="form-inner">
        <form action="login.php" class="login" method="post" onsubmit="return validateLogin()">

          <div class="field">
            <input type="text" placeholder="Email Address" id="loginEmail" name="loginEmail" required>
          </div>
          <div class="field">
            <input type="password" placeholder="Password" id="loginPassword" name="loginPassword" required>
          </div>
          <div class="pass-link">
            <a href="#">Reset password?</a>
          </div>
          <div class="field btn">
            <div class="btn-layer"></div>
            <input type="submit" value="Login" name="login">
          </div>
          <div class="signup-link">
            Don't Have Account? <a href="Admin.html">Create A New</a>
          </div>
        </form>

        <form action="login.php" class="signup" method="post" onsubmit="return validateSignup()">
          <div class="field">
            <input type="text" placeholder="Email Address" id="signupEmail" name="signupEmail" required>
          </div>
          <div class="field">
            <input type="password" placeholder="Password" id="signupPassword" name="signupPassword" required>
          </div>
          <div class="field">
            <input type="password" placeholder="Confirm Password" id="confirmPassword" name="confirmPassword" required>
          </div>
          <div class="field btn">
            <div class="btn-layer"></div>
            <input type="submit" value="SignUp" name="signup">
          </div>
        </form>

      </div>
    </div>
  </div>
  <script src="style.js"></script>
  <script>
    function validateLogin() {
      const email = document.getElementById("loginEmail").value;
      const password = document.getElementById("loginPassword").value;

      if (!email.includes("@")) {
        alert("Invalid email address");
        return false;
      }

      if (password.length < 8) {
        alert("Password must be at least 8 characters long");
        return false;
      }

      window.location.href = "Bakery.html";
      return false;
    }

    function validateSignup() {
      const email = document.getElementById("signupEmail").value;
      const password = document.getElementById("signupPassword").value;
      const confirmPassword = document.getElementById("confirmPassword").value;

      if (!email.includes("@")) {
        alert("Invalid email address");
        return false;
      }

      if (password.length < 8) {
        alert("Password must be at least 8 characters long");
        return false;
      }

      if (password !== confirmPassword) {
        alert("Passwords do not match");
        return false;
      }

      window.location.href = "Bakery.html";
      return false;
    }
  </script>
</body>

</html>
