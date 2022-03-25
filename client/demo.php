<?php 
    include 'include.php';
     $chatWith = getUser($_GET['user'], $conn);
     $chats = getChats($_SESSION['user_id'], $chatWith['user_id'], $conn);
      opened($chatWith['user_id'], $conn, $chats);

    include 'nav_header.php';
    include 'nav.php'
	?>



    <div class="maincontainer">
        <div class="firstcolumn">
          
                <div class="">
                    <div class="" style="    display: flex;    
                    ">
                        <img src="assets/uploads/<?=$user['p_p']?>" class="w-25 rounded-circle">
                        <h3 class="fs-xs m-2"><?=$user['name']?></h3>
                
                        
                        </div> 
                </div>
                <div class="input-group mt-2">
                    <input type="text" placeholder="Search..." id="searchTextt" name="type" class="form-control">
                    <button class="btn btn-primary" id="serachBtn">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
                <ul id="chatList" class="list-group mvh-50 overflow-auto mb-2">
                    <?php if (!empty($conversations)) { ?>
                    <?php 

    			    foreach ($conversations as $conversation){ ?>
                    <li class="list-group-item">
                        <a href="final.php?user=<?=$conversation['username']?>" class="d-flex
	    				          justify-content-between
	    				          align-items-center p-2">
                            <div class="d-flex
	    					            align-items-center">
                                <img src="assets/uploads/<?=$conversation['p_p']?>" class="w-10 rounded-circle"
                                    style="width: 20%;">
                                <h6 class="fs-xs m-2">
                                    <?=$conversation['name']?><br>
                                    <small>
                                        <?php 

                                        
                                            echo lastChat($_SESSION['user_id'], $conversation['user_id'], $conn);
                                      
                          
                        ?>
                                    </small>
                                </h6>
                            </div>
                        </a>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="script.js"></script>

        





<!-- chat app -->
<div class="chat">
    <div class="profile_head" style="display:flex ; justify-content: space-between;">
        <div class="profile" style="display:flex">

            <img src="assets/uploads/<?=$chatWith['p_p']?>" class="w-15 rounded-circle">

            <div class="">
                <h3 class="display-2 fs-sm m-2">
                   <a>  <?=$chatWith['name']?> </a> <br>
                    <div class="d-flex
               	              align-items-center" title="online">

                        <?php
                        if (last_seen($chatWith['last_seen']) == "Active") {
               	    ?>
                        <div class="online"></div>
                        <small class="d-block p-1">Online</small>
                        <?php }else{ ?>
                        <small class="d-block p-1">
                            Active:
                            <?=last_seen($chatWith['last_seen'])?>
                        </small>
                        <?php } ?>
                    </div>

                </h3>
            </div>
        </div>

       
        
		


    </div>



    <div class="shadow p-4 rounded d-flex flex-column chat-box" id="chatBox">
        <?php 
                     if (!empty($chats)) {
                     foreach($chats as $chat){
                     	if($chat['from_id'] == $_SESSION['user_id'])
                     	{ ?>
                            

        <p class="rtext align-self-end
		border rounded "
        style="border-radius: 2.25rem!important; display: flex; justify-content: space-between;">
           <a class="rightmessage">  <?=$chat['message']?> </a> <br> 
            
            
                <!-- <?=$chat['created_at']?> -->
                <a  onclick=" return confirm()" href="deletemsg.php?delmsg=<?php echo $chat['chat_id']; ?>" class="del_btn">Delete</a>
                
                

           
                


        </p>
        
        <?php }else{ ?>
            <div class="message" style="display:flex">

            
            <img src="assets/uploads/<?=$chatWith['p_p']?>" class="w-15 rounded-circle" height="40"; width="40">
        <p class="ltext border  align-self-end
		rounded " 
        style="border-radius: 2.25rem!important; display: flex; justify-content: space-between;">

        <a class="leftmessage">  <?=$chat['message']?> </a> <br>
            
        

                <!-- <?=$chat['created_at']?> -->
                <a  onclick=" return confirm()" href="deletemsg.php?delmsg=<?php echo $chat['chat_id']; ?>" class="del_btn">Delete</a>
            
        </p>
        </div>
        <?php } 
                     }	
    	        }else{ ?>
        <div class="alert alert-info  text-center">
            <i class="fa fa-comments d-block fs-big"></i>
            No messages yet, Start the conversation
        </div>
        <?php } ?>
    </div>
    
      
        <div class="" id="message_box">
            <input  id="message" class="form-control"></textarea>
   
        <button class="btn " id="sendBtn">
            <i class="fa fa-send-o" style="color: red;"></i>
            
        </button>
        </div>
        
        </form>
          </div>
		  <div class="profile_detail" >
    <div class="image">
        <img src="assets/uploads/<?=$chatWith['p_p']?>" width="120" height="90" style="border-radius: 50%; margin-left:40px;     object-fit: cover;"> <br> <br>
		<p style="text-align: center;"  > <b> <?=$chatWith['name']?>  <?=$chatWith['lastname']?></b>   </p>
	</div>
    <div class="">
        <p> Gender:<?=$chatWith['gender']?> <br></p>
        <div class="">
        </div>
        <p> Email:<?=$chatWith['email']?> <br></p>
    </div>
</div>
          </div>

		 




          </div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js" integrity="sha512-hkvXFLlESjeYENO4CNi69z3A1puvONQV5Uh+G4TUDayZxSLyic5Kba9hhuiNLbHqdnKNMk2PxXKm0v7KDnWkYA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.css" integrity="sha512-vEia6TQGr3FqC6h55/NdU3QSM5XR6HSl5fW71QTKrgeER98LIMGwymBVM867C1XHIkYD9nMTfWK2A0xcodKHNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script>
// Emoji Picker Here  here 
$('#message').emojioneArea({
    pickerPosition:'top'
});

function confirmation(){
    var res = confirmation("Are you sure you want to delete?");
    if(res !==true){
        window.location.href = "final.php";

    }
}


$(document).ready(function() {
     $("#sendBtn").click(function(e) {
        e.preventDefault();
       $(".emojionearea-editor").html('');
     });
  });




// Upload Image Here 
$('#uploadFile').on('change', function(){
    $('#uploadImage') . ajaxSubmit({
        resetForm:true
    });
});


var scrollDown = function() {
    let chatBox = document.getElementById('chatBox');
    chatBox.scrollTop = chatBox.scrollHeight;
}

scrollDown();

$(document).ready(function() {

    $("#sendBtn").on('click', function() {
        message = $("#message").val();
        if (message == "") return;

        $.post("../server/ajax/insert.php", {
                message: message,
                to_id: <?=$chatWith['user_id']?>
            },
            function(data, status) {
                $("#message").val("");
                $("#chatBox").append(data);
                scrollDown();
            });
    });

    /** 
    auto update last seen 
    for logged in user
    **/
    let lastSeenUpdate = function() {
        $.get("../server/ajax/update_last_seen.php");
    }
    lastSeenUpdate();
    /** 
    auto update last seen 
    every 10 sec
    **/
    setInterval(lastSeenUpdate, 10000);



    // auto refresh / reload
    let fechData = function() {
        $.post("../server/ajax/getMessage.php", {
                id_2: <?=$chatWith['user_id']?>
            },
            function(data, status) {
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


$('#uploadFile').on('change', function() {
    $('#uploadImage').ajaxSubmit({
        target: "#group_chat_message",
        resetForm: true
    });
});

// 
// no need to specify document ready






</script>



<?php

//upload.php

if(!empty($_FILES))
{
 if(is_uploaded_file($_FILES['uploadFile']['tmp_name']))
 {
  $_source_path = $_FILES['uploadFile']['tmp_name'];
  $target_path = 'assets/upload/' . $_FILES['uploadFile']['name'];
  if(move_uploaded_file($_source_path, $target_path))
  {
   echo '<p><img src="'.$target_path.'" class="img-thumbnail" width="200" height="160" /></p><br />';
  }
 }
}

?>




<style>

    #chatList{
        top:0;
    }
.dblock{
    font-size: 11px;
}
body a {
    text-decoration: none;
}

.maincontainer {
    display: flex;
    justify-content: space-around;
}

.firstcolumn {
    position: relative;
    width: 20pc;
}

.chat {
    position: relative;
    top: 5pc;
    width: 48pc;
}

.display-2 {
    font-size: 1.5rem;
    font-weight: 500;
    line-height: 1.1;
}

.online {
    color: green;
    height: 10px;
    width: 10px;
    background-color: green;
    border-radius: 50%;
    display: inline-block;
}

.room {
    font-size: 36px;
    margin: 0px 0px 0px 0px;
}

.profile_detail {

    padding: 20px;
    position: relative;
    top: 5pc;
}

.profile_detail h1 {
    font-size: 30px;
    font-weight: 500;
}

.profile img {
    width: 60px;
    height: 60px;
    object-fit: cover;
}
.profile_head{
      background-color: #0d6efd;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
}

.shadow {
    overflow: scroll;
    height: 460px;
    overflow-x: hidden;
}

#message_box {
    background-color: rgb(211, 212, 212);
     margin-top: 10px;
     border-radius: 25px;
}

.emojionearea.emojionearea-inline{
    border-radius:10px;
}

.input-group textarea {
    height: 2pc;
    border-radius: 2.5rem;
    background-color: #d3d1d1;
    

}
::-webkit-scrollbar {
  width: 10px;
}
#chatBox {
    background-color: rgb(253 254 255);
}

.ltext {
    background-color: lightblue;
    width: 11pc;
}

.rtext {
    background-color: lightgray;
}

#sendBtn{
    position: absolute;
    left: 44pc;
    bottom:0pc;
    
}

.profile{
    display: flex;
    margin-left: 16px;
    margin-top: 9px;
}

.leftmessage{
    padding-left: 27px;
    padding: 10px;
}

.rightmessage{
    padding-right: 27px;
    padding: 10px;
}

.del_btn{
    font-size: 10px;
    margin-top: 10px;
    margin-right: 5px;
}
</style>
