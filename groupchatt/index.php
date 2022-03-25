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


$name = $_SESSION['name'];
echo $name;
$conn = new mysqli('localhost', 'root', '', 'chat_app_db');
if(isset($_POST['submit'])){
    $room_name= $_POST['room_name'];
    $name =  $_POST['name'];;

$sql = "INSERT INTO `chat_room` ( `name`,`room_name`) VALUES ( '$name', '$room_name')";
// $_SESSION['room_name'] = $chat_name;
$result =mysqli_query($conn,$sql);
if ($result){
  echo "yo";
} else {
  echo "Error";
}
// echo $_SESSION['room_name'] ;
// if($result){
//   header('location:search_post.php');
// }
// $_SESSION['room'] = '$chat_name';
}
$conn->close();
?>


<div class="flex" style="display:flex;"> 
<div class="groups" >
  <h1> Chat Groups </h1>
<?php require_once 'insert.php'; ?>
</div>


<div class="room">
<form action="index.php" method="post">
  <div class="mb-3">
    <label>Create Chat Room</label>
    <input type="text" class="form-control" name="room_name"  >
    <input type="text" class="form-control" name="name"  value="<?php echo $name; ?>"  >
    <!-- <input type="text" name="chats" value = 'hello' > -->
    <!-- <input type="text" name="chat_room" value = "<?php echo $chat_roomm;  ?>"> -->
    <!-- <div id="emailHelp" class="form-text">create Your Group chat Name .</div> -->
  <button type="submit" name="submit" class="btn btn-primary">Create</button>
  <a href="search.php"> Join Groupchat</a>
</form>
</div>





</div>
</div>
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
  left:19pc;
  padding:10px;
  border:1px solid black;
  background-color:white;
  border-radius: 10px;
  top:14pc;
  height:10pc;
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

</style>







    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- <p> total chats rooms </p> -->






<style>


  </style>




<?php 

if(isset($_post['searchh'])){

  $room_name = $_POST['room_name'];

  // $search ="SELECT * FROM `groupchat` where room_name= '$room_name' AND chat_room = '$chat_roomm'";
  $search ="SELECT * FROM `chat_room` where chat_room = 5;";

  $result = mysqli_query($conn,$search);

  if ($result) {
    echo "<h1> dsfjhds </h1>";
    header('location:display.php');
  }else{
    echo "no result";
  }
 

}


?>


<!-- display chat here
<?php

 
include 'config.php';




$sql="SELECT * FROM `chat_room` where room_name= '$room_name'";
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
      // echo "" .$row['id']."<br>";
      // echo "" .$row['room_name']."";
       $chat_roomm = "" .$row['id']."";
    }
  }
      ?>

<!-- submit Hello World To Group message  -->
<?php


// if(isset($_POST['submit'])){
//   $chat_room= $_POST['chat_room'];
//   $chats =  $_POST['chats'];

// $sqll = "INSERT INTO groupchat ( 'chats','chat_room') VALUES ( '$chats', '$chat_room')";
// // $_SESSION['room_name'] = $chat_name;

// $result =mysqli_query($conn,$sqll);

// // echo $_SESSION['room_name'] ;
// // if($result){
// //   header('location:search_post.php');
// // }

// // $_SESSION['room'] = '$chat_name';

// if ($result) {
// ?>
