<?php 

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



error_reporting(0); // For not showing any error

if (isset($_POST['submit'])) { // Check press or not Post Comment Button
	$id = $_POST['id'];
	$name = $_POST['name']; // Get Name from form

	$comment = $_POST['comment']; // Get Comment from form

	$sql = "INSERT INTO comment ( comment,name)
			VALUES ( '$comment','$name')";

			// $sql = "UPDATE images SET images.id,images.name, images.comment  WHERE images.comment = '$comment''";
	$result = mysqli_query($conn, $sql);
	
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Comment System in PHP - Pure Coding</title>
</head>

<body>
    <div class="wrapper">

        <div class="prev-comments">
            <?php 
			
			$sql = "SELECT comment ,name='$name' FROM `comment` WHERE  comment.id= '$id'";

			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {

			?>
            <div class="single-item">
                <h4><?php echo $row['name']; ?></h4>
                <p><?php echo $row['comment']; ?></p>
            </div>
            <?php

				}
			}
			
			?>
        </div>
    </div>







</body>

</html>

SELECT comment ,name='Nabin' FROM `comment` WHERE comment.id= 2