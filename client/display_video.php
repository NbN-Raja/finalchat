<?php
     $fetchVideos = mysqli_query($con, "SELECT * FROM videos ORDER BY id DESC");
     while($row = mysqli_fetch_assoc($fetchVideos)){
       $location = $row['location'];
       $name = $row['name'];
       echo "<div  style='float: left; margin-right: 5px;'>
             <video src='".$location."' controls width='320px' height='320px' ></video>     
          
             <span>".$name."</span>
               </div>";
     }
     ?>

<style>

</style>

<div class="secondcolumn" >
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

		$query = $db->query("SELECT * FROM videos ORDER BY id DESC");
		while($data = mysqli_fetch_assoc($query))
		{	
		?>
        
            <div class="" style=" background-color: rgb(255 255 255);  border-top-left-radius: 15px; border-top-right-radius: 15px;padding: 10px; width: 560px;"  >
                <div class="" style="display: flex;">
                    <div class="">
                        <?php 
                    
       ?>
                    </div>
                    <div class="" style="margin-left: 10px;">
                       
                        
                    </div>
                </div>
                





                

            </div> 

         
        </div>
            
            
            <div class=" comment">
                <div class="bg-white">
                    <div class="d-flex flex-row fs-12 justify-content: space-between;">
                        <div class="like p-2 cursor"><i class="fa fa-thumbs-o-up"></i><span class="ml-1">Like</span></div>
                        <div class="like p-2 cursor"><i class="fa fa-commenting"></i><span class="ml-1">Comment</span></div>
                        <div class="like p-2 cursor"><i class="fa fa-share"></i><span class="ml-1">Share</span></div>
                    </div>
                </div>
                <hr>
                <form action="comment.php" method="POST" class="form">
                    <div style="display: flex;     margin-top: 15px;     justify-content: space-evenly;">
                        <input type="hidden" name="name" value=<?php echo ($_SESSION["name"]); ?>
                            placeholder="Display Name">
                        <div>
                            <img src="client/assets/uploads/<?=$user['p_p']?>" style="width: 36px; height: 36px; border-radius: 50%;">
                        </div>
                        <div >
                            <input id="comment" type="text" name="comment" placeholder="Enter your Comment" >
                        </div>
                        <div class="">
                            <input type="submit" name="submit" class="btn">
                        </div>
                    </div>
                    
                </form> <br> <br>
            </div>
            <!-- show -->
<hr>

            <?php
		}
		?>



    
        </div>
        