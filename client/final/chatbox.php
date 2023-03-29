<div class="shadow p-4 rounded d-flex flex-column chat-box" id="chatBox">
    <?php 
    if (!empty($chats)) {
        foreach($chats as $chat) {
            if($chat['from_id'] == $_SESSION['user_id']) {
    ?>
    <small class="d-block" style="text-align:center; background-color:#f5f5f5;opacity: 0.5"><?=$chat['created_at']?></small>
    <p class="rtext align-self-end border rounded p-2 py-2 px-2 mb-2 mt-2" style="border-radius: 1rem!important;">
        <?=base64_decode($chat['message'])?>
        <?php 
        $echo = $chat['chat_img'];
        if($echo != ''){
            echo "<img src='assets/chatimg/$echo' style='width: 20pc;'>"; 
        }
        ?>
        <a onclick="return confirm()" href="deletemsg.php?delmsg=<?php echo $chat['chat_id']; ?>" class="del_btn">Delete</a>
        
    </p>
    <?php 
            } else {
    ?>
    <small class="d-block" style="text-align:center; background-color:#f5f5f5; opacity: 0.5"><?=$chat['created_at']?></small>
    <div class="" style="display:flex">
    <img src="assets/uploads/<?=$chatWith['p_p']?>" class="w-15 rounded-circle mt-2" height="40" ; width="40">
    <p class="ltext border rounded p-2 p-2 py-2 px-2 mb-2 mt-2 ml-2"
     style="border-radius: 2.25rem!important;">
        
        <?=base64_decode($chat['message'])?>
        <?php 
        $echo = $chat['chat_img'];
        if($echo != ''){
            echo "<img src='assets/chatimg/$echo' style='width: 20pc;'>"; 
        }
        ?>
        
    </p>
   </div>
    
    <?php 
            }
        }	
    } else {
    ?>
    <div class="alert alert-info text-center">
        <i class="fa fa-comments d-block fs-big"></i>
        No messages yet, start the conversation
    </div>
    <?php 
    }
    ?>
</div>

<?php 
// $from_id = $chat['from_id'];
// $to_id = $chat['to_id'];

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "chat_app_db";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// $block = "SELECT is_blocked FROM conversations WHERE user_1= '$from_id' AND user_2=$to_id";

// $result = $conn->query($block);
// if (mysqli_num_rows($result) > 0) {
//     // output data of each row
//     while($row = mysqli_fetch_assoc($result)) {
//         if($row["is_blocked"] ==1) {
//             echo "blocked";
//             echo '<script> 
//                 $("#block").click(function() {
//                     $("#message").attr("disabled", !$("#message").attr("disabled"));
//                 });
//             </script>';
//         } else {
//         }
//     }
// }
?>
