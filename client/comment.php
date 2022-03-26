<?php 
session_start();
$server = "localhost";
$username = "root";
$password = "";
$database = "chat_app_db";

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) { // If Check Connection
    die("<script>alert('Connection Failed.')</script>");
}

?>

<?php 

// error_reporting(0); // For not showing any error

if (isset($_POST['submit'])) { // Check press or not Post Comment Button
	
	$name = $_POST['name']; // Get Name from form
	$comment = $_POST['comment']; // Get Comment from form
	$profile_pic = $_POST['profile_pic']; // Get pic from form
	

	$sql = "INSERT INTO `comment` ( `name`,`comment`,`profile_pic`)
			VALUES ('$name', '$comment','$profile_pic')";

			// $sql = "UPDATE images SET images.id,images.name, images.comment  WHERE images.comment = '$comment''";
	$result = mysqli_query($conn, $sql);
	
	
}



?>
