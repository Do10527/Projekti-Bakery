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
    $title = $_POST["title"];
    $content = $_POST["content"];

    $image = null;
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $image = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    }

    $stmt = $conn->prepare("INSERT INTO data (title, content, image) VALUES (?, ?, ?)");

    if (!$stmt) {
        die("Error in SQL statement: " . $conn->error);
    }
    
    $stmt->bind_param("sss", $title, $content, $image);
    
    if ($stmt->execute()) {
        echo "Data added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
}

$conn->close();
function getAboutUsData() {
    global $conn;
    $result = $conn->query("SELECT * FROM about_us WHERE id = 1");

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return false;
    }
}
?>

<!-- Database connection code here (similar to your existing code)

$result = $conn->query("SELECT * FROM contact ORDER BY ID DESC");

if ($result->num_rows > 0) {
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>";
        echo "<strong>Name:</strong> " . $row['name'] . "<br>";
        echo "<strong>Email:</strong> " . $row['email'] . "<br>";
        echo "<strong>Phone:</strong> " . $row['phone'] . "<br>";
        echo "<strong>Gender:</strong> " . $row['gender'] . "<br>";
        echo "<strong>Message:</strong> " . $row['message'] . "<br>";
        echo "</li>";
    }
    echo "</ul>";
} else {
    echo "No contact form messages available.";
}

$conn->close();
?>
-->