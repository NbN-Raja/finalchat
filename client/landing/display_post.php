<div class="secondcolumn" style="top:90px" >
    <br>
            <?php
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

		$query = $db->query("SELECT images.id, images.name,images.file_name,images.something,images.uploaded_on,users.user_id,
		users.name, users.lastname, users.p_p FROM images
		  LEFT JOIN users ON users.name = images.name Order by images.id DESC");
		while($data = mysqli_fetch_array($query))
		{	
		?>
        
            <div class="profile_head" style=" background-color: rgb(255 255 255);  border-top-left-radius: 15px;
             border-top-right-radius: 15px;padding: 10px; width: 560px;margin-top: 90px; "  >
                <div class="" style="display: flex;">
                    <div class="">
                         
                        <img src="<?php echo  'client/assets/uploads/'.$data["p_p"]; ?>" width="10" height="20"
                            style="width:3pc; height:3pc; position:relative; left:0px; border-radius:50%; top: 4px;">
                    </div>
                    <div class="" style="margin-left: 10px;">
                        <b> <?php echo $data['name']; ?> <?php echo $data['lastname']; ?> </b><br>
                        <?php echo $data['uploaded_on']; ?> <br>
                    </div>
                </div>
                <?php echo $data['something']; ?> <br>
            
            </div> 
           <?php 
           $post_img=$data['file_name'];  
           
           if($post_img != ''){
           echo  '  <img class="image" src="client/assets/post/'.$data["file_name"].'"
             height="50" style="width:35pc"><br>';
           }
            ?>
            
            <div class=" comment">
                <div class="bg-white">
                    <div class="d-flex flex-row fs-12 justify-content: space-between;">
                        <div class="like p-2 cursor"><i class="fa fa-thumbs-o-up"></i><span class="ml-1"> <a href="" > Like </a></span></div>
                        <div class="like p-2 cursor"><i class="fa fa-commenting"></i><span class="ml-1">Comment</span></div>
                        <div class="like p-2 cursor"><i class="fa fa-share"></i><span class="ml-1">Share</span></div>
                    </div>
                </div>
                <div class="comment">

               
                <form action="client/landing/comment.php" method="POST" class="form" style="
                overflow: scroll; height: 10pc;overflow-x: hidden;
    overflow-y: scroll
            ">
                    <div style="display: flex;     margin-top: 15px;     justify-content: space-evenly;">
                   
                        <input type="hidden" name="name" value=<?php echo ($_SESSION["name"]); ?>
                            placeholder="Display Name">
                        <div>
                            <img src="client/assets/uploads/<?=$user['p_p']?>" style="width: 36px; height: 36px; border-radius: 50%;">
                        </div>
                        <div >
                            <input id="comment" type="text" name="comment" placeholder="Enter your Comment" >
                        </div>
                        <!-- id of photo Here Using Php  -->
                        <input id="comment" type="hidden" name="photo_id_name" value="<?php echo "" .$data['id'].""; ?>" placeholder="Enter your Comment" >

                    
                            <input type="submit" name="comment_submit" class="btn">
                            
                    </div>
                    <?php include 'fetch_comment.php' ?>
               
               
                <!-- comment Here  -->

                
                <br>
                </form> 
                <br> <br>
                </div>
               
                
                
                
            </div>
            <!-- show -->
            <!-- Display Comment Here  -->
           


            <?php
		}
		?>



    
        </div>
        