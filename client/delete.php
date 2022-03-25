
<?php 
session_start();
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


if (isset($_GET['del'])) {
    $targetDir = "assets/post/";

	$id = $_GET['del'];

	mysqli_query($db, "DELETE FROM images WHERE images.id=$id");
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	
	
}

?>