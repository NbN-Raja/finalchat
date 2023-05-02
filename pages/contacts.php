<div class="thirdcolumn">
       <div class="notifications">
       <ul>
      
       <!-- recommended posts here -->
    


       </ul>
       </div>
  <div class="lastpost">
    <!-- <p id="contact">Suggestions</p>
      <?php
      define('PUBLIC_PATH', dirname(__FILE__) . '/uploads/');
      $conn = new mysqli('localhost', 'root', '', 'chat_app_db');
      $sqll = "SELECT * FROM `users` ORDER BY RAND() LIMIT 2";
      $result = mysqli_query($conn, $sqll);

      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
      ?>
          <div class="image" style="display: flex;">
            <img class="" src="client/assets/uploads/<?= $row['p_p'] ?>" width="30" height="30" style="border:2px solid white">
            <a href="client/user_profile.php?user=<?= $row['username'] ?>" style="color:black">
              <?php
              echo "<div class='name'>";
              echo "" . $row['name'] . " &nbsp" . $row['lastname'] . "";
              echo "</div> <br>";
              ?>
            </a>
          </div>
      <?php
        }
      }
      ?>
    </div> -->
    <ul id="chatList" class="chatList">
      <h3 >Contacts</h3>
      <?php if (!empty($conversations)) { ?>
       
          <li>
            <a href="client/final.php?user=<?= $conversation['username'] ?>">
              <div style="display: flex;">
                <img src="client/assets/uploads/<?= $conversation['p_p'] ?>" class="w-10 rounded-circle" style="width: 36px; height: 36px;">
                <p><?= $conversation['name'] ?><br>
                  <!-- <span style="color:<?= $label_color ?>"><?= $label_text ?></span> -->
                </p>
                <p><?= $conversation['lastname'] ?><br></p>
              </div>
            </a>
          </li>
        <?php } ?>
    </ul>

    <!-- <div class="h1">Group Chats</div> -->
    <!-- <?php

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
     
      echo "<div class='messagee'>  <p> <a href= 'http://localhost/main/groupchat/display.php?user_id= $id &room_name=$room_name'  >
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
?> -->
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



  </div>
 <hr>
 <div class="displaygroup">
        <h3><a href="http://localhost/main/group/group.php">  Your Groups </a> </h3>
        <?php
        // Connect to the database
        
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        // Get the group ID from the query string
        // $group_id = $_GET['id'];
        
        // Get the group details from the database
        $sql = "SELECT  Distinct name,group_photo FROM groups";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $group_name = $row['name'];
                $photo = $row['group_photo'];           
          ?>        
            <h1></h1>
            <?php if ($photo) { ?>
                <img src="http://localhost/main/group/uploads/group_profile/<?php echo $photo; ?>" alt="<?php echo $group_name; ?>" height="36px" width="36px">
            <?php }else{ ?>
                <img src="http://localhost/main/group/uploads/group_profile/default.png"  height="36px" width="36px">
                <?php 
            } ?>
        <?php $group_admin_id = $_SESSION['user_id'] ?>
        
        <a href="group_details.php?id=<?php echo $group_admin_id; ?>&amp;name=<?php echo urlencode($group_name); ?>"><?php echo $group_name; ?></a>
        <?php
          }
        } else {
            die("Group not found");
        }
        ?>
             </div>
</div>

<style>

</style>
<style>
  .chatList {
    margin: 0px;
    padding: 0px;
    
  }

  .name {
    font-size: larger;
    font-weight: 500;
    font-family: inherit;
    margin-left: 1pc;
    margin-top: 2px;
  }

  .image img {

    border-radius: 32px;

  }

  .image {
    background-color: rgb(243, 243, 239);
  }

  .thirdcolumn {

    top: 4pc;
  }

  #contact {
    font-weight: 600;
    font-size: 20px;

  }

  .groups{
    padding: 30px;
    padding-left:2.5rem
  }

  .groups li{
    border-radius: 5px;
    /* box-shadow: 1px 1px 1px 1px #e4deea; */
    padding: 15px;
    font-size: larger;
    font-family: inherit;
    font-weight: 600;
  }

  .groups ul{
    padding: 2px;
  }

  .displaygroup {
  
  align-items: center;
}

.displaygroup h1 {
  margin-right: 10px;
}

.displaygroup img {
  border-radius: 50%;
  margin-right: 10px;
}

.displaygroup a {
  text-decoration: none;
  color: #333;
  font-weight: bold;
  margin-bottom: 10px;
}

.displaygroup a:hover {
  color: #2E8B57;
}

</style>