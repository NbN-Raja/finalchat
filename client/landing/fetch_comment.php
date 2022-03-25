 <?php
           $id_name_photo =$data["id"];
            
$sqlllll = "SELECT * FROM comment where photo_id='$id_name_photo'";
$comnt_rslt = $db->query($sqlllll);

if ($comnt_rslt->num_rows > 0) {

while($row_data = $comnt_rslt->fetch_assoc()) {
   
           $post_img=$data['file_name'];  
           
           if($id_name_photo != ''){
            // echo "id: " . $row_data["id"]. " - Name: " . $row_data["name"]. " " . $row_data["comment"]. $row_data["photo_id"]. "<br>";
           }
            
    
    

                ?>
<br>
                <div class="showcomment" style="position:relative;">
                <!-- <img src="<?php echo  'client/assets/uploads/'.$data["p_p"]; ?>" width="10" height="20"
                            style="width:3pc; height:3pc; position:relative; left:0px; border-radius:50%; top: 4px;"> -->
                    <p> <?php echo  "" . $row_data["name"]. ""  ?> <br>
                    <a> <?php echo  "" . $row_data["comment"]. ""  ?>  </a> <br> 

                </div>
                <br>
             <?php   
            }
}
                ?>

                <style>
                  .showcomment{
                    display: flex;
    border: 1px solid #f5f2f2;
    background-color: #f0f2f5;
    border-radius: 10px;
    width: 20pc;
    margin-left: 4pc;
    padding: 6px;
    
    
                    
                  }
                  .showcomment p{
                    font-weight:500;

                    
                  }


                </style>