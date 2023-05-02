<?php 

if(isset($_GET["user_id"]) && isset($_GET["user_id"]))
    {
        $data = $_GET["user_id"];
        $room_name = $_GET["room_name"];    
    }
    
$conn = new mysqli('localhost', 'root', '', 'chat_app_db');
  // $search ="SELECT * FROM `groupchat` where room_name= '$room_name' AND chat_room = '$chat_roomm'";
  $sql ="SELECT * FROM `groupchat` WHERE chat_room = ' $data'";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    
      echo "<div class='container'>";
      echo "<div class='sticky'>   $room_name <strong> Admin </strong> ";
      echo "<button  btn-danger >  <a href='index.php' style='color:white; list-type:none;'>  Leave  </a>  </button> </div>";
      
    while($rows = $result->fetch_assoc()) {
        // echo "<p> Group: <strong>" . $row["room_name"] . " </strong>  Id:( <strong>  " . $row["id"] . " </strong>)<br> "  ;
        echo "<a href=''>" ;
        echo "<img src='../client/assets/uploads/" . $rows["p_p"] . "' alt='img' class='image' >" ;
        echo " <a class='chats'> " . $rows["chats"] ." <br> </a> </p> "  ;
        // echo "$iddd";
        echo "</a>";
      }
      echo "</div>";
}


?>