<?php
session_start();
$user_id = $_GET['uid'];
echo $user_id;

$localhost = 'localhost';
$username = 'root';
$password ='';
$db ='chat_app_db';

$connect = new mysqli ($localhost,$username,$password,$db);

// $sql="UPDATE `users` SET `is_blocked` = '1' WHERE `users`.`user_id` = ";
// $result=mysqli_query($conn,$sql);
if (isset($_GET['uid'])) {
    
	$user_id = $_GET['uid'];
    $is_blocked= $_GET['is_blocked'];
	mysqli_query($connect, "update users SET is_blocked = $is_blocked WHERE users.user_id ='$user_id'");
	
     header("Location: " . $_SERVER["HTTP_REFERER"]);
    
	
}
?>