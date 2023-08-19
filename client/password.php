<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search ID by Username</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="dialog-box">
        <h2>Search ID by Username</h2>
        <form action=" " method="post">
            <input type="text" placeholder="Enter username" name="username" required>
            <button type="submit">Search</button>
        </form>
    </div>
</body>
</html>

<div class="">



<?php

session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'chat_app_db');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $_SESSION['user_id'] = $row["user_id"];

            echo "ID: " . $row["user_id"] . " - Name: " . $row["name"] . "<br>";
            echo "<img class='circular' src='assets/uploads/" . $row["p_p"] . "' alt='" . $row["name"] . "'>";
            echo "<a href='resetpassword.php?user_id=" . $row["user_id"] . "'>Click here</a>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
}
?>
</div>

</body>
</html>

<style>
    body {
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f4f4f4;
}

.dialog-box {
    width: 300px;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    border-radius: 5px;
}

.dialog-box h2 {
    text-align: center;
    margin-bottom: 20px;
}

.dialog-box input {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}

.dialog-box button {
    width: 100%;
    padding: 10px;
    background-color: #007BFF;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.dialog-box button:hover {
    background-color: #0056b3;
}

img.circular {
    border-radius: 50%;  
    width: 100px;          
    height: 100px;        
}

</style>