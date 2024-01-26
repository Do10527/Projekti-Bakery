<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "bakery";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = isset($_POST["firstname"]) ? $_POST["firstname"] : "";
    $lastname = isset($_POST["lastname"]) ? $_POST["lastname"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $phone = isset($_POST["phone"]) ? $_POST["phone"] : "";
    $contact_method = isset($_POST["contact"]) ? $_POST["contact"] : "";
    $order_date = isset($_POST["orderDate"]) ? $_POST["orderDate"] : "";
    $size = isset($_POST['size']) ? $_POST['size'] : "";
    $cake_flavor = isset($_POST['cake_flavor']) ? $_POST['cake_flavor'] : "";
    $buttercream_flavor = isset($_POST['buttercreamFlavor']) ? $_POST['buttercreamFlavor'] : "";  
    $ganache_drip = isset($_POST['ganache_drip']) ? $_POST['ganache_drip'] : "";  
    $fancy = isset($_POST['fancy']) ? $_POST['fancy'] : "";
    $message = isset($_POST["message"]) ? $_POST["message"] : "";
    $stmt = $conn->prepare("INSERT INTO orders (firstname, lastname, email, phone, contact_method, order_date, size, cake_flavor, buttercream_flavor, ganache_drip, fancy, message) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("ssssssssssss", $firstname, $lastname, $email, $phone, $contact_method, $order_date, $size, $cake_flavor, $buttercream_flavor, $ganache_drip, $fancy, $message);

    if ($stmt->execute()) {
        echo "Order submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>