<?php
include 'include.php';
?>

<body>
    <?php include 'nav.php' ?>


   


    <div class="maincontainer" style="display: flex;     margin-top: 8pc;     justify-content: space-evenly;">
        <div style="width: 25pc; display: inline-block;">
            <div class="d-flex mb-3 p-3  justify-content-between align-items-center">
                <!-- Login User profile -->
                <div class="d-flex align-items-center">
                    <img src="assets/uploads/<?= $user['p_p'] ?>" class=" image w-25 rounded-circle">
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
                                    <img src="assets/uploads/<?= $conversation['p_p'] ?>" class="w-10 rounded-circle" style="width:4pc;">
                                    <h3 class="fs-xs m-2">
                                        <?= $conversation['name'] ?><br>
                                        <!-- <?= $conversation['opened'] ?><br> -->
                                        <?php
                                        ?>
                                        <div class="message" style="color:black; font-size:15px">
                                            <?php
                                            echo  lastChat($_SESSION['user_id'], $conversation['user_id'], $conn);
                                            ?>
                                        </div>

                                    </h3>
                                </div>
                                <?php 
                                 // Check if the user is active based on their last_seen timestamp
            $is_active = (strtotime($conversation['last_seen']) > (time() - 60));
            // Set the label text and color based on whether the user is active or not
            $label_text = $is_active ? "Active" : "Inactive";
            $label_color = $is_active ? "green" : "red"; ?>
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

        <div class="image">
            <img src="assets/img/chatimg.jpg" alt="" srcset="" width="600" height="500">
        </div>


    </div>
</body>

</html>
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
</style>










<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="script.js"></script>



<?php

// $con= new mysqli('localhost','root','','chat_app_db');
// $query ="select count(opened) from chats   where `opened`=0 AND from_id = lastChat['from_id']";

// $result = mysqli_query($con,$query);
//   $row = mysqli_fetch_assoc($result);
//   echo "<td>" . $row['COUNT(opened)'] . "</td>";


?>

<?= $conversation['name'] ?><br>
<?php

$from_id = $_SESSION['user_id'];
$conn = new mysqli('localhost', 'root', '', 'chat_app_db');
$sql = "SELECT count(opened) as open, MAX(message) as messages FROM `chats` WHERE to_id = $from_id and opened = 0";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        // echo "".$row['open']. "<br>";

        $message =  "" . $row['messages'] . "<br>";
        //    echo base64_decode($message); 
        // echo "msg";


    }
}



?>

<?php include 'final/partials/messagerequest.php' ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
	var scrollDown = function(){
        let chatBox = document.getElementById('chatBox');
        chatBox.scrollTop = chatBox.scrollHeight;
	}

	scrollDown();

	$(document).ready(function(){
      
      $("#sendBtn").on('click', function(){
      	message = $("#message").val();
      	if (message == "") return;

      	$.post("app/ajax/insert.php",
      		   {
      		   	message: message,
      		   	to_id: <?=$chatWith['user_id']?>
      		   },
      		   function(data, status){
                  $("#message").val("");
                  $("#chatBox").append(data);
                  scrollDown();
      		   });
      });

      /** 
      auto update last seen 
      for logged in user
      **/
      let lastSeenUpdate = function(){
      	$.get("app/ajax/update_last_seen.php");
      }
      lastSeenUpdate();
      /** 
      auto update last seen 
      every 10 sec
      **/
      setInterval(lastSeenUpdate, 10000);



      // auto refresh / reload
      let fechData = function(){
      	$.post("app/ajax/getMessage.php", 
      		   {
      		   	id_2: <?=$chatWith['user_id']?>
      		   },
      		   function(data, status){
                  $("#chatBox").append(data);
                  if (data != "") scrollDown();
      		    });
      }

      fechData();
      /** 
      auto update last seen 
      every 0.5 sec
      **/
      setInterval(fechData, 500);
    
    });
</script>