<!-- <meta http-equiv="refresh" content="5"/> -->

<?php 
    include 'include.php';
     $chatWith = getUser($_GET['user'], $conn);
     $chats = getChats($_SESSION['user_id'], $chatWith['user_id'], $conn);
      opened($chatWith['user_id'], $conn, $chats);
    include 'nav_header.php';
    include 'nav.php'
	?>
<?php  foreach ($chats as $chat){ 
} ?>
<!-- <p> <?php echo $chat['chat_id']; ?></p> -->
<div class="maincontainer" id="main">
    <div class="firstcolumn">
        <div class="">
            <div class="" style="    display: flex;    ">
                <img src="assets/uploads/<?=$user['p_p']?>" class="w-25 rounded-circle" style="width: 18%!important;">
                <h3 class="fs-xs m-2">
                    <?=$user['name']?>
                </h3>
            </div>
        </div>
        <div class="input-group mt-2">
            <input type="text" placeholder="Search..." id="searchTextt" name="type" class="form-control">
            <button class="btn btn-primary" id="serachBtn">
                <i class="fa fa-search"></i>
            </button>
        </div>
        <ul id="chatList" class="list-group mvh-50 overflow-auto mb-2 shadow-lg p-3 mb-5 bg-white rounded">
            <?php if (!empty($conversations)) { ?>
            <?php  foreach ($conversations as $conversation){ ?>
            <li class="list-group-item">
                <a id="main" href="final.php?user=<?=$conversation['username']?>" class="d-flex justify-content-between align-items-center p-2">
                    <div class="d-flex  align-items-center">
                        <img src="assets/uploads/<?=$conversation['p_p']?>" class="w-10 rounded-circle"
                            style="height: 3pc; width: 3pc;">
                        <h6 class="fs-xs m-2 " style="color:black; font-weight:500; margin-top:3px">
                            <?=$conversation['name']?><br>
                            <p class="text-secondary" style="font-size:12px"> 
                            <?php  echo  lastChat($_SESSION['user_id'], $conversation['user_id'], $conn);
                                            echo $chat['opened'] ;?>
                                        </p>
                        </h6>
                    </div>
                    <?php if (last_seen($conversation['last_seen']) == "Active") { ?>
                    <div title="online">
                        <div class="online"></div>
                    </div>
                    <?php }else{ ?>
                    <div class="offline"> </div>
                    <?php  } ?>
                </a>
            </li>
            <?php } ?>
            <?php }else{ ?>
            <div class="alert alert-info text-center">
                <i class="fa fa-comments d-block fs-big"></i>
                No messages yet, Start the conversation
            </div>
            <?php } ?>
        </ul>


    </div>
    







    <!-- chat app -->
    <div class="chat" id="main">
        <div class="profile_head" style="display:flex ; justify-content: space-between;">
            <div class="profile" style="display:flex">

                <img src="assets/uploads/<?=$chatWith['p_p']?>" class="w-15 rounded-circle">

                <div class="">
                    <h3 class="display-2 fs-sm m-2">
                        <a>
                            <?=$chatWith['name']?>
                        </a> <br>
                        <!-- <div class="d-flex
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
                        </div> -->

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
		border rounded " style="border-radius: 2.25rem!important; display: flex; justify-content: space-between;">
                <a class="rightmessage">
                    <?= base64_decode($chat['message'])?>
                </a> <br>

                <?php 
            $echo =$chat['chat_img'];
            if($echo != ''){
          echo "<img src='assets/chatimg/$echo' style='width: 20pc;' >"; 
            }
           ?>
                <!-- <?=$chat['created_at']?> -->
                <a onclick=" return confirm()" href="deletemsg.php?delmsg=<?php echo $chat['chat_id']; ?>"
                    class="del_btn">Delete</a>
            </p>
            <?php }else{ ?>
            <div class="message" style="display:flex">
                <img src="assets/uploads/<?=$chatWith['p_p']?>" class="w-15 rounded-circle" height="40" ; width="40">
                <p class="ltext border  align-self-end
		rounded " style="border-radius: 2.25rem!important; display: flex; justify-content: space-between;">
                    <a class="leftmessage">
                        <?=
                      base64_decode($chat['message'])
                       ?>
                    </a> <br>
                    <?php 
            $echo =$chat['chat_img'];
            if($echo != ''){
          echo "<img src='assets/chatimg/$echo' style='5pc' >"; 
            }
           ?>
                    <!-- <?=$chat['created_at']?> -->
                    <!-- <a  onclick=" return confirm()" href="deletemsg.php?delmsg=<?php echo $chat['chat_id']; ?>" class="del_btn">Delete</a> -->

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

        <div class="" id="message_box" style="display:flex;">
            
            <input type="text" id="message" class="textbox "accept="image/x-png,image/gif,image/jpeg"   >
            <div class="button">
            <!-- <textarea class="textbox" id="message" class="form-control"> -->
            <button id="start-btn" class="btn  " >
             <img src="assets/img/icon/mic.png" width="30" height="30" style="    background-color: #d3d4d4;
    border-radius: 15px; " > 
                </button>
            <button id="close-btn" class="btn  "> X </button>
            <button id="chat_img" class="btn  " style="background-color:#d3d4d4;">
            <img src="assets/img/icon/image.png" width="30" height="30" style="   background-color: #d3d4d4;
    border-radius: 15px;" > 
        </button>
        </div>
        <div class="">
            <button class="btn " id="sendBtn" onClick ="ManualRefresh();" ><i class="fa fa-send-o" style="color: red ; font-size: 20px;"></i></button>
            <script> 
function ManualRefresh(){
        window.location.reload(100);
    }
            </script>
            </div>
        </div>
        
    </div>


    <div class="profile_detail">
        <div class="image" style="text-align:center;     background-color: azure;">
            <img src="assets/uploads/<?=$chatWith['p_p']?>" width="120" height="90"
                style="border-radius: 50%; margin-left:40px;  text-align:center;    object-fit: cover;"> <br> <br>
            <p style="text-align: center;"> <b>
                    <?=$chatWith['name']?>
                    <?=$chatWith['lastname']?>
                    <div class="d-flex
               	              align-items-center" title="online">

                            <?php
                        if (last_seen($chatWith['last_seen']) == "Active") {
               	    ?>
                            <div class="online"></div>
                            <small class="d-block p-1" style="margin-left: 120px; margin-bottom:10px;">Online</small>
                            <?php }else{ ?>
                            <small class="d-block p-1" style="margin-left: 120px;"   >
                                Active:
                                <?=last_seen($chatWith['last_seen'])?>
                            </small>
                            <?php } ?>
                        </div>
                </b> </p>
                
        </div>


        
        <div class="">
            <p> Gender:
                <?=$chatWith['gender']?> <br>
            </p>
            <div class="">
            </div>
            <p> Email:
                <?=$chatWith['email']?> <br>
            </p>
            <button  class="open_chat_img btn-danger" > 
             Images
                </button>
                <button id="block" class="btn-danger" onclick="disable()">
                 Block
                 <script>
function disable(){
	document.getElementById("message").disabled = "true";
  }
                     </script>
                            </button>
            <div class="fetch_chat_img"> 
                <p  class="close_chat_img"> close </p>
                <?php
                $conn = new mysqli('localhost', 'root','','chat_app_db');
                $to =$chatWith['user_id'] ;
                $from =$_SESSION['user_id'];
                $image = "SELECT DISTINCT `chat_img`  FROM `chats` where (`from_id`='$to' and `to_id`='$from') OR (`to_id`='$to' and `from_id`='$from')" ;
                $result = $conn->query($image);
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        ?> 
                        <div class="image"> 
               <img src="assets/chatimg/<?=$row['chat_img']?>" width="100" height="100"> 
                    </div>
               <?php
                }
                } else {
               echo "0 results";
               }


                ?>
            </button>
        </div>
    </div>
</div>

<style>
.image img{
    border-radius: 50%;
     margin-left:40px;  
     box-shadow: 1px 4px 19px 0px;
    
}
.fetch_chat_img{
    width:20pc;
    background-color:lightgray;
    box-shadow:10px 10px 10px lightgray;
    overflow:scroll;
}
</style>




</div>




<?php  
         $chat_id = $chat['chat_id'];   
  if(isset($_POST['chatimg'])) {
    $from_id = $chat['from_id'];
    $to_id = $chat['to_id'];
    $filename = $_FILES["chat_img"]["name"];
    $tempname = $_FILES["chat_img"]["tmp_name"];    
        $folder = "assets/chatimg/".$filename;
          
    $db = mysqli_connect("localhost", "root", "", "chat_app_db");
  
        // Get all the submitted data from the form
        // $sql = "INSERT INTO chats (chat_img) VALUES ('$filename')";
        $sql =" INSERT INTO  chats (from_id, to_id, chat_img) 
        VALUES ('$from_id','$to_id' ,'$filename' )";
        // $sql ="UPDATE `chats` SET `chat_img` = 'chat_img' WHERE `chats`.`chat_id` = $chat_id";
  
        if($sql){
            echo "run";
        }
        // Execute query
        mysqli_query($db, $sql);
          
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
  }


?>



<form action="" method="post" enctype="multipart/form-data" class="image_upload">
    <input type="hidden" value=" <?php echo  $chat['from_id']   ?>" name="from_id">
    <input type="hidden" value="   <?php  echo  $chat['to_id']    ?>" name="to_id">

     <botton class="btn btn-danger " id="close_img" > X</button>  <br>
    <label for="img_upload">
        <img src="assets\img\messageimg.png" style="    max-width: 40px;">
    </label>
    <input type="file" name="chat_img" id="img_upload"> <br>
    <input type="submit" name="chatimg" class="img_submit"><br>
    
</form>








<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js"
    integrity="sha512-hkvXFLlESjeYENO4CNi69z3A1puvONQV5Uh+G4TUDayZxSLyic5Kba9hhuiNLbHqdnKNMk2PxXKm0v7KDnWkYA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.css"
    integrity="sha512-vEia6TQGr3FqC6h55/NdU3QSM5XR6HSl5fW71QTKrgeER98LIMGwymBVM867C1XHIkYD9nMTfWK2A0xcodKHNA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script>
    // ajax live
    
    




    // Emoji Picker Here  here 
    $('#emoji').emojioneArea({
        pickerPosition: 'top'
    });

    function confirmation() {
        var res = confirmation("Are you sure you want to delete?");
        if (res !== true) {
            window.location.href = "final.php";

        }
    }


    $(document).ready(function () {
        $("#sendBtn").click(function (e) {
            e.preventDefault();
            $(".emojionearea-editor").html('');
        });
    });

    // end Of EMoji Picker 

    // Automatic Scroll Here 
    var height = 0;
    $('.shadow').each(function (i, value) {
        height += parseInt($(this).height());
    });

    height += '1';

    $('.shadow').animate({
        scrollTop: height
    });


    var scrollDown = function () {
        let chatBox = document.getElementById('chatBox');
        chatBox.scrollTop = chatBox.scrollHeight;
        scrollDown();
    }
// End Of Scroll Here 
    $(document).ready(function () {

        $("#sendBtn").on('click', function () {
            message = $("#message").val();
            if (message == "") return;

            $.post("../server/ajax/insert.php", {
                message: message,
                to_id: <?= $chatWith['user_id'] ?>
            },
                function (data, status) {
                    $("#message").val("");
                    $("#chatBox").append(data);
                    scrollDown();
                });
        });

        /** 
        auto update last seen 
        for logged in user
        **/
        let lastSeenUpdate = function () {
            $.get("../server/ajax/update_last_seen.php");
        }
        lastSeenUpdate();
        /** 
        auto update last seen 
        every 10 sec
        **/
        setInterval(lastSeenUpdate, 10000);



        // auto refresh / reload
        let fechData = function () {
            $.post("../server/ajax/getMessage.php", {
                id_2: <?= $chatWith['user_id'] ?>
            },
                function (data, status) {
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


    $('#uploadFile').on('change', function () {
        $('#uploadImage').ajaxSubmit({
            target: "#group_chat_message",
            resetForm: true
        });
    });

// 
// no need to specify document ready
</script>



































<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script.js"></script>
</body>

</html>

<script>
    var speechRecognition = window.webkitSpeechRecognition

    var recognition = new speechRecognition()

    var textbox = $(".textbox")

    var instructions = $("#instructions")

    var content = ''

    recognition.continuous = true

    // recognition is started

    recognition.onstart = function () {

        instructions.text("Voice Recognition is On")

    }

    recognition.onspeechend = function () {

        instructions.text("No Activity")

    }

    recognition.onerror = function () {

        instruction.text("Try Again")

    }

    recognition.onresult = function (event) {

        var current = event.resultIndex;

        var transcript = event.results[current][0].transcript



        content += transcript

        textbox.val(content)

    }

    $("#start-btn").click(function (event) {

        recognition.start();
        $('textarea').show();
        $('#close-btn').show();

    })
    $("#close-btn").click(function (event) {

recognition.stop();
$('#close-btn').hide();

})

$('#chat_img').click(function(event){
    $('.image_upload').show();   
})

$("#close_img").click(function(){
            $(".image_upload").hide();
        });


// display chat image
$(".open_chat_img").click(function (event) {
$('.fetch_chat_img').show();

})

$(".close_chat_img").click(function (event) {
$('.fetch_chat_img').hide();

})

</script>

<style>
    #start-btn{
        background-color: #d3d4d4;
    border-radius: 40px;
    width: 38px;
    height: 2px;
    padding-left: 3px;
    padding-bottom: 27px;
    padding-top: 1px;
    }
    
    #chat_img{
        background-color: #d3d4d4;
    border-radius: 40px;
    width: 38px;
    height: 2px;
    padding-left: 3px;
    padding-bottom: 27px;
    padding-top: 1px;
    }
    textarea{
        display: none;
    position: relative;
    width: 15pc;
    
    }

    #close-btn{
        display: none;
    }
    .image_upload>input[type="file"] {
        display: none;
    }

    .image_upload {
        display: none;
    width:0;
    background-color: white;
    border-radius: 13px;
    padding: 10px;
    left: 27pc;
    position: relative;
    bottom: 17pc;
        
    }

    .image_upload label {
        font-weight: 600;
    }

    .img_submit {
        border-radius: 8px;
        border: 1px solid #f5f5f5;
        background-color: #add8e6;
        margin-top: 10px;
    }

    #chatList {
        top: 0;
    }

    .dblock {
        font-size: 11px;
    }

    body a {
        text-decoration: none;
    }

    .maincontainer {
        display: flex;
        
        margin-top: 25px;
    }

    .firstcolumn {
        position: relative;
        width: 20pc;
    }

    .chat {
        position: relative;
        top: 5pc;
        width: 48pc;
        left: 50px;
    }

    .display-2 {
        font-size: 1.1rem;
    font-weight: 500;
    line-height: 1.0;
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
        font-size: 36px;
        margin: 0px 0px 0px 0px;
    }

    .profile_detail {

        padding: 20px;
        position: relative;
        top: 5pc;
        left: 4pc;
        background-color: white;
        width: 23pc;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }

    .profile_detail h1 {
        font-size: 30px;
        font-weight: 500;
    }

    .profile img {
        width: 43px;
    height: 36px;
    object-fit: cover;
    }

    .profile_head {
        background-color: #d3d3d3;
        border-top-left-radius: 4px;
        border-top-right-radius: 2px;
        height:45px;
    }

    .shadow {
        overflow: auto;
        height: 460px;
        overflow-x: hidden;
        overflow-y: scroll;
        overflow-wrap: anywhere;
        scroll-behavior: smooth;


    }

    #message_box {
        
        background-color: lightgrey;
    margin-top: -1px;
    
    height: 45px;
    position: relative;
    border-bottom-left-radius: 14px;
    border-bottom-right-radius: 14px;
    }
    #message_box input{
        width: 37pc;
    border-radius: 18px;
    border: 1px solid lightgrey;
    height: 2pc;
    margin-top:5px;
    }

    .emojionearea.emojionearea-inline {
        border-radius: 10px;
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
        position: relative;


    }

    .rtext {
        background-color: lightgray;

        --mwp-message-list-profile-start-padding: 16px;
    }



    #sendBtn {
        position: absolute;
        left: 44pc;
        background-color: whitesmoke;
        
        

    }

    .profile {
        display: flex;
        margin-left: 16px;
        margin-top: 9px;
    }

    .leftmessage {
        padding-left: 27px;
        padding: 10px;
    }

    .rightmessage {
        padding-right: 27px;
        padding: 10px;
    }

    .del_btn {
        font-size: 10px;
        margin-top: 10px;
        margin-right: 5px;
    }
    .button{
        background-color:lightgrey;
        border-radius:20px;
        width:6pc;
        height:2pc;
        margin-top:5px;
        margin-left:5px;
    }
    .fetch_chat_img{
        border: 1px solid grey;
    overflow: scroll;
    display: grid;
    display:none;
    }
</style>