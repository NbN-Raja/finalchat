<?php 
  session_start();
 
  if (isset($_SESSION['username'])) {
  	# database connection file
  	include '../server/db.conn.php';

  	include '../server/helpers/user.php';
  	include '../server/helpers/conversations.php';
    include '../server/helpers/timeAgo.php';
    include '../server/helpers/last_chat.php';
    include '../server/helpers/chat.php';
    include '../server/helpers/opened.php';
   

  	# Getting User data data
  	$user = getUser($_SESSION['username'], $conn);

  	# Getting User conversations
  	$conversations = getConversation($user['user_id'], $conn);

    
     # Getting User data data
     if (!isset($_GET['user'])) {
        
    }
    $chats = getChats($_SESSION['user_id'], $user['user_id'], $conn);

  	opened($user['user_id'], $conn, $chats);
?>

<?php } ?>

