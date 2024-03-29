<?php 


function lastChat($id_1, $id_2, $conn){
   
   $sql = "SELECT * FROM chats
           WHERE (from_id=? AND to_id=?)
           OR    (to_id=? AND from_id=?)
           ORDER BY chat_id DESC  ";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_1, $id_2, $id_1, $id_2]);

    if ($stmt->rowCount() > 0) {
    	$chat = $stmt->fetch();

        $color = ($chat['opened'] == 0 && $chat['from_id'] == $chat) ? 'red' : 'black';

        return base64_decode(substr( $chat['message'],0,20));
    	return base64_decode($chat['message']);
    	
    	return $chat['opened'];
        
        
    	
    }else {
    	$chat = '';
    	return $chat;
        
    }

  

}
?>


