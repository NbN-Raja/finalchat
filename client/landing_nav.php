
<?php

$username = $_SESSION['username'];



if (isset($_SESSION['username'])) {
    # database connection file
    include 'server/db.conn.php';
    include 'server/helpers/user.php';
    include 'server/helpers/conversations.php';
    include 'server/helpers/timeAgo.php';
    include 'server/helpers/last_chat.php';
    include 'server/helpers/chat.php';
    # Getting User data data
    $user = getUser($_SESSION['username'], $conn);
    # Getting User conversations
    $conversations = getConversation($user['user_id'], $conn);

?>
<?php } ?>


<!DOCTYPE html>
<html lang="en">
<?php include 'nav_header.php' ?>
<link rel="stylesheet" href="assets/css/landing_page.css">
<body>
<nav class="navbar navbar-expand-sm navbar-light fixed-top ">
	<a href="landing_page.php" class="navbar-brand mr-3"><i class="fa fa-cube"></i><b>Chat</b></a>
	

	<form class="navbar-form form-inline mr-4 relative">
			<div class="input-group search-box">								
				<input type="search" id="searchText" class="form-control" placeholder="Search by Name">
				<span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
			</div>
			<ul id="chatList" class="absolute search-list">
                <?php if (!empty($conversations)) { ?>
                <?php 
    			    foreach ($conversations as $conversation){ ?>
                <?php } ?>
                <?php }else{ ?>
                <?php } ?>
            </ul>
		</form>
	<!-- Collection of nav links, forms, and other content for toggling -->
	<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start ml-5">
		<div class="navbar-nav">
		<a href="#" class="nav-item nav-link active"> Home</a> 
		</i>
			<a href="video.php" class="nav-item nav-link">Video</a>
		</div>
		<div class="navbar-nav ml-auto mr-5">
	
			<a href="notification.php" class="nav-item nav-link notifications"  ><i class="fa fa-bell-o"></i><span class="badge">
			<?php


$conn =new mysqli( 'localhost', 'root','','chat_app_db');
$sqll="SELECT count(description) as open FROM `global_notify`";
$result= mysqli_query($conn,$sqll);

if (mysqli_num_rows($result) > 0) {
    while ($row= mysqli_fetch_assoc($result)) {
        
        echo "".$row['open']. "<br>";
		echo "";
		
		
    }
}



?>



			
			</span></a>
			<a href="client/final_one.php" class="nav-item nav-link messages"><i class="fa fa-envelope-o"></i><span class="badge"> 
			<?php

$from_id= $_SESSION['user_id'];
$conn =new mysqli( 'localhost', 'root','','chat_app_db');
$sql="SELECT count(opened) as open FROM `chats` WHERE to_id = $from_id and opened = 0";
$result= mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
    while ($row= mysqli_fetch_assoc($result)) {
        
        echo "".$row['open']. "<br>";
		echo "msg";
		
		
    }
}



?></span></a></a>
			<div class="nav-item dropdown">
				<a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action">
        
            <img src="client/assets/uploads/<?=$user['p_p']?>"class="w-30 rounded-circle" height="36" width="36">
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


	
	<?PHP $from_id = $_SESSION['user_id']; 
	ECHO $from_id;?>
</nav>


<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<script>
            
              
			setTimeout(function() {
    $('#message').fadeOut('fast');
}, 1000);

var audio = new Audio('http://www.rangde.org/static/bell-ring-01.mp3');
    audio.play();
        </script>

		<style>

    #message{
		background-color:red;
		color:white;
		font-weight:500px;
		border-radius:15px;


    }

	.search-list {
		position: absolute;
		top: 63px;
		width: 320px;
		/* display: flex; */
		/* display: none; */
	}
		</style>

 

<!-- // session_start();

// # check if the user is logged in
// if (isset($_SESSION['username'])) {
	
// 	# database connection file
// 	include '../db.conn.php';

// 	# get the logged in user's username from SESSION
// 	$id = $_SESSION['user_id'];

// 	$sql = "UPDATE users
// 	        SET last_seen = NOW() 
// 	        WHERE user_id = ?";
// 	$stmt = $conn->prepare($sql);
// 	$stmt->execute([$id]);

// }else {
// 	header("Location: ../../index.php");
// 	exit;
// } -->

