
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
<div class="sidenav">
<!-- <img src="assets/uploads/<?=$user['p_p']?>"  style="height:20pc; width:20pc;"> -->
<h3> Settings </h3>
<div class="buttonn">
<button >   Privacy </button> <br> <br>
<button class="open"> Device </button> <br> <br>
<button class="open"> <a href="#contact">  Contact Us  </a></button>

</div>



</div>
<div class="detail">
  <p> General Settings </p>
    <label> Username </label>  :"> 
    <?php echo $username ?>  <br>
    <label> Name </label>  :">  
    <?php echo $name ?>  <?php echo $lastname ?><br> 
    <label> Gender </label>  :">  
    <?php echo $gender ?>  <br>
    <label> Email </label>  :">
    <?php echo $email ?>  <br>
    <form action="" method="post">
    <label> Reset Password </label> <br>
    <Button> <a href="password_reset.php">  Reset Password</a> </button>
    </div>

  


</form>

</div>

<script src="https://cdn.tailwindcss.com"></script>

<div class="" id="contactus">
<section class="text-gray-600 body-font relative">
  <div class="containerr px-5 py-24 mx-auto ml-1">
  <form action="" method="post">
    <div class="lg:w-1/2 md:w-2/3 mx-auto">
    <h1> Contact Us </h1>
      <div class="flex flex-wrap -m-2">
     
        <div class="p-2 w-1/2">
          <div class="relative">
            <label for="name"  name="name" class="leading-7 text-sm text-gray-600">Name</label>
            <input type="text" id="name" name="name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
        </div>
        <div class="p-2 w-1/2">
          <div class="relative">
            <label for="email" name="email" class="leading-7 text-sm text-gray-600">Email</label>
            <input type="email" id="email" name="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
        </div>
        <div class="p-2 w-full">
          <div class="relative">
            <label for="message" name="message" class="leading-7 text-sm text-gray-600">Message</label>
            <textarea id="message" name="message" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
          </div>
        </div>
        <div class="p-2 w-full">
         
          <input class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg" type="submit" name="submit">
        </div>
        <div class="p-2 w-full pt-8 mt-8 border-t border-gray-200 text-center">
          <a class="text-indigo-500"></a>
          <p class="leading-normal my-5">
            <br>
          </p>
          <span class="inline-flex">
            <a class="text-gray-500">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
              </svg>
            </a>
            <a class="ml-4 text-gray-500">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
              </svg>
            </a>
            <a class="ml-4 text-gray-500">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
              </svg>
            </a>
            <a class="ml-4 text-gray-500">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
              </svg>
            </a>
          </span>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
</form>



<!-- Php for contact  -->

<?php 

$server = "localhost";
$username = "root";
$password = "";
$database = "chat_app_db";

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) { // If Check Connection
    die("<script>alert('Connection Failed.')</script>");
}

?>

<?php 

// error_reporting(0); // For not showing any error

if (isset($_POST['submit'])) { // Check press or not Post Comment Button
	
	$name = $_POST['name']; // Get Name from form
	$email = $_POST['email']; // Get Comment from form
	$message = $_POST['message']; // Get pic from form
	

	$sql = "INSERT INTO `contact` ( `name`,`email`,`message`)
			VALUES ('$name', '$email','$message')";

			// $sql = "UPDATE images SET images.id,images.name, images.comment  WHERE images.comment = '$comment''";
	$result = mysqli_query($conn, $sql);
	
	
}



?>



<div class="device" id="device">
<button id="close"> X </button>  <br>
<?php
 

 $query = @unserialize (file_get_contents('http://ip-api.com/php/'));
 if ($query && $query['status'] == 'success') {
 echo 'Your Device Info <br> <h1>' . $query['country'] . ', ' . $query['city'] . '</h1>';
 }
 foreach ($query as $data) {
     echo $data . "<br>";
 }



 
 ?>

 

</div>

<script>
  $(".open").click(function(){
  $("#device").show(); 
});

$("#close").click(function(){
  $("#device").hide(); 
});

</script>














<style>

  .device{
    display:none;
    background-color: white;
    text-align: center;
    display: inline-block;
    width: 34pc;
    left: 41pc;
    position: relative;
    bottom: 67pc;

  }
  .close{
    margin-left:10pc;
  }

  body{
    background-color:#eeeeee;
  }
.container{
  display:flex;
  justify-content: space-between;
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
    position: relative;
    right:10pc;
}


img{
	height:2pc;
	width:3pc;
}
.img{
	text-align:center;
}
.sidenav{
  background-color: #ffffff;
    padding: 28px;
    border-radius: 10px;
    width: 13pc;
}

.buttonn button{
  width: 10pc;
    background-color: #fbfbff;
    border: 1px solid whitesmoke;
    font-family: serif;
    font-weight: 500;
    font-size: 21px;
    text-align: inherit;
}


#contactus{
  margin-left:394px;
}

  </style>