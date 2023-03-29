<!-- <meta http-equiv="refresh" content="5"/> -->











<?php
include 'include.php';
$chatWith = getUser($_GET['user'], $conn);
$chats = getChats($_SESSION['user_id'], $chatWith['user_id'], $conn);
opened($chatWith['user_id'], $conn, $chats);
include 'nav_header.php';
include 'nav.php'
?>
<?php foreach ($chats as $chat) {
} ?>
<!-- <p> <?php echo $chat['chat_id']; ?></p> -->
<div class="maincontainer" id="main">

    <!-- first Column here  -->

    <?php include 'final/firstcolumn.php' ?>








    <!-- chat app -->
    <div class="chat" id="main">

        <!-- Profile Head php -->
        <?php include 'final/profile_head.php' ?>

        <!-- chat Box here  -->
        <?php include 'final/chatbox.php' ?>






        <!-- message Box here  -->
        <div class="" id="message_box" style="display:flex;">
<button id="start-btn" class="btn  " >
             <img src="assets/img/icon/mic.png" width="30" height="30" style="        background-color: #f4ffff;
    border-radius: 0px; " > 
                </button>
            <button id="close-btn" class="btn  "> X </button>
            <button id="chat_img" class="btn  " style="background-color:#d3d4d4;">
            <img src="assets/img/icon/image.png" width="30" height="30" style="       background-color: #f4ffff;
    border-radius: 0px;" > 
        </button>
            
            <input type="text" id="message" class="textbox "  id="instructions" >
           
        
            <button class="btn " id="sendBtn"  ><i class="fa fa-send-o" style="color: red ; font-size: 20px;"></i></button>
            
            
        </div>

    </div>

    <!-- profilke user detailes here  -->
    <?php include 'final/profile_detail.php' ?>



   




</div>








<form action="" method="post" enctype="multipart/form-data" class="image_upload">
    <input type="hidden" value=" <?php echo  $chat['from_id']   ?>" name="from_id">
    <input type="hidden" value="   <?php echo  $chat['to_id']    ?>" name="to_id">

    <botton class="btn btn-danger " id="close_img"> X</button> <br>
        <label for="img_upload">
            <img src="assets\img\messageimg.png" style="    max-width: 40px;">
        </label>
        <input type="file" name="chat_img" id="img_upload"> <br>
        <input type="submit" name="chatimg" class="img_submit"><br>

</form>
<?php

if (isset($_POST['chatimg'])) {
    $from_id = $chat['from_id'];
    $to_id = $chat['to_id'];
    $filename = $_FILES["chat_img"]["name"];
    $tempname = $_FILES["chat_img"]["tmp_name"];
    $folder = "assets/chatimg/" . $filename;

    $db = mysqli_connect("localhost", "root", "", "chat_app_db");

    // Get all the submitted data from the form
    // $sql = "INSERT INTO chats (chat_img) VALUES ('$filename')";
    $sql = " INSERT INTO  chats (from_id, to_id, chat_img) 
        VALUES ('$from_id','$to_id' ,'$filename' )";
    // $sql ="UPDATE `chats` SET `chat_img` = 'chat_img' WHERE `chats`.`chat_id` = $chat_id";

    if ($sql) {
        echo "success";
    } else {
        echo "img upload failed";
    }
    // Execute query
    mysqli_query($db, $sql);

    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        $msg = "Image uploaded successfully";
    } else {
        $msg = "Failed to upload image";
    }
}


?>








<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js" integrity="sha512-hkvXFLlESjeYENO4CNi69z3A1puvONQV5Uh+G4TUDayZxSLyic5Kba9hhuiNLbHqdnKNMk2PxXKm0v7KDnWkYA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.css" integrity="sha512-vEia6TQGr3FqC6h55/NdU3QSM5XR6HSl5fW71QTKrgeER98LIMGwymBVM867C1XHIkYD9nMTfWK2A0xcodKHNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script>
    // ajax live






    // Emoji Picker Here  here 
    $('#message').emojioneArea({
        pickerPosition: 'top'
    });

    function confirmation() {
        var res = confirmation("Are you sure you want to delete?");
        if (res !== true) {
            window.location.href = "final.php";

        }
    }


    $(document).ready(function() {
        $("#sendBtn").click(function(e) {
            e.preventDefault();
            $(".emojionearea-editor").html('');
        });
    });

    // end Of EMoji Picker 

    // Automatic Scroll Here 
    var height = 0;
    $('.shadow').each(function(i, value) {
        height += parseInt($(this).height());
    });

    height += '1';

    $('.shadow').animate({
        scrollTop: height
    });


    var scrollDown = function() {
        let chatBox = document.getElementById('chatBox');
        chatBox.scrollTop = chatBox.scrollHeight;
        scrollDown();
    }
    // End Of Scroll Here 
    $(document).ready(function() {

        $("#sendBtn").on('click', function() {
            message = $("#message").val();
            if (message == "") return;

            $.post("../server/ajax/insert.php", {
                    message: message,
                    to_id: <?= $chatWith['user_id'] ?>
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
                    id_2: <?= $chatWith['user_id'] ?>
                },
                function(data, status) {
                    $("#chatBox").append(data);
                    $(".message").append(data);
                    $(".leftmessage").append(data);

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

    recognition.onstart = function() {

        instructions.text("Voice Recognition is On")

    }

    recognition.onspeechend = function() {

        instructions.text("No Activity")

    }

    recognition.onerror = function() {

        instruction.text("Try Again")

    }

    recognition.onresult = function(event) {

        var current = event.resultIndex;

        var transcript = event.results[current][0].transcript



        content += transcript

        textbox.val(content)

    }

    $("#start-btn").click(function(event) {

        recognition.start();
        $('textarea').show();
        $('#close-btn').show();

    })
    $("#close-btn").click(function(event) {

        recognition.stop();
        $('#close-btn').hide();

    })

    $('#chat_img').click(function(event) {
        $('.image_upload').show();
    })

    $("#close_img").click(function() {
        $(".image_upload").hide();
    });


    // display chat image
    $(".open_chat_img").click(function(event) {
        $('.fetch_chat_img').show();

    })

    $(".close_chat_img").click(function(event) {
        $('.fetch_chat_img').hide();

    })
</script>

<style>
    #start-btn {
        background-color: #d3d4d4;
        border-radius: 40px;
        width: 38px;
        height: 2px;
        padding-left: 3px;
        padding-bottom: 27px;
        padding-top: 1px;
    }

    #chat_img {
        background-color: #d3d4d4;
        border-radius: 40px;
        width: 38px;
        height: 2px;
        padding-left: 3px;
        padding-bottom: 27px;
        padding-top: 1px;
    }

    textarea {
        display: none;
        position: relative;
        width: 15pc;

    }

    #close-btn {
        display: none;
    }

    .image_upload>input[type="file"] {
        display: none;
    }

    .image_upload {
        display: none;
        width: 0;
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

        margin-top: -17px;
    }

    .firstcolumn {
        position: relative;
        width: 20pc;
    }

    .chat {
        position: relative;
        top: 5pc;
        width: 53pc;
        left: 39px;
        height: 20px
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
        margin-top: 31px;
    }

    .offline {
        color: red;
        height: 10px;
        width: 10px;
        background-color: red;
        border-radius: 50%;
        display: inline-block;
        margin-top: 31px;
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
        width: 18pc;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        height: 620px
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

        border-top-left-radius: 4px;
        border-top-right-radius: 2px;
        height: 60px;
        box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);
    }

    .shadow {
        overflow: auto;
        height: 540px;
        overflow-x: hidden;
        overflow-y: scroll;
        overflow-wrap: anywhere;
        /* scroll-behavior: smooth; */


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
        /* background-color: lightblue; */
        --mwp-message-list-profile-start-padding: 16px;
        /* background-image: linear-gradient(to right, #866767 , #e2e2da); */


    }

    .rtext {
        background-color: lightgray;

        --mwp-message-list-profile-start-padding: 16px;


    }



    #sendBtn {
        position: absolute;

        left: 52.3pc;

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

    .button {
        background-color: lightgrey;
        border-radius: 20px;
        width: 6pc;
        height: 2pc;
        margin-top: 0px;
        margin-left: 5px;
        position: relative;
        right: 37.5pc;
    }

    .fetch_chat_img {
        border: 1px solid grey;
        overflow: scroll;
        display: grid;
        display: none;
    }
        .image img {

            margin-left: 20px;
            box-shadow: 1px 4px 19px 0px;

        }


        .fetch_chat_img {
            width: 17pc;
            background-color: white;
            box-shadow: 10px 10px 10px #f1efef;
            overflow: scroll;
            position: relative;
            bottom: 22pc;
            right: 1pc;
        }
</style>