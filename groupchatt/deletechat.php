<?php
// $p_p= $_SESSION['p_p'];
// echo $p_p;
    if(isset($_GET["user_id"]) && isset($_GET["user_id"]))
    {
        $data = $_GET["user_id"];
        $room_name = $_GET["room_name"];
        echo $data;
        
        $conn = new mysqli('localhost', 'root', '', 'chat_app_db');
        
        
    }
?>
