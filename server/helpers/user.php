<?php  

function getUser($username, $conn){
   $sql = "SELECT * FROM users 
           WHERE username=?
          ORDER BY `user_id` DESC";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$username]);

   if ($stmt->rowCount() === 1) {
   	 $user = $stmt->fetch();
   	 return $user;
   }else {
   	$user = [];
   	return $user;
   }
}