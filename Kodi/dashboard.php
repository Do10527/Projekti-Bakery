<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "bakery";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
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
function getAboutUsData($conn) {
    $aboutUsData = [];
    $result = $conn->query("SELECT * FROM about_us");

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $aboutUsData[] = $row;
        }
    } else {
        echo "Error fetching About Us data: " . $conn->error;
    }

    return $aboutUsData;
}

function getMenuData($conn) {
    $menuData = [];
    $result = $conn->query("SELECT * FROM menu_table");

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $menuData[] = $row;
        }
    } else {
        echo "Error fetching Menu data: " . $conn->error;
    }

    return $menuData;
}

function getData($conn) {
    $data = [];
    $result = $conn->query("SELECT * FROM data");

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    } else {
        echo "Error fetching Menu data: " . $conn->error;
    }

    return $data;
}

function getOrdersData($conn) {
    $ordersData = [];
    $result = $conn->query("SELECT * FROM orders");

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $ordersData[] = $row;
        }
    } else {
        echo "Error fetching Orders data: " . $conn->error;
    }

    return $ordersData;
}

function printSection($title, $data) {
    echo "<h3>$title</h3>";
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Adamina" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
<style>
    html, body {
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Adamina', sans-serif;
}

header, nav, section, footer {
    padding: 20px;
}

header {
    background-color: #333;
    color: #fff;
    text-align: center;
}

nav {
    background-color: #555;
    text-align: center;
}

nav a {
    color: #fff;
    text-decoration: none;
    margin: 0 15px;
    font-weight: bold;
}

nav a:hover {
    text-decoration: underline;
}

section {
    margin-top: 20px;
}

h1, h2, h3 {
    color: #333;
}

table {
    border-collapse: collapse;
    width: 100%;
    margin-top: 15px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #555;
    color: #fff;
}

footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    position: fixed;
    bottom: 0;
    width: 100%;
    padding: 10px;
}


ul {
    list-style-type: none;
    padding: 0;
}

ul li {
    margin-bottom: 10px;
}

@media screen and (max-width: 600px) {
    nav a {
        display: block;
        margin: 10px 0;
    }
}
</style>   
</head>

<body>
    <header>
        <h1>Admin Dashboard</h1>
    </header>
    <nav>
        <a href="#">Home</a>
        <a href="#">Users</a>
        <a href="#">Admin</a>
        <a href="logout.php">Logout</a>
    </nav>
    <section>
        <h2>Welcome to Your Dashboard!</h2>
    </section>

<section>
    <h2>ContactUs!</h2>
    <?php
    $contactMessages = getContactFormMessages($conn);

    if (!empty($contactMessages)) {
        echo '<table border="1">';
        echo '<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Gender</th><th>Message</th></tr>';

        foreach ($contactMessages as $message) {
            echo '<tr>';
            echo '<td>' . $message['ID'] . '</td>';
            echo '<td>' . $message['name'] . '</td>';
            echo '<td>' . $message['email'] . '</td>';
            echo '<td>' . $message['phone'] . '</td>';
            echo '<td>' . $message['gender'] . '</td>';
            echo '<td>' . $message['message'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo '<p>No contact form messages found.</p>';
    }
    ?>
</section>

<section>
    <h2>AboutUS!</h2>
    <?php
    $aboutUsData = getAboutUsData($conn);

    if (!empty($aboutUsData)) {
        echo '<table border="1">';
        echo '<tr><th>ID</th><th>Title</th><th>Content</th></tr>';

        foreach ($aboutUsData as $data) {
            echo '<tr>';
            echo '<td>' . $data['id'] . '</td>';
            echo '<td>' . $data['title'] . '</td>';
            echo '<td>' . $data['content'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo '<p>No About Us data found.</p>';
    }
    ?>
</section>


<section>
    <h2>Menu!</h2>
    <?php
    $menuData = getMenuData($conn);

    if (!empty($menuData)) {
        echo '<table border="1">';
        echo '<tr><th>ID</th><th>Title</th><th>Data Created</th><th>Price</th></tr>';

        foreach ($menuData as $data) {
            echo '<tr>';
            echo '<td>' . $data['id'] . '</td>';
            echo '<td>' . $data['title'] . '</td>';
            echo '<td>' . $data['data_created'] . '</td>';
            echo '<td>' . $data['price'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo '<p>No Menu data found.</p>';
    }
    ?>
</section>

<section>
    <h2>Orders!</h2>
    <?php
    $ordersData = getOrdersData($conn);

    if (!empty($ordersData)) {
        echo '<table border="1">';
        echo '<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th><th>Contact Method</th><th>Order Date</th><th>Size</th><th>Cake Flavor</th><th>Buttercream Flavor</th><th>Ganache Drip</th><th>Fancy</th><th>Message</th></tr>';
        
        foreach ($ordersData as $data) {
            echo '<tr>';
            echo '<td>' . (isset($data['ID']) ? $data['ID'] : '') . '</td>';
            echo '<td>' . (isset($data['firstname']) ? $data['firstname'] : '') . '</td>';
            echo '<td>' . (isset($data['lastname']) ? $data['lastname'] : '') . '</td>';
            echo '<td>' . (isset($data['email']) ? $data['email'] : '') . '</td>';
            echo '<td>' . (isset($data['phone']) ? $data['phone'] : '') . '</td>';
            echo '<td>' . (isset($data['contact_method']) ? $data['contact_method'] : '') . '</td>';
            echo '<td>' . (isset($data['order_date']) ? $data['order_date'] : '') . '</td>';
            echo '<td>' . (isset($data['size']) ? $data['size'] : '') . '</td>';
            echo '<td>' . (isset($data['cake_flavor']) ? $data['cake_flavor'] : '') . '</td>';
            echo '<td>' . (isset($data['buttercream_flavor']) ? $data['buttercream_flavor'] : '') . '</td>';
            echo '<td>' . (isset($data['ganache_drip']) ? $data['ganache_drip'] : '') . '</td>';
            echo '<td>' . (isset($data['fancy']) ? $data['fancy'] : '') . '</td>';
            echo '<td>' . (isset($data['message']) ? $data['message'] : '') . '</td>';
            echo '</tr>';
        }
        
        echo '</table>';
    } else {
        echo '<p>No Orders data found.</p>';
    }
    ?>
</section>

<section>
<h2>Insertimi i te dhenve!</h2>
<section>
<h2>Data from Bakery</h2>
<?php
$data = getData($conn);

if (!empty($data)) {
    echo '<table border="1">';
    echo '<tr><th>ID</th><th>Title</th><th>Content</th></tr>';

    foreach ($data as $item) {
        echo '<tr>';
        echo '<td>' . $item['id'] . '</td>';
        echo '<td>' . $item['title'] . '</td>';
        echo '<td>' . $item['content'] . '</td>';
         echo '<td><img src="data:image/jpeg;base64,' . base64_encode($item['image']) . '" alt="Image" style="width:100px;height:100px;"></td>';
         echo '<td><a href="data:application/pdf;base64,' . base64_encode($item['file']) . '" target="_blank">View PDF</a></td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo '<p>No data found.</p>';
}
?>
</section>
    
    <footer>
        &copy; 2024 Admin Dashboard
    </footer>

</body>
</html>
