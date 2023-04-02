<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merienda+One">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" rel="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>



    </html>
    <!-- Java Script Here -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="js/ajax.js"></script>
    <!-- End Of Javascript Here  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</html>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../components/include.php';
?>


<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="assets/css/landing_page.css">
<body>
<nav class="navbar navbar-expand-sm navbar-light fixed-top ">
	<a href="../home.php" class="navbar-brand mr-3"><i class="fa fa-cube"></i><b>Chat</b></a>
	

	<form class="navbar-form form-inline mr-4" style="margin-right:30px;">
			<div class="input-group search-box">								
				<input type="text" id="searchText" class="form-control" placeholder="Search by Name">
				<span class="input-group-addon"></span>
			</div>
		</form>
	<!-- Collection of nav links, forms, and other content for toggling -->
	<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start ml-5">
		<div class="navbar-nav">
			<a href="#" class="nav-item nav-link active">Home</a>
		</div>
		<div class="navbar-nav ml-auto mr-5">
			<a href="profile.php" class="nav-item nav-link notifications"><i class="fa fa-bell-o"></i><span class="badge">1</span></a>
			<a href="final_one.php" class="nav-item nav-link messages"><i class="fa fa-envelope-o"></i><span class="badge">1</span></a></a>
			<div class="nav-item dropdown">
				<a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action">
        
            <img src="../client/assets/uploads/<?=$user['p_p']?>"class="w-30 rounded-circle" height="36" width="36">
            <?php echo htmlspecialchars($_SESSION["name"]); ?><b class="caret"></b></a>
				<div class="dropdown-menu">
					<a href="home.php" class="dropdown-item"><i class="fa fa-user-o"></i> Profile</a></a>
					
					<a href="settings.php" class="dropdown-item"><i class="fa fa-sliders"></i> Settings</a></a>
					<div class="dropdown-divider"></div>
					<a href="logout.php" class="dropdown-item"><i class="material-icons">&#xE8AC;</i> Logout</a></a>
				</div>
			</div>
		</div>
	</div>
</nav>

<div class="container">
<div class="maincontainer" style="display: flex;     margin-top: 8pc;     justify-content: space-evenly;">
        <div style="width: 25pc; display: inline-block;">
            <div class="d-flex mb-3 p-3  justify-content-between align-items-center">
                <!-- Login User profile -->
                <div class="d-flex align-items-center">
                    <img src="../client/assets/uploads/<?= $user['p_p'] ?>" class=" image w-25 rounded-circle">
                    <h3 class=" fs-xs m-2">
                        <?= $user['name'] ?>
                        <?= $user['lastname'] ?>
                    </h3>
                </div>
                <!-- end -->
            </div>
            <form class="">
                <div class="input-group mb-3">
                    <input type="text" placeholder="Search..." id="searchTextt" name="type" class="form-control round">

                </div>
                <ul id="chatList" class="absolute search-list">
                    <?php if (!empty($conversations)) { ?>

                        <?php
                        foreach ($conversations as $conversation) { ?>
                        <?php } ?>
                    <?php } else { ?>
                    <?php } ?>
                </ul>
            </form>
            <ul id="chatList" class="list-group mvh-50 overflow-auto" style="top:0">

                <?php if (!empty($conversations)) { ?>
                    <?php
                    foreach ($conversations as $conversation) { ?>
                        <li class="list-group-item">
                            <!-- User Search Start From Here  -->
                            <a href="final.php?user=<?= $conversation['username'] ?>" class="d-flex
		    			justify-content-between
		    			align-items-center p-2">
                                <div class="d-flex
		    			 align-items-center">
                         <img src="../client/assets/uploads/<?=  $conversation['p_p']?>" class="w-10 rounded-circle" style="width:4pc;">

                                    <h3 class="fs-xs m-2">
                                        <?= $conversation['name'] ?><br>
                                        <!-- <?= $conversation['opened'] ?><br> -->
                                        <?php
                                        ?>
                                        <div class="message" style="color: <?php echo $chat['color']; ?>; font-size:15px" 
                                        >
                                            <?php
                                            echo  lastChat($_SESSION['user_id'], $conversation['user_id'], $conn);
                                            ?>
                                        </div>

                                    </h3>
                                </div>
                                    <?php if (isset($chatWith) && last_seen($chatWith['last_seen']) == "Active") { ?>
                                    <div title="online">
                                        <div class="online"> yes</div>
                                    </div>
                                <?php } else { ?>

                                    <div class="offline"> no</div>
                                <?php  } ?>
                            </a>
                            <!-- End Here -->
                        </li>
                    <?php } ?>
                <?php } else { ?>
                    <div class="alert alert-info 
	    				            text-center">
                        <i class="fa fa-comments d-block fs-big"></i>
                        No messages yet, Start the conversation
                    </div>
                <?php } ?>
            </ul>
        </div>

      


    </div>




</div>
    


<style>
    .chat h3 {
        color: white;
    }

    .profile {
        background-color: rgb(180, 175, 175);
        width: 25pc;
    }

    .profile h3 {
        color: white;
    }

    .fs-xs {
        font-size: 25px;
        font-family: inherit;
        font-weight: 500;
    }

    .list-group-item a {
        text-decoration: none;
    }

    .image {
        position: relative;


    }

    .image img {
        box-shadow: 4px 10px 19px 7px #a5a5a5;
    }

    .list-group-item {
        background-color: aliceblue;
    }

    .online {
        color: green;
        height: 10px;
        width: 10px;
        background-color: green;
        border-radius: 50%;
        display: inline-block;
    }

    .offline {
        color: red;
        height: 10px;
        width: 10px;
        background-color: red;
        border-radius: 50%;
        display: inline-block;
    }

    .room {
        position: relative;
        top: 7pc;
        left: 78pc;
        display: inline;
        font-size: 2pc;
    }
    .list-group {
  height: 300px; /* set the height to your desired value */
  overflow-y: auto; /* enable vertical scrolling */
}

</style>












