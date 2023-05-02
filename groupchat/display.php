<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<?php include '../client/nav_header.php' ?>
<link rel="stylesheet" href="../client/assets/css/landing_page.css">
<body>
<nav class="navbar navbar-expand-sm navbar-light fixed-top ">
	<a href="../home.php" class="navbar-brand mr-3"><i class="fa fa-cube"></i><b>Link Up</b></a>
	

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
        
            <img src="../client/assets/uploads/<?=$_SESSION['p_p']?>"class="w-30 rounded-circle" height="36" width="36">
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
// $p_p= $_SESSION['p_p'];
// echo $p_p;
    if(isset($_GET["user_id"]) && isset($_GET["user_id"]))
    {
        $data = $_GET["user_id"];
        $room_name = $_GET["room_name"];    
    }
?>

<a href="index.php"> HOme </a>


<div id="chat-messages"></div>
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


<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $name= $_POST['name'];
    $chats= $_POST['chats'];
    $chat_room= $_POST['chat_room'];
    $room_name= $_POST['room_name'];
    $p_p= $_POST['p_p'];

    $sql = "INSERT  into `groupchat`(`name`,`chats`,`chat_room`,`room_name`,`p_p`) VALUES ('$name', '$chats','$chat_room', ' $room_name','$p_p')";
    $result = mysqli_query($conn,$sql);

    if ($sql) {
        // echo "insert";
    }else{
        echo "nope";
    }
}


?>


<?php
$namee =$_SESSION['name'];
$sql="SELECT * FROM users  where name='$namee'";
// $sql="SELECT * FROM groupchat INNER JOIN users ON users.name = '$name' AND groupchat.name ='$name' Where chat_room = $chat;";
// $sqll ="SELECT * FROM groupchat INNER JOIN users ON users.name = 'Noblesse' AND groupchat.name ='Noblesse' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
      $p_p = "" . $row["p_p"] . ""; 
      
    }
}





?>


<form action="" id="submitform" method="post" class="message" >
<input type="text" name="chats" class="chat" placeholder="message" ><br>

<input type="hidden" name="name" value="<?php echo $_SESSION["name"] ?>" placeholder="name"><br>
 <input type="hidden" name="room_name" value="<?php echo $room_name; ?>" placeholder="name"><br>
 <input type="hidden" name ="p_p" value="<?php  echo  $p_p ?>"> <br>
 <input type="hidden" name="chat_room" value ="<?php echo $data ?>" placeholder="name"><br>
 <input type="submit" name="submit" class="submit" value="Send"><br>

</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
let form = document.querySelector("form");

form.addEventListener("submit", function(event){
  event.preventDefault();
  
  fetch(form.action, {
      method: "post",
      body: //new FormData(form) // for multipart/form-data
      new URLSearchParams(new FormData(form)) //for application/x-www-form-urlencoded
  });
});


  function getChatMessages() {
  $.ajax({
    url: 'display.php',
    type: 'GET',
    data: { user_id: '<?php echo $data; ?>', room_name: '<?php echo $room_name; ?>' },
    success: function(response) {
      $('#chat-messages').html(response);
    }
  });
}

function sendChatMessage() {
  var message = $('#message').val();
  $.ajax({
    url: 'display.php',
    type: 'POST',
    data: { user_id: '<?php echo $id; ?>', room_name: '<?php echo $room_name; ?>', message: message },
    success: function(response) {
      $('#chat-messages').html(response);
      $('#message').val('');
    }
  });
}

        

$(document).ready(function() {
  // Retrieve existing chat messages
  getChatMessages();

  // Send chat message
  $('#send-message').click(function() {
    sendChatMessage();
  });

  // Reload chat messages every 1 second
  setInterval(function() {
    getChatMessages();
  }, 1000);
});



          $(document).ready(function() {

          var container = document.querySelector('.container');
  container.scrollTop = container.scrollHeight;
          })

</script>
<style>


.container{
  overflow:scroll;
  /* overflow-y:hidden;
  overflow-x:hidden; */
  border:1px solid whitesmoke;
  height:33pc;
  width: 55pc;
  position: relative;
  top:4pc;
  border-radius:10px;
  box-shadow:10px 10px 10px 10px white;
  
  }

  .sticky{
      top:0pc;
      position:sticky;
      background-color:#8f2d2d1f;
      border-radius:10px;
      display:flex;
      justify-content:space-between;
      margin-top:10px;
      margin-bottom:10px;
      padding:10px;
  }
  .sticky button{
    border:1px solid red;
    background-color:red;
    color:white;
    border-radius:10px;
  }

form{
    display:flex;
    display: inline-block;
    left: 20pc;
    position: relative;
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
 width: 53pc;
 position:relative;
 padding: 10px;
 left:2.5pc;
 border-radius:20px;
 border:1px solid white;
 
}

.chat a{
 background-color:rgb(219, 218, 218);
 padding: 5px;
 border-radius: 10px;
 list-style: none;
 
 
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

.submit{
  position:relative;
  left:2px;
  color:red;
  background-color:light-blue;
  border:1px solid whitesmoke;
}

.chats{
  background-color: rgb(219, 218, 218);
    padding: 5px;
    border-radius: 10px;
    text-decoration:none;
    list-style-type:none;
}

</style>