<?php
session_start();
if(isset($_SESSION['name'])){
    $text = $_POST['text'];
	date_default_timezone_set("Asia/Kathmandu");
	$text_message = "<div class='msgln'><span class='chat-time'>"
    .date("h:i:sa"). 
    "</span> <br> <b class='user-name'>"
    .$_SESSION['name']."</b> ".stripslashes(htmlspecialchars($text))."<br></div>";
    file_put_contents("log.html", $text_message, FILE_APPEND | LOCK_EX);
}
?>