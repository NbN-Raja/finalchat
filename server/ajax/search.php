<?php

session_start();

# check if the user is logged in
if (isset($_SESSION['username'])) {
    # check if the key is submitted
    if(isset($_POST['key'])){
       # database connection file
	   include '../db.conn.php';

	   # creating simple search algorithm :) 
	   $key = "%{$_POST['key']}%";
     
	   $sql = "SELECT * FROM users
	           WHERE username
	           LIKE ? OR name LIKE ?";
       $stmt = $conn->prepare($sql);
       $stmt->execute([$key, $key]);

       if($stmt->rowCount() > 0){ 
         $users = $stmt->fetchAll();

         foreach ($users as $user) {
         	if ($user['user_id'] == $_SESSION['user_id']) continue;
       ?>
       <li class="list">
	   <img src="https://img.icons8.com/color/search" height="10" width="10">
		<a href="client/user_profile.php?user=<?=$user['username']?>"
		   class="">
			<div class="" style="display:flex;margin-left: 20px;">

			    <img src="client/assets/uploads/<?=$user['p_p']?>"
			         class="w-10 rounded-circle">

			    <p style="color:black;     font-family: inherit;"> 
			    	<?=$user['name']?>
		 </p>
	
			</div>
		 </a>
		 <a href="client/final.php?user=<?=$user['username']?>"> chat  </a> 
		 
	   </li>
       <?php } }else { ?>
         <div class="">
		   <i class=""></i>
           The user "<?=htmlspecialchars($_POST['key'])?>"
           is  not found.
		</div>
    <?php }
    }

}else {
	header("Location: ../../index.php");
	exit;
}

?>
<style>

img{
	height:25px;
	width:25px;
}

.list{
	background-color:whitesmoke;
	display:flex;
	padding:20px;
	
}
</style>

