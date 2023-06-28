
<?php

include 'config.php';
$name = $_SESSION['name'];

$sql="SELECT * FROM chat_room where name = '$name' ";

// $sql="SELECT * FROM groupchat INNER JOIN users ON users.name = '$name' AND groupchat.name ='$name' Where chat_room = $chat;";
// $sqll ="SELECT * FROM groupchat INNER JOIN users ON users.name = 'Noblesse' AND groupchat.name ='Noblesse' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $room_name = $row['room_name'];
  
    echo "<div class='message'>
      
        <div class='box'>
          <a href='display.php?user_id=$id&room_name=$room_name'>
            <strong>" . $row["room_name"] . "</strong>: 
          </a>";
          echo "<p> ID:" . $row["id"] . "</> <br><a href='#' class='delete-link' data-id='$id'>Delete </a> </p>";

echo "  </div>";


    $iddd = $row['id'];
    $sqll = "SELECT name, MAX(chats) AS msg FROM `groupchat` WHERE chat_room = '$iddd' AND name = '$name'";
    $resultt = $conn->query($sqll);

    if ($resultt->num_rows > 0) {
      // Output data of each row
      while($rows = $resultt->fetch_assoc()) {
        echo "<a class='gm'>" . $rows["msg"] . "</a>";
        echo "</div>";
      }
    }
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

.box{
  display: flex;
  justify-content: space-between;
}



</style>

<style>
  .message {
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 10px;
    background-color: #f9f9f9;
    border-radius: 5px;
  }

  .message p {
    margin: 0;
    font-size: 16px;
  }

  .message a {
    color: black;
    text-decoration: none;
  }

  .message a:hover {
    text-decoration: underline;
  }

  .message a.delete {
    color: red;
    margin-left: 10px;
  }

  .gm{
    position: relative;
    bottom:30px;
    color: black;
  }
</style>
