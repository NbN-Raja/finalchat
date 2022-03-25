
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

    # Getting User data data
    $user = getUser($_SESSION['username'], $conn);

    # Getting User conversations
    $conversations = getConversation($user['user_id'], $conn);

?>
<?php } ?>






<body>
<?php include 'nav.php' ?>

<!-- Edit Profile System Here -->
<?php 
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chat_app_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT user_id,name, username,lastname, password,email,gender, p_p ,last_seen FROM users WHERE user_id= '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $imageURL = 'uploads/'.$row["p_p"];
    $name= "".$row["name"];
    $lastname= "".$row["lastname"];
    $gender= "".$row["gender"];
    $email= "".$row["email"];
    $username = "" .$row["username"];
}
} else {
  echo "0 results";
}
$conn->close();
?>

<div class="container" >
<div class="image">
<img src="assets/uploads/<?=$user['p_p']?>"  style="height:20pc; width:20pc;">
</div>
<div class="detail">
    <label> Username </label>  <br> 
    <input type="text" value="<?php echo $username ?> " > <br>
    <label> Name </label>  <br> 
    <input type="text" value="<?php echo $name ?> " > <br>
    <label> Gender </label>  <br> 
    <input type="text" value="<?php echo $gender ?> " > <br>
    <label> Email </label>  <br> 
    <input type="text" value="<?php echo $email ?> " > <br>
    <form action="" method="post">
    <label> Reset Password </label> <br>
    <Button> <a href="password_reset.php">  Reset Password</a> </button>
    </div>
</form>

</div>

<style>

  body{
    background-color:#eeeeee;
  }
.container{
  display:flex;
  justify-content: space-evenly;
   margin:2pc;
   position:relative;
   top:5pc;
}
input{
  width: 24pc;
  border:1px solid white;
  background-color:#efefef;
  border-radius:5px;
}

label{
  font-size: 20px;
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}
.detail{
  background-color: #ffffff;
    padding: 28px;
    border-radius: 10px;
    width: 30pc;
}


img{
	height:2pc;
	width:3pc;
}
.img{
	text-align:center;
}

  </style>