<?php

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "bakery";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/* Forma e Par nga Faqja Bakery */
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if (isset($_POST["title"]) && isset($_POST["content"])) 
    {
        $title = $_POST["title"];
        $content = $_POST["content"];

        $sql = "INSERT INTO data (title, content) VALUES ('$title', '$content')";
        if ($conn->query($sql) === TRUE) {
            echo "Data inserted successfully!";
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
        printError($conn->error);
    }

    return $messages;
}


function getData($conn) {
    $data = [];
    $result = $conn->query("SELECT * FROM data ORDER BY id DESC");

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    } else {
        printError($conn->error);
    }

    return $data;
}

function getMenuData($conn) {
    $menuData = [];
    $result = $conn->query("SELECT * FROM menu_table ORDER BY id DESC");

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $menuData[] = $row;
        }
    } else {
        printError($conn->error);
    }

    return $menuData;
}


function getAboutUsData($conn) {
    $result = $conn->query("SELECT * FROM about_us");
    $aboutUsData = [];

    if ($result) {
        $aboutUsData = $result->fetch_assoc();
    } else {
        printError($conn->error);
    }

    return $aboutUsData;
}



function getOrdersData($conn) {
    $ordersData = [];
    $result = $conn->query("SELECT * FROM orders ORDER BY order_date DESC");

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $ordersData[] = $row;
        }
    } else {
        printError($conn->error);
    }

    return $ordersData;
}

function getUserData($conn) {
    $result = $conn->query("SELECT * FROM user");
    $userData = [];

    if ($result) {
        $userData = $result->fetch_assoc();
    } else {
        printError($conn->error);
    }

    return $userData;
}

function closeConnection($conn) {
    $conn->close();
}

?>
