 <?php
           $id_name_photo =$data["id"];

           $image_fetch = "SELECT comment.name, users.name, users.p_p FROM comment INNER JOIN users ON comment.name ='' AND   users.name=''";
           $cmnt_rst= $db->query($image_fetch);
           
           if ($cmnt_rst->num_rows > 0) {
           
             while($row_dataa = $cmnt_rst->fetch_assoc()) {
           
              $commnt_img =$row_dataa['p_p'];
              echo $commnt_img;
           
             }
           }


            
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
                <img src="<?php echo  'client/assets/uploads/'.$row_data["profile_pic"]; ?>" width="10" height="20"
                            style="width:3pc; height:3pc; position:relative; left:0px; border-radius:50%; top: 4px;">
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