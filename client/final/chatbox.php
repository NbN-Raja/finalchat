<!-- <div class="">
    <form action="final.php" method="GET">
    <input type="search" name="search_query">
    <input type="hidden" name="user" value="<?php echo $_GET['user']; ?>">

    <input type="submit" name="search">
    </form>
  </div> -->
<div class="shadow p-4 rounded d-flex flex-column chat-box" id="chatBox">

<!-- search in converstion -->
  
    <?php 
    if (!empty($chats)) {
        foreach($chats as $chat) {
            if($chat['from_id'] == $_SESSION['user_id']) {
    ?>
    <small class="d-block" style="text-align:center; background-color:#f5f5f5;opacity: 0.5"><?=" " . last_seen_msg($chat['created_at'])?></small>
    <p class="rtext align-self-end border rounded p-2 py-2 px-2 mb-2 mt-2" style="border-radius: 1rem!important;">
    <?php


$encryptedMessage= ($chat['message']);
$key="asdsadfsadasd";
    // Get the message content
    // $message = ($chat['message']);
    $message = decryptMessage($encryptedMessage, $key);

    // Use regular expression to find links in the message
    $message = preg_replace('/\b(https?:\/\/\S+)\b/', '<a href="$1" target="_blank">$1</a>', $message);


    // Display the message content
    echo $message;

    // Display the chat image, if any
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
    <p class="ltext border rounded p-2 p-2 py-2 px-2 mb-2 mt-2 ml-2" style="border-radius: 2.25rem!important;">
    <?php
        // get the message content
        $message = decryptMessage($chat['message'], $from_id);
        // find all URLs in the message and replace with clickable links
        $message = preg_replace('/\b(https?:\/\/\S+)\b/i', '<a href="$1" target="_blank">$1</a>', $message);
        // display the message with clickable links
        echo $message;
    ?>
    
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







function decryptMessage($encryptedMessage, $key) {
    $data = base64_decode($encryptedMessage);
    $ivSize = openssl_cipher_iv_length('aes-256-cbc');
    $iv = substr($data, 0, $ivSize);
    $encryptedMessage = substr($data, $ivSize);
    return openssl_decrypt($encryptedMessage, 'aes-256-cbc', $key, 0, $iv);
}

?>



