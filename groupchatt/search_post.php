<?php
session_start();
 
include 'config.php';




$sql="SELECT * FROM `chat_room` where room_name= 'p'";
// $sql="SELECT * FROM groupchat INNER JOIN users ON users.name = '$name' AND groupchat.name ='$name' Where chat_room = $chat;";
// $sqll ="SELECT * FROM groupchat INNER JOIN users ON users.name = 'Noblesse' AND groupchat.name ='Noblesse' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
      // echo $p = "<img src='../client/assets/img/group.png' style='width:20px;height:20px;'>";
      // $p_p = " <h3 class='group_name'> " . $row["room_name"] . "</h3> 
      // <a href='index.php' style='position: relative;
      // left: 67pc; background-color:red; color:white; text-decoration:none; padding:2px; border-radius:3px;
      // top: 10px;'> Leave Room </a> <br><br>";
      
      // echo $p_p;
      echo "" .$row['id']."<br>";
      echo "" .$row['room_name']."";
      ?>

<form action="joinchat.php" method="post">
<label> Send Message Here </label> <br>
<input type="text" name="chats" placeholder="send chats">   <br>
<input type="text" name ="chat_room" value="<?php echo $idd ?>"> <br>
<input type="text" name ="p_p" value="<?php  echo  $p_p ?>"> <br>
 <input type="submit" name="message">
</form>
<?php
     
      
    }
}




?>