<?php
$host = "localhost";
$username = "root"; 
$password = " "; 
$database = "bakery";
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection to the database failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM user";
$result = $conn->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Role</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["password"] . "</td>
                    <td>" . $row["role"] . "</td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "No data found";
    }
} else {
    echo "Error in the SQL query: " . $conn->error;
}

$conn->close();
?>
