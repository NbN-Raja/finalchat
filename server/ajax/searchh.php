<?php



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
       <li class="">
	   <img src="https://img.icons8.com/color/search">
		<a href="../../../final.php?user=<?= $user ['username']?>"

		
		   class="">
			<div class="">

			    <img src="assets/uploads/<?=$user['p_p']?>"
			         class="">

			    <h3 class="">
			    	<?=$user['name']?>
			    </h3> 

				<a href="../client/final.php?user=<?=$user['username']?>"> Chatt  </a> 
			</div>
		 </a>
		 <a href="user_profile.php?user=<?=$user['user_id']?>"> View </a> 
	   </li>
       <?php } }else { ?>
         <div class="alert alert-info 
    				 text-center">
		   <i class="fa fa-user-times d-block fs-big"></i>
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
	height:40px;
	width:40px;
}

.list-item {
	position: absolute;
	top: 0;
	left: 0;
}

</style>