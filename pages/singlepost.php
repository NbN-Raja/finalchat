<link rel="stylesheet" href="../public/home.css">

<?php
session_start();
$name =$_GET['user'];

echo $name;


?> 
<?php

if (isset($_GET['success'])) {
    $success = $_GET['success'];
    echo $success;
}

?>


<?php 

$conn = new mysqli('localhost', 'root', '', 'chat_app_db');
$query = $conn->query("SELECT * from images where id='$name'");
while ($data = mysqli_fetch_array($query)) {
    $image_id= $data['id'];

    $uplaoded_on = $data['uploaded_on'];
    $something = $data['something'];

?>
     <div class="display_post p-2">
        <div class="display_profile mb-2 bg-white">
            <div class="top_profile" style="display:flex">
                <img src="<?php echo  '../client/assets/uploads/' . $_SESSION['p_p']?>" width="10" height="20" style="width:3pc; height:3pc; position:relative; left:0px; border-radius:50%; top: 4px;">

                <div class=" ml-2">
                    <?php echo $_SESSION['username'] ?>
                    <?php echo $_SESSION['lastname'] ?>
                    <br>
                </div>

            </div>
            <div class="pt-2">
                <?php echo $something ?>

            </div>
            <br>
            <?php
            $post_img = $data['file_name'];

            if ($post_img != '') {
                echo  '  <img class="post_image" src="../client/assets/post/' . $data["file_name"] . '" "><br>';
            }
            ?>


        </div>
       <hr>
        <!-- Like Comment And Share Button here  -->
        <div class="d-flex flex-row">
            <!-- Start of Like Button Here  -->
            
            <?php 
                //  $conn = mysqli_connect('localhost', 'root', '', 'chat_app_db');

                //   $sql = "SELECT likes FROM likes WHERE Photo_id = $image_id AND user_id = $user_id";
                //   $result = mysqli_query($conn, $sql);
                  
                //   if (mysqli_num_rows($result) > 0) {
                //   $dataa = mysqli_fetch_assoc($result);
                //   $likes = $dataa['likes'];
                //   echo $likes;
                //   } else {
                //    echo "0";
                //   }
                  
                  ?>
                  
            <form action="php/insertlike.php" method="post">
                <input type="hidden" value="<?php echo $data['file_name']; ?>" name="photo_id" />
                <input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" name="user_id" />
                <input type="hidden" name="likes" value="1" />
                <div class="like p-2 cursor">
                    <button type="submit" name="submit">
                        <i class="fa fa-thumbs-o-up">
                        </i>
                        <span class="ml-1"> Like </span>
                    </button>
                </div>
            </form>
            <!-- End of Like Php Here  -->
            <div class="like p-2 cursor"><i class="fa fa-commenting"></i><span class="ml-1">Comment</span></div>
            <div class="like p-2 cursor"><i class="fa fa-share"></i><span class="ml-1">Share</span></div>
        </div>


        <div class="comment">


          <form action="../client/comment.php" method="POST" class="form" style="overflow: scroll; height: 10pc;overflow-x: hidden; overflow-y: scroll; ">
            <div style="display: flex;     margin-top: 15px;     justify-content: space-evenly;">

              <input type="hidden" name="name" value=<?php echo ($_SESSION["name"]); ?> placeholder="Display Name">
              <input type="hidden" name="profile_pic" value=<?php echo ($_SESSION["p_p"]); ?> placeholder="Display Name">

              <div>
                <img src="../client/assets/uploads/<?= $_SESSION['p_p'] ?>" style="width: 36px; height: 36px; border-radius: 50%;">
              </div>
              <div>
                <input id="comment" type="text" name="comment" placeholder="Enter your Comment" style="height: -webkit-fill-available;">

              </div>
              <!-- id of photo Here Using Php  -->
              <input id="comment" type="hidden" name="photo_id_name" value="<?php echo "" . $data['id'] . ""; ?>" placeholder="Enter your Comment">



              <input type="submit" name="comment_submit" class="btn" style="margin-left:10px">

            </div>

            <!-- -------------------------------------Fetch Comment Here ----------------- -->
            <?php
            $id_name_photo = $data["id"];

            $image_fetch = "SELECT comment.name, users.name, users.p_p FROM comment INNER JOIN users ON comment.name ='' AND   users.name=''";
            $cmnt_rst = $conn->query($image_fetch);

            if ($cmnt_rst->num_rows > 0) {

              while ($row_dataa = $cmnt_rst->fetch_assoc()) {

                $commnt_img = $row_dataa['p_p'];
                echo $commnt_img;
              }
            }



            $sqlllll = "SELECT * FROM comment where photo_id='$id_name_photo'";
            $comnt_rslt = $conn->query($sqlllll);


            if ($comnt_rslt->num_rows > 0) {

              while ($row_data = $comnt_rslt->fetch_assoc()) {

                $post_img = $data['file_name'];

                if ($id_name_photo != '') {
                  // echo "id: " . $row_data["id"]. " - Name: " . $row_data["name"]. " " . $row_data["comment"]. $row_data["photo_id"]. "<br>";
                }




            ?>
                <br>
                <div class="showcomment" style="position:relative;">
                <?php  
                if(!$row_data['profile_pic']){
                       ?>
                  <img src="../client/assets/uploads/user-default.png" width="15" height="20" style="width:3pc; height:3pc; position:relative; left:0px; border-radius:50%; top: 4px;">

                       <?php 

                }else {  
                  ?>
                  <img src="<?php echo  '../client/assets/uploads/'. $row_data["profile_pic"]; ?>" width="10" height="20" style="width:3pc; height:3pc; position:relative; left:0px; border-radius:50%; top: 4px;">
                  <p class="p"> <?php echo  "" . $row_data["name"] . ""  ?> <br>
                    <a> <?php echo  "" . $row_data["comment"] . ""  ?> </a> <br>
                    <hr>

                    <?php  } ?>

                </div>

                <!-- reports posts here  -->
                <!-- HTML form for reporting a post -->

                <br>
            <?php
              }
            }
            ?>
           

            <style>
              .showcomment {
                display: flex;
                border: 1px solid #f5f2f2;
                background-color: #f0f2f5;
                border-radius: 10px;
                width: 30pc;
                margin-left: 20px;
                padding: 6px;



              }

              .showcomment p {
                font-weight: 500;


              }

              .p {
                margin-left: 20px;
              }

              .p a {
                margin-left: 10px;
                font-weight: 400
              }
            </style>

            <!-- comment Here  -->


            <br>
          </form>
          <br> <br>
        </div>
        

    </div>
            </a>
    <?php
}
?>

<form method="post" action="">
    image id: <input type="text" name="post_id" value="<?php echo $image_id ?>">
    user id: <input type="text" name="user_id" value="<?php echo  ($_SESSION["user_id"]);?>">
    <label for="reason">Reason for reporting:</label>
    <input type="text" name="reason" id="reason" required>
    <input type="submit" name="submit" value="Report">
</form>





<?php



// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Get the post ID and reason for reporting from the form
    $post_id = $_POST['post_id'];
    $reason = $_POST['reason'];
    $user_id = $_POST['user_id'];

    // Insert the report into the database
    $conn = new mysqli('localhost', 'root', '', 'chat_app_db');
   
    $sql = "INSERT INTO report_posts (user_id, post_id, reason) VALUES ('$user_id', '$post_id', '$reason')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Set the success message
        $success = "Post has been reported successfully!";
        echo "<script>alert('".$success."')</script>";

       
    } else {
        // Set an error message
        $_SESSION['error'] = "Error: " . mysqli_error($conn);
        exit();
    }
}


?>
