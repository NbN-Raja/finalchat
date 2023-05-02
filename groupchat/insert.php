<?php

include 'config.php';
$name = $_SESSION['name'];

$sql="SELECT * FROM chat_room where name = '$name' ";

// $sql="SELECT * FROM groupchat INNER JOIN users ON users.name = '$name' AND groupchat.name ='$name' Where chat_room = $chat;";
// $sqll ="SELECT * FROM groupchat INNER JOIN users ON users.name = 'Noblesse' AND groupchat.name ='Noblesse' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {
      $id = "" .$row['id'] . "";
      $room_name = "" .$row['room_name'] . "";
     
      echo "<div class='messagee'>  <p> <a href= 'display.php?user_id= $id &room_name=$room_name'  >
        <strong>" . $row["room_name"] . " </strong>  ( <strong>  " . $row["id"] . " </strong>) </a>  "  ;
        echo " <a href ='deletechat.php?user_id= $id' style='color:red;'> Delete </a>";
      $iddd = "".$row['id']. "";
      $sqll="SELECT name, max(chats) as msg  from  `groupchat` where chat_room = '$iddd' AND name ='$name' ";
      // // $sql="SELECT * FROM groupchat INNER JOIN users ON users.name = '$name' AND groupchat.name ='$name' Where chat_room = $chat;";
      // // $sqll ="SELECT * FROM groupchat INNER JOIN users ON users.name = 'Noblesse' AND groupchat.name ='Noblesse' ";
      $resultt = $conn->query($sqll);
      
      if ($resultt->num_rows > 0) {
      
          // output data of each row
          while($rows = $resultt->fetch_assoc()) {
            // echo "<p> Group: <strong>" . $row["room_name"] . " </strong>  Id:( <strong>  " . $row["id"] . " </strong>)<br> "  ;
            echo "<a href=''>" ;
            echo " <br>  <a>" . $rows["msg"] ." </a>  </p> "  ;
            // echo "$iddd";
            echo "</a> </div>";
        
          }
      }
      
      // echo $iddd;
  
    }
}
?>
<!-- <?php  echo $iddd;  ?> -->
<?php
// $sql="SELECT max(groupchat.chats) as msg ,chat_room.name,chat_room.id, chat_room.room_name, groupchat.name,groupchat.chats,groupchat.chat_room
// FROM chat_room  
//  JOIN groupchat 
// on chat_room.name= '$name' AND groupchat.chat_room= $iddd ";
// // $sql="SELECT * FROM groupchat INNER JOIN users ON users.name = '$name' AND groupchat.name ='$name' Where chat_room = $chat;";
// // $sqll ="SELECT * FROM groupchat INNER JOIN users ON users.name = 'Noblesse' AND groupchat.name ='Noblesse' ";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {

//     // output data of each row
//     while($row = $result->fetch_assoc()) {
//       echo "<p> Group: <strong>" . $row["room_name"] . " </strong>  Id:( <strong>  " . $row["id"] . " </strong>)<br> "  ;
//       echo "<p> Group: <strong>" . $row["msg"] ." </strong>)<br> "  ;
//       echo "$iddd";
  
//     }
// }

?>



<style>
p{
  background-color: aliceblue;
    padding: 15px;
    border-radius: 11px;
    display: list-item;
}

strong{
  font-size:30px;
}



</style>