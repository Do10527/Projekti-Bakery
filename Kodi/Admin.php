<?php
$host = "localhost";
$username = "username"; 
$password = "password"; 
$database = "bakery";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Lidhja me bazën e të dhënave ka deshtuar: " . $conn->connect_error);
}

$sql = "SELECT * FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Role</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["name"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["password"] . "</td>
                <td>" . $row["role"] . "</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "Nuk ka të dhëna të gjetura";
}

$conn->close();
?>
