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
     $chatWith = getUser($_GET['user'], $conn);
     $chats = getChats($_SESSION['user_id'], $chatWith['user_id'], $conn);
      opened($chatWith['user_id'], $conn, $chats);
  }
?>

<!-- My pOSTS aPPPERA hERE  -->

<?php include 'nav.php' ?>



<div class="container rounded bg-white mt-1 fixed" style="margin-left:4pc;">
    <div class="row" style="    background-color: #dbdbd9;">
        <div>
            <div class="d-flex flex-column align-items-center text-center p-4" style="margin-right:7pc;">
			


                <img class="rounded-circle mt-5" src="assets/uploads/<?=$chatWith['p_p']?>" width="168" height="168"><span
                    class="font-weight-bold">
                    
					<?=$chatWith['name']?>
					<?=$chatWith['lastname']?>> <br> <span class="text-black-50">
					<?=$chatWith['email']?>
                    </span> <br>
                    <span>Nepal</span>
            </div>
            <hr>
            

            <!-- Profile Picture Uploads Here  -->
            <!-- <form method="post" action="app/http/signup.php" enctype="multipart/form-data">

           <div class="mb-3">
		    <label class="form-label">
		           Profile Picture</label>
		    <input type="file" 
		           class="form-control"
		           name="pp">
		  </div>
          <input type="submit">
           </form> -->


            </span><span class="text-black-50"></span><span></span>
        </div>
        <div class="container" style="display: flex; display: flex;max-width: 36pc;justify-content: space-around;position: relative;right: 18pc;">
    
            
             <p  id="show">
                <img src="https://static.xx.fbcdn.net/rsrc.php/v3/yl/r/tmaz0VO75BB.png" 
                   height="17" width="17">  <a> Posts</a> </p> 
                   <p  id="show">
                    <img src="https://static.xx.fbcdn.net/rsrc.php/v3/yl/r/tmaz0VO75BB.png" 
                       height="17" width="17">   <a>Chats</a> </p> 
                       <p  id="show">
                        <img src="https://static.xx.fbcdn.net/rsrc.php/v3/yl/r/tmaz0VO75BB.png" 
                           height="17" width="17">   <a>Settings</a> </p>   
                       <p>
                           <form action="" method="post">
                               
                               <input type="submit" name="report" value="report">
</form> 
</p>
                           
                           <?php
// $p_p= $_SESSION['p_p'];
// echo $p_p;
$con =new mysqli('localhost','root','','chat_app_db');
if($con){
    echo "run";
}else{

    echo "shdhsa";
}
    if(isset($_POST["report"]))
    {
        $data =$chatWith['name'];
        echo $data;
        
        $sql ="UPDATE `users` SET `report` = report + '1' WHERE `users`.`username` = '$data'";

        $result= mysqli_query($con,$sql);

        if($result){
            echo "<script> alert('Report Successful') </script>";

        }else{
            echo "error";
        }
        
        
    }
?>

        
        </div>
    </div>
















<?php


$name =$_GET['user'];
        // Include the database configuration file
        // Database configuration
        $dbHost     = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName     = "chat_app_db";
        
        // Create database connection
        $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
        
        // Check connection
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }
        
        $query = $db->query("SELECT images.id, images.name,images.file_name,images.something,
        images.uploaded_on,users.user_id, users.name, users.lastname, users.p_p FROM images
         INNER JOIN users ON users.name = '$name' AND images.name ='$name' Order by images.id DESC");
        while($data = mysqli_fetch_array($query))
        {	
        ?>
        
        
            <div class="" style="display: flex;">
                <div class="">
                    <img src="<?php echo  'assets/uploads/'.$data["p_p"]; ?>" width="10" height="20"
                        style="width:3pc; height:3pc; position:relative; left:0px; border-radius:50%; top: 4px;">
                </div>
                <div class="" style="margin-left: 10px;">
                    <b> <?php echo $data['name']; ?> <?php echo $data['lastname']; ?> </b><br>
                    <?php echo $data['uploaded_on']; ?> <br>
                </div>
               
            </div>
            <?php echo $data['something']; ?> <br>
            <img class="image" src="<?php echo  'assets/post/'.$data["file_name"]; ?>"  style="width:35pc"><br>
          <hr >
        
            <?php } ?>

