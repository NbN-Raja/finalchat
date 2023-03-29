<div class="profile_detail">
    <div class="image" style="text-align:center;    ">
        <img src="assets/uploads/<?=$chatWith['p_p']?>" width="98" height="90"
            style="border-radius: 50%; margin-left:10px;  text-align:center;    object-fit: cover;"> <br> <br>
        <p style="text-align: center;"> <b>
                <?=$chatWith['name']?>
                <?=$chatWith['lastname']?>
                <div class="d-flex -items-center" title="online">

                    <?php
                        if (last_seen($chatWith['last_seen']) == "Active") {
               	    ?>
                    <div class="online"></div>
                    <small class="d-block p-1" style="margin-left: 91px; margin-bottom:10px;">Online</small>
                    <?php }else{ ?>
                    <small class="d-block p-1" style="margin-left: 91px;">
                        Active:
                        <?=last_seen($chatWith['last_seen'])?>
                    </small>
                    <?php } ?>
                </div>
            </b> </p>

    </div>



    <div class="">
        <p> Gender:
            <?=$chatWith['gender']?> <br>
        </p>
        <div class="">
        </div>
        <p> Email:
            <?=$chatWith['email']?> <br>
        </p>
        <div class="" style="display:flex;     background-color: #efefef;">
        <img src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/64/000000/external-image-interface-kiranshastry-solid-kiranshastry.png"
            height="50" width="45" />
        <button class="open_chat_img  circle" sty>Photos </button> <br> <br>
        </div>
       <br>

        <!-- block Users Here  -->
        <img src="https://img.icons8.com/external-flatart-icons-outline-flatarticons/64/000000/external-block-user-user-experience-flatart-icons-outline-flatarticons.png"
            height="35" width="35" />


        <button id="block" class="" > Block
        

        <?php 
        //   $from_id = $chat['from_id'];
        //   $to_id = $chat['to_id'];
          
        //   $servername = "localhost";
        //   $username = "root";
        //   $password = "";
        //   $dbname = "chat_app_db";
          
        //   // Create connection
        //   $conn = new mysqli($servername, $username, $password, $dbname);
        //   $block = "SELECT is_blocked FROM conversations WHERE user_1= '$from_id' AND user_2=$to_id";
                            
        //   $result = $conn->query($block);
        //   if (mysqli_num_rows($result) > 0) {
        //       // output data of each row
        //       while($row = mysqli_fetch_assoc($result)) {
        //                                 if($row["is_blocked"] ==1){
                                            
                                            
        //                                     echo '<p style="color:red"> <a href="final/partials/blockmsguser.php?user1='.$from_id.'&user2='.$to_id.'&is_blocked=0" style="color:black">UnBlock </a> </p>';

        //                                 }else{
                                           
        //                                     echo '<p style="color:green"> <a href="final/partials/blockmsguser.php?user1='.$from_id.'&user2='.$to_id.'&is_blocked=1" style="color:black">Block </a> </p>';
                                        
        //                                 }
        //                             }
        //                         }
                                    ?>
        </button>



        <!-- chat image fetch -->
        <div class="fetch_chat_img">
            <p class="close_chat_img" style="    margin-left: 0pc;
    font-size: 10px;
    border: 1px solid #3d3232;
    display: inline-block;
    width: 30px;
    background-color: #e7e6e6;"> <--</p>
    <p style="    align-items: center;
    text-align: center;
    font-size: 20px;
    /* text-transform: capitalize; */
    color: grey;
    font-weight: 700;"> Images  </p>
            <?php
                $conn = new mysqli('localhost', 'root','','chat_app_db');
                $to =$chatWith['user_id'] ;
                $from =$_SESSION['user_id'];
                $image = "SELECT DISTINCT `chat_img`  FROM `chats` where (`from_id`='$to' and `to_id`='$from') OR (`to_id`='$to' and `from_id`='$from')" ;
                $result = $conn->query($image);
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        ?>
            <div class="image" style="    margin: 5px;
    padding: 5px;">
                
                <img src="assets/chatimg/<?=$row['chat_img']?> " width="100" height="100"> 
            </div>
            <?php
                }
                } else {
               echo "0 results";
               }


                ?>
            </button>
        </div>
    </div>
</div>

<style>
.open_chat_img {
    display: inline-block;
    border: 1px solid #fff;
    border-radius: 1px;
    font-size: 15px;
    padding: 4px 16px;
    text-align: center;
    text-decoration: none;
    transition: all 0.3s ease;
}

.open_chat_img:hover {
  background-color: #fff;
  color: #000;
}
</style>