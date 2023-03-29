<?php
session_start();
$user_id = $_GET['user1'];
$user_id2 = $_GET['user2'];
echo $user_id;
echo $user_id2;

$localhost = 'localhost';
$username = 'root';
$password ='';
$db ='chat_app_db';

$connect = new mysqli ($localhost,$username,$password,$db);

// $sql="UPDATE `users` SET `is_blocked` = '1' WHERE `users`.`user_id` = ";
// $result=mysqli_query($conn,$sql);
if (isset($_GET['user1'])) {
    
	$user_1 = $_GET['user1'];
    $user_2 = $_GET['user2'];
    $is_blocked= $_GET['is_blocked'];
	mysqli_query($connect, "update conversations SET is_blocked = $is_blocked WHERE user_1 ='$user_1' AND user_2 ='$user_2'");
	
     header("Location: " . $_SERVER["HTTP_REFERER"]);
    
	
}
?>