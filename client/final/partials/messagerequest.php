<?php 
 if (!empty($chats)) {
                               
                               foreach($chats as $chat){
                                if($chat['from_id'] == $_SESSION['user_id'])
                                { 

                               $from_id = $chat['from_id'];
                               $to_id = $chat['to_id'];
                               
                               $servername = "localhost";
                               $username = "root";
                               $password = "";
                               $dbname = "chat_app_db";
                               
                               // Create connection
                               $conn = new mysqli($servername, $username, $password, $dbname);
                               // Check connection
                               if ($conn->connect_error) {
                                 die("Connection failed: " . $conn->connect_error);
                               }
                               
                           
                               $block = "SELECT * FROM conversations WHERE (user_1= '$from_id' AND user_2=$to_id) AND msg_request=1";
                            
                               $result = $conn->query($block);
                               
                               if ($result->num_rows > 0) {
                                 // output data of each row
                                 while($row = $result->fetch_assoc()) {
                                   
                               
                                   $msg_request= "".$row["msg_request"]."";
                                   $msg_request= "".$row["msg_request"];
                                   $user_1= "".$row["user_1"];
                                   echo $msg_request;
                               
                                   if($row["msg_request"] ==1){
                                       echo "pass";
                                       ?>
                                      
                                  <?php 
                                   }else{
                                       echo "no";
                                   }
                                   
                                  
                               }
                               } else {
                                 echo "dfsdf";
                               }
                               $conn->close();
                            }
                        }
                    }else{

                    }
                               ?>
                              