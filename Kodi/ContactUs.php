<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
print_r($_POST);
echo "PHP code is executing!";

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "bakery";
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');
$phone = filter_input(INPUT_POST, 'phone');
$gender = filter_input(INPUT_POST, 'gender');
$message = filter_input(INPUT_POST, 'message');

if (empty($name) || empty($email) || empty($phone) || empty($gender) || empty($message)) {
    echo "Fill required fields";
    die();
}


if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ')' . mysqli_connect_error());
} else {
    $sql = "INSERT INTO contact (name, email, phone, gender, message) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $email, $phone, $gender, $message);
    $stmt->execute();
    $stmt->close();

 
    header('Location: ContactUs.html');
    exit();
}
?>
