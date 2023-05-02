
<?php
session_start();
// $p_p= $_SESSION['p_p'];
// echo $p_p;
    if(isset($_GET["user_id"]) && isset($_GET["user_id"]))
    {
        $data = $_GET["user_id"];
        $room_name = $_GET["room_name"];
        
        echo $data;
        echo $room_name;
    }
?>






<?php 
$conn = new mysqli('localhost', 'root', '', 'chat_app_db');


  $room_name = $_POST['room_name'];

  // $search ="SELECT * FROM `groupchat` where room_name= '$room_name' AND chat_room = '$chat_roomm'";
  $sql ="SELECT * FROM `chat_room` WHERE room_name = '$room_name'";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
  header('location:display.php');

}


?>

<form action="demo.php" method="post">
Search : <input type="text" name="room_name" >
<input type="submit" name="submit">
</form> 