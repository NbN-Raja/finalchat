<?php 
session_start();
?>


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


$namee=$_SESSION['name'];

if(isset($_POST['submit'])){

$chat_name = $_POST['chat_name'];



$sql="SELECT * FROM groupchat where chat_room=$chat_name LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "<h1 style='margin-top:5pc;'>Group Chat Found </h1>";
    while($row = $result->fetch_assoc()) {
      echo  "  : <h4 style='color:red;'>  ".$row['room_name']. "</h4>";
      echo '<button  class="btn btn-primary"  onclick="myFunction()">Join Chat</button>';
      

      $idd= "" . $row["chat_room"]. "" ;
      $_SESSION['chat_room'] = "" . $row["chat_room"]. ""; 
      // echo $_SESSION['room'];
      
      // echo "<p style='position:relative; left:30pc;'> Total users : " .$row['name'] ."</p>";
    }
}
}

// if(isset($_POST['message'])){

//   $idd=$_POST['chat_room'];
//   $chats= $_POST['chats'];



//   $sql = "INSERT INTO groupchat (chat_room,chats)
//   VALUES ('$idd','$chats')";

// $result = mysqli_query($conn,$sql);

 

// }
// if(isset($_POST['submit'])){

//   $chat_name = $_POST['chat_name'];

// $sql="SELECT * FROM `group_chat` where room_name = $chat_name ORDER BY chat_room  DESC
// LIMIT 1;";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     // output data of each row
//     while($row = $result->fetch_assoc()) {
//       echo "id: " . $row["id"]. " - Name: " . $row["chats"]. "" .$row['chat_room']. "";
//       $idd= "" . $row["chat_room"]. "" ;
//       $_SESSION['chat_room'] = "" . $row["chat_room"]. ""; 
//       // echo $_SESSION['room'];
      
//       // echo "<p style='position:relative; left:30pc;'> Total users : " .$row['name'] ."</p>";
//     }
// }
// if($result){
  
//   header("location:joinchat.php");
// }

// }



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
      // echo $p_p;
    }
}

?>
      

<div class="room">
<form action="" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">search Chat Room</label>
    <input type="text" class="form-control" name="chat_name" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">create Your Group chat Name .</div>
  </div>
  <button type="submit" name="submit" class="btn btn-primary" >search</button>
  
</form>
</div>




<div id="myDIV" >
<form action="joinchat.php" method="post">

<!-- <label> Send Message Here </label> <br> -->
<p id="connect"> Connecting  Please Wait</p>
<input type="hidden" name="chats"  value=" <?php echo  $namee  ?> Joined Chat!!" placeholder="send chats">   <br>

<input type="hidden" name ="chat_room" value="<?php echo $idd ?>"> <br> 
<div class="loader" id="loader"></div>
<p id="join"> You Can Join now ☺☺ </p> 
<input type="hidden" name ="p_p" value="<?php  echo  $p_p ?>"> <br>
 <input type="submit" id="proceed" class="btn btn-primary" name="message" value="Join">
</form>
<?php echo   $_SESSION['chat_room']; ?>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<a href="http://localhost/final/groupchat/index.php"> h </a>

<style>
body{
  background-color:#ededed;
}
.display{
  border:1px solid black;
}
.room{
  width:20pc;
  position: relative;
  left:35pc;
  padding:10px;
  border:1px solid black;
  background-color:white;
  border-radius: 10px;
  top:12pc;
}
.groups{
  overflow:scroll; 
  overflow-x:hidden;
  height:20pc;
  position:relative;
  top:10pc;
  width:35pc;
  left:3pc;
}
.groups h1{
  position:sticky;
  top:0;
  text-align:center;
}
.groups::-webkit-scrollbar {
    display: none;
}

#myDIV{
  
  background-color: white;
    display: inline-block;
    padding: 14px;
    position: relative;
    left: 34pc;
    height: 25pc;
    width:25pc;
    bottom:5pc;
    border-radius:15px;
    display:none;
}

.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 150px;
  height: 150px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
  margin-left:90px;
  position:relative;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}


#proceed {
  display: none;
}

#join {
  display: none;
}

</style>

<script>
   function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}


$(document).ready(function() {
  setTimeout(function() {
    $("#proceed").show();
  }, 4000);
});
$(document).ready(function() {
  setTimeout(function() {
    $("#join").show();
  }, 3000);
});


$(document).ready(function() {
        document.getElementById('loader').style.display = "flex";
        $("#loader").delay(3000).fadeOut(2000)
 });
$(document).ready(function() {
        document.getElementById('loader').style.display = "flex";
        $("#connect").delay(3000).fadeOut(2000)
 });

</script>
