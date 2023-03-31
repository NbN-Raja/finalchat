<?php
// Connect to database
$conn = mysqli_connect('localhost', 'root', '', 'chat_app_db');



// Insert new chat message into database
$username = mysqli_real_escape_string($conn, $_POST['username']);
$message = mysqli_real_escape_string($conn, $_POST['message']);
$query = "INSERT INTO live_chat (username, message) VALUES ('$username', '$message')";
mysqli_query($conn, $query);

?>
