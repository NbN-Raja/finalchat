
<?php
session_start();
$username = $_SESSION['username'];



if (isset($_SESSION['username'])) {
    # database connection file
    include '../server/db.conn.php';
    include '../server/helpers/user.php';
    include '../server/helpers/conversations.php';
    include '../server/helpers/timeAgo.php';
    include '../server/helpers/last_chat.php';
    include '../server/helpers/chat.php';
    # Getting User data data
    $user = getUser($_SESSION['username'], $conn);
    # Getting User conversations
    $conversations = getConversation($user['user_id'], $conn);

?>
<?php } ?>


<!DOCTYPE html>
<html lang="en">
<?php include '../client/nav_header.php' ?>
<link rel="stylesheet" href="../client/assets/css/landing_page.css">
<body>
<nav class="navbar navbar-expand-sm navbar-light fixed-top ">
	<a href="../landing_page.php" class="navbar-brand mr-3"><i class="fa fa-cube"></i><b>Chat</b></a>
	

	<form class="navbar-form form-inline mr-4" style="margin-right:30px;">
			<div class="input-group search-box">								
				<input type="text" id="searchText" class="form-control" placeholder="Search by Name">
				<span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
			</div>
		</form>
	<!-- Collection of nav links, forms, and other content for toggling -->
	<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start ml-5">
		<div class="navbar-nav">
		<a href="#" class="nav-item nav-link active"> Home</a> 
		</i>
			<a href="video.php" class="nav-item nav-link">Video</a>
		</div>
		<div class="navbar-nav ml-auto mr-5">
			<a href="profile.php" class="nav-item nav-link notifications"><i class="fa fa-bell-o"></i><span class="badge"></span></a>
			<a href="final_one.php" class="nav-item nav-link messages"><i class="fa fa-envelope-o"></i><span class="badge"></span></a></a>
			<div class="nav-item dropdown">
				<a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action">
        
            <img src="../client/assets/uploads/<?=$user['p_p']?>"class="w-30 rounded-circle" height="36" width="36">
            <?php echo htmlspecialchars($_SESSION["username"]); ?><b class="caret"></b></a>
				<div class="dropdown-menu">
					<a href="client/home.php" class="dropdown-item"><i class="fa fa-user-o"></i> Profile</a></a>
					
					<a href="client/settings.php" class="dropdown-item"><i class="fa fa-sliders"></i> Settings</a></a>
					<div class="dropdown-divider"></div>
					<a href="client/logout.php" class="dropdown-item"><i class="material-icons">&#xE8AC;</i> Logout</a></a>
				</div>
			</div>
		</div>
	</div>
</nav>












<?php


include 'config.php';

$chat =$_SESSION["chat_room"];

$name =$_SESSION["name"];
echo $chat;
$namee =$_SESSION['name'];



?>

<?php
$sql="SELECT room_name FROM `chat_room` where id= $chat;";
// $sql="SELECT * FROM groupchat INNER JOIN users ON users.name = '$name' AND groupchat.name ='$name' Where chat_room = $chat;";
// $sqll ="SELECT * FROM groupchat INNER JOIN users ON users.name = 'Noblesse' AND groupchat.name ='Noblesse' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
      echo $p = "<img src='../client/assets/img/group.png' style='width:20px;height:20px;'>";
      $p_p = " <h3 class='group_name'> " . $row["room_name"] . "</h3> 
      <a href='index.php' style='position: relative;
      left: 67pc; background-color:red; color:white; text-decoration:none; padding:2px; border-radius:3px;
      top: 10px;'> Leave Room </a> <br><br>";
      
      echo $p_p;
     
      
    }
}
?>






<div class='toal_users'>
  <h3> Total Users  </h3>
<?php
$sql="SELECT DISTINCT  name,p_p  FROM `groupchat` where chat_room =$chat";
// $sql="SELECT * FROM groupchat INNER JOIN users ON users.name = '$name' AND groupchat.name ='$name' Where chat_room = $chat;";
// $sqll ="SELECT * FROM groupchat INNER JOIN users ON users.name = 'Noblesse' AND groupchat.name ='Noblesse' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<div style='display:flex;     justify-content: space-around;'> ";
      echo "<img src='../client/assets/uploads/" . $row["p_p"] . "'  class='image' >" ;
      echo "<li>" . $row["name"] . "</li>";
      
      echo "</div>";
     
     
     
      
    }
}
?>



</div>;
<?php

$sql="SELECT * FROM groupchat where chat_room='$chat'";
// $sql="SELECT * FROM groupchat INNER JOIN users ON users.name = '$name' AND groupchat.name ='$name' Where chat_room = $chat;";
// $sqll ="SELECT * FROM groupchat INNER JOIN users ON users.name = 'Noblesse' AND groupchat.name ='Noblesse' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  ?>
    
    <div class="container">
      <?php
    while($row = $result->fetch_assoc()) {
      ?>

     
      <div class="chat">
        <?php 
        
      echo "<img src='../client/assets/uploads/" . $row["p_p"] . "' alt='img' class='image' >" ;
      echo "&nbsp";
      echo "&nbsp";
      echo "<a>  " . $row["chats"].  "&nbsp;&nbsp;&nbsp;" .$row['time'] . "</a>"  ;
      
      $idd= "" . $row["id"]. "" ;
      // echo "<p class="users"> Total users : " .$row['name'] ."</p>";
      ?>
      
    </div>
      <div>
     
        <?php
    }
    ?>
 </div>
 </div>
  <?php
}


?>

<?php
$sql="SELECT * FROM users  where name='$namee'";
// $sql="SELECT * FROM groupchat INNER JOIN users ON users.name = '$name' AND groupchat.name ='$name' Where chat_room = $chat;";
// $sqll ="SELECT * FROM groupchat INNER JOIN users ON users.name = 'Noblesse' AND groupchat.name ='Noblesse' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
      $p_p = "" . $row["p_p"] . "";
      echo $p_p;
     
      
    }
}





?>


<!-- <h1 class="b"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam commodi quidem accusamus dolore id? Atque accusantium, dolorem nostrum enim qui quos deleniti modi nulla eligendi obcaecati aliquam explicabo quae? Esse. <h1>
<h1 class="a"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem ullam dolore tempore neque nulla modi repellendus quas nesciunt commodi voluptates expedita eligendi vel quisquam, nihil minus dolores, praesentium beatae eius. </h1> -->
<form action="joinchat.php" method="post" class="message" >
<input type="text" name="chats" class="chat">   <br>

<input type="hidden" name ="name" value="<?php  echo $_SESSION['name'];?>"> <br>
<input type="hidden" name ="chat_room" value="<?php  echo $_SESSION['chat_room'];?>"> <br>
<input type="hidden" name ="p_p" value="<?php  echo  $p_p ?>"> <br>
<input type="submit" name="message">
</form>


<style>
  .container{
  overflow:scroll;
  /* overflow-y:hidden;
  overflow-x:hidden; */
  border:1px solid whitesmoke;
  height:33pc;
  width: 55pc;
  position: relative;
  bottom: 2pc;
  border-radius:10px;
  box-shadow:10px 10px 10px 10px white;
  
  }

  .a{
   
    position: fixed;
    left: 47pc;
    bottom: 22pc;

  }

  .b{
    position: fixed;
    width:20pc;
    bottom: 22pc;
  }
.image{
  border-radius:20px;
  width:30px;
  height:30px;
  
}

.toal_users{
  position: relative;
    left: 80pc;
    background-color: #cdcdcd;
    display: inline-block;
    padding: 9px;
    position: fixed;
    border-radius: 7px;
    width: 11pc;
    
}

li{

    margin-top:2px;
    
}

.message{
  position: fixed;
    left: 288px;
    bottom: 0;
    display: inline;
    display: flex;
    height: 30px;
    margin-bottom: 80px;
    
    
  
}
.chat{
  width: 57pc;
  position:relative;
  padding: 10px;
  
}

.chat a{
  background-color:rgb(219, 218, 218);
  padding: 5px;
  border-radius: 10px;
  
  
}

.users{
  position:relative; 
  left:30pc;
}

.group_name{
  text-align: center;
    font-weight: 500;
    font-family: inherit;
    text-transform: uppercase;
    position: relative;
    top:3pc;
    right:19pc;
}

li{
  list-style-type:none;
}
</style>