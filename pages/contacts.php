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
      <h4>Contacts</h4>
      <?php if (!empty($conversations)) { ?>
       
          <li>
            <a href="client/final.php?user=<?= $conversation['username'] ?>">
              <div style="display: flex;">
                <img src="client/assets/uploads/<?= $conversation['p_p'] ?>" class="w-10 rounded-circle" style="width: 36px; height: 36px;">
                <p class="ml-2">
  <?php 
    $name = strtoupper($conversation['name']); // Capitalize each word
    $lastname = strtoupper($conversation['lastname']); // Capitalize each word
    
    echo "<strong>{$name}</strong> {$lastname}<br>"; // Bold the name and display the lastname
  ?>
</p>

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
  

 <!-- Suggestions HERE  -->

 <div class="suggestions">
  <h4> Suggestion Posts </h4>

 <?php
// Your database connection code here

// Your database connection code here
$userid=$_SESSION['user_id'];

$query = "SELECT users.user_id, users.interests, community.tags, community.title, community.id as cid,community.p_p
          FROM users
          LEFT JOIN community ON users.interests = community.tags
          WHERE users.user_id ='$userid'
          ORDER BY CASE WHEN community.tags IS NOT NULL THEN 0 ELSE 1 END, RAND()";

$result = mysqli_query($conn, $query);

if ($result) {
  echo '<ul id="search-results">';
  while ($row = mysqli_fetch_assoc($result)) {
      echo '<li>';
      echo '<a href="Blog/singlepost.php?cid=' . $row['cid'] . '">';
      echo '<div class="result-title">' . substr($row['title'], 0, 20) . '..</div>';
      echo '<div class="result-tags">' . $row['tags'] . '</div>';
      echo '</a>';
      echo '</li>';
  }
  echo '</ul>';
} else {
  echo 'Error executing the query.';
}


// Close the database connection


?>

 </div>
 <style>
        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 20px;
            background-color: #f2f2f2;
            padding: 10px;
            border-radius: 5px;
            opacity: 0;
            animation: fade-in 2s forwards;
            transition: opacity 2s;
        }

        @keyframes fade-in {
            0% {
                opacity: 0;
                transform: translateY(100%);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-container {
            margin-top: 20px;
            opacity: 0;
            animation: form-slide-up 2s forwards;
            transition: opacity 2s;
        }

        @keyframes form-slide-up {
            0% {
                opacity: 0;
                transform: translateY(100%);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        #search-results {
  list-style: none;
  padding: 0;
  margin: 0;
}

#search-results li {
  padding: 10px;
  border-bottom: 1px solid #ddd;
}

#search-results li:last-child {
  border-bottom: none;
}

.result-title {
  font-weight: bold;
}

.result-tags {
  color: #888;
}

    </style>





 <div class="displaygroup">
        <h4><a href="http://localhost/main/group/group.php">  Your Groups </a> </h4>
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
    background-color: white;

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
    box-shadow: 1px 1px 1px 1px #e4deea;
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
  color: #66666a;
  margin-bottom: 10px;
}

.displaygroup a:hover {
  color: #2E8B57;
}

h4{
  color: #66666a;
}
</style>