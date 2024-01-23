<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'bakery');

if ($conn->connect_error) {
    die("Connection to the database failed: " . $conn->connect_error);
}

if (isset($_POST['login'])) {
    $email = $_POST['loginEmail'];
    $password = $_POST['loginPassword'];

    $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION["type"] = $user['role'];
            $_SESSION["email"] = $user['email'];

            header("Location: Bakery.html");
            exit();
        } else {
            echo "Invalid password";
        }
    } else {
        echo "User not found";
    }

    $stmt->close();
}

$conn->close();
?>
