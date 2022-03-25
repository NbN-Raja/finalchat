<?php
                $db = new mysqli('localhost', 'root', '', 'chat_app_db');
                
                // Get images from the database
                $query = $db->query("SELECT c_p from users  where user_id=$user_id");
                
                if($query->num_rows > 0){
                    while($row = $query->fetch_assoc()){
                        $imageURL = 'assets/cover/'.$row["c_p"];
                ?>
                
                    <img class="coverimage" src="<?php echo $imageURL; ?>" alt="" />
                    <style>
                        .coverimage{
                            background-position: center;
                    background-repeat: no-repeat;
                    background-size: cover;
                    width: 57pc;
                    height: 20pc;
                    border-radius:10px;
                            
                        }
                    </style>
                <?php }
                }else{ ?>
                    
                <?php } ?>