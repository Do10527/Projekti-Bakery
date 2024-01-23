<?php
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');
$phone = filter_input(INPUT_POST, 'phone');
$gender = filter_input(INPUT_POST, 'gender');
$message = filter_input(INPUT_POST, 'message'); 

if (!empty($name) || !empty($email) || !empty($phone) || !empty($gender) || !empty($message)) {
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "bakery";

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if (mysqli_connect_error()) {
        die('Connect Error (' . mysqli_connect_errno() . ')' . mysqli_connect_error());
    } else {
        $sql = "INSERT INTO contact (name, email, phone, gender, message) VALUES ('$name', '$email', '$phone', '$gender', '$message')";
        if ($conn->query($sql)) {
            echo "Your contact has been sent!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
} else {
    echo "Fill required fields";
    die();
}
?>
