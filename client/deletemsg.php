<?php 
$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "chat_app_db";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}


if (isset($_GET['delmsg'])) {
    
	$chat_id = $_GET['delmsg'];
	mysqli_query($db, "DELETE FROM chats WHERE chat_id=$chat_id");
	
    header("Location: " . $_SERVER["HTTP_REFERER"]);
	
}

?>
