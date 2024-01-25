<?php

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "bakery";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
/*Contact Tabela */
$resultContact = $conn->query("SELECT * FROM contact ORDER BY ID DESC");

$messages = [];

if ($resultContact->num_rows > 0) {
    while ($row = $resultContact->fetch_assoc()) {
        $messages[] = $row;
    }
}
/*Data tabela */
$resultData = $conn->query("SELECT * FROM data ORDER BY id DESC");

$data = [];

if ($resultData->num_rows > 0) {
    while ($row = $resultData->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo "Error retrieving data: " . $conn->error;
}
/*Menu tabela */
$result = $conn->query("SELECT * FROM menu_table ORDER BY id DESC");

$menuData = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $menuData[] = $row;
    }
} else {
    echo "No data available in menu_table.";
}

$conn->close();
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="Bakery.css">
    <link href="https://fonts.googleapis.com/css?family=Adamina" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
</head>

<body>

    <header>
        <h1>Admin Dashboard</h1>
    </header>

    <nav>
        <a href="#">Home</a>
        <a href="#">Users</a>
        <a href="#">Settings</a>
        <a href="logout.php">Logout</a>
    </nav>

    <section>
        <h2>Welcome, Admin!</h2>

        <p>This is the admin dashboard. You can manage users, settings, etc.</p>

        <!-- Te dhenat nga ContactUs -->
        <h2>Contact Form Messages</h2>
        <?php if (!empty($messages)) : ?>
            <ul>
                <?php foreach ($messages as $message) : ?>
                    <li>
                        <strong>Name:</strong> <?php echo $message['name']; ?><br>
                        <strong>Email:</strong> <?php echo $message['email']; ?><br>
                        <strong>Phone:</strong> <?php echo $message['phone']; ?><br>
                        <strong>Gender:</strong> <?php echo $message['gender']; ?><br>
                        <strong>Message:</strong> <?php echo $message['message']; ?><br>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else : ?>
            <p>No contact form messages available.</p>
        <?php endif; ?>

        <h2>Te dhenat nga  Bakery</h2>
        <?php if (!empty($data)) : ?>
            <div class="image-container">
                <?php foreach ($data as $item) : ?>
                    <div class="image-box">
                        <strong>Title:</strong> <?php echo $item['title']; ?><br>
                        <strong>Content:</strong> <?php echo $item['content']; ?><br>
                        <?php if (!empty($item['image'])) : ?>
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($item['image']); ?>" alt="Image" class="img-thumbnail">
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <p>No data available.</p>
        <?php endif; ?>


        <h2>Te dhenat nga Menu</h2>
        <div class="Fotot">
            <?php foreach ($menuData as $menuItem) : ?>
                <div class="Boxi">
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($menuItem['img']); ?>" alt="" class="img">
                    <div class="views_date">
                        <p>
                            <?php echo $menuItem['title']; ?><br>
                            <?php echo $menuItem['data_created']; ?><br>
                            <?php echo $menuItem['price']; ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
    </section>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        nav {
            background-color: #444;
            color: #fff;
            padding: 10px;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin-right: 20px;
            font-weight: bold;
        }

        section {
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px;
        }

        h2 {
            color: #333;
            padding: 10px;
            border-bottom: 2px solid #ddd;
        }

        .image-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .image-box {
            width: 30%;
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .image-box img {
            width: 50%;
            height: auto;
            object-fit: cover;
            border-radius: 5px;
            margin-top: 10px;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        strong {
            color: #555;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>

    <footer>
        &copy; 2024 Admin Dashboard
    </footer>

</body>

</html>
