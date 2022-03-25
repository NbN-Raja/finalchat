<?php 
   include 'include.php';
  ?>

<body>
    <?php include 'nav.php' ?>

    <!-- <div class="room">
        <a href="assets/video call/index.html"> <i class="fa fa-video-camera" aria-hidden="true"></i> </a>
        <button>  <a href="chat/index.php?<?=$chatWith['name']?> "> Group </a> </button>
    </div> -->


    <div class="maincontainer" style="display: flex;     margin-top: 8pc;     justify-content: space-evenly;">
        <div style="width: 25pc; display: inline-block;">
            <div class="d-flex mb-3 p-3  justify-content-between align-items-center">
                <!-- Login User profile -->
                <div class="d-flex align-items-center">
                    <img src="assets/uploads/<?=$user['p_p']?>" class="w-25 rounded-circle">
                    <h3 class=" fs-xs m-2">
                        <?=$user['name']?>
                        <?=$user['lastname']?>


                    </h3>




                </div>
                <!-- end -->
            </div>
            <div class="input-group mb-3">
                <input type="text" placeholder="Search..." id="searchTextt" name="type" class="form-control">
                <button class="btn btn-primary" id="serachBtn">
                    <i class="fa fa-search"></i>
                </button>
            </div>
            <ul id="chatList" class="list-group mvh-50 overflow-auto" style="top:0">

                <?php if (!empty($conversations)) { ?>
                <?php 
	    			    foreach ($conversations as $conversation){ ?>
                <li class="list-group-item" >
                    <!-- User Search Start From Here  -->
                    <a href="final.php?user=<?=$conversation['username']?>" class="d-flex
		    			justify-content-between
		    			align-items-center p-2">
                        <div class="d-flex
		    			 align-items-center">
                            <img src="assets/uploads/<?=$conversation['p_p']?>" class="w-10 rounded-circle"
                                style="width:4pc;">
                            <h3 class="fs-xs m-2">
                                <?=$conversation['name']?><br>
                                <!-- <?=$conversation['opened']?><br> -->
                                <?php
                        ?>

                                <?php
                               
                            
                                 echo  lastChat  ($_SESSION['user_id'], $conversation['user_id'], $conn);
                                   
                                                        

                                    
                                
                                      
                                    //  if($open ==1){
                                         
                                        // if (['opened'] == 1) {
                                            
                                    
                                 ?>
                                
                                <?php
                                     
                                    
                                    
                                
                          
                        ?>

                    

                            </h3>
                        </div>
                        <?php if (last_seen($conversation['last_seen']) == "Active") { ?>
                        <div title="online">
                            <div class="online"></div>
                        </div>
                        <?php }else{ ?>

                        <div class="offline"></div>
                        <?php  } ?>
                    </a>
                    <!-- End Here -->
                </li>
                <?php } ?>
                <?php }else{ ?>
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