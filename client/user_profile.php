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
<div class="container" style=" display: flex; 
margin-top: 64px;">
    <div class="userprofile">
        <img class="rounded-circle mt-5" src="assets/uploads/<?= $chatWith['p_p'] ?>" width="168" height="168" style="border:2px solid white"><span class="font-weight-bold"> <br>
            
    </div>
    <div class="coverimage">
        <?php
        $db = new mysqli('localhost', 'root', '', 'chat_app_db');
        // Get images from the database
        $query = $db->query("SELECT c_p from users  where user_id=$chatWith[user_id]");
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $imageURL = 'assets/cover/' . $row["c_p"];
        ?>
                <img class="coverimage" src="<?php echo $imageURL; ?>" alt="" />
                <style>
                </style>
            <?php }
        } else { ?>
        <?php } ?>
    </div>
</div>
</div>

</p>

<?php
// $p_p= $_SESSION['p_p'];
// echo $p_p;
$con = new mysqli('localhost', 'root', '', 'chat_app_db');
if ($con) {
    // echo "run";
} else {

    // echo "shdhsa";
}
if (isset($_POST["report"])) {
    $data = $chatWith['name'];

    echo $data;

    $sql = "UPDATE `users` SET `report` = report + '1' WHERE `users`.`username` = '$data'";

    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "<script> alert('Report Successful') </script>";
    } else {
        echo "error";
    }
}
?>

</div>
</div>
<?php
$name = $_GET['user'];
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
         INNER JOIN users ON users.name = '$name' AND images.name ='$name' where status= 1 Order by images.id DESC");
while ($data = mysqli_fetch_array($query)) {
?>
   
   <div class="usernameac" >

       <span style="display:flex">
                   <p> <?php echo $chatWith['name'] ?>
                       <?php echo $chatWith['lastname'] ?> </p>

               </span>
               <hr>
   </div>

   
    <div class="containerr">
        <div class="personal_information">
            <h3> Personal Information </h3>
            <?php
            $user_idd = $_SESSION['user_id'];
            $con = new mysqli("localhost", "root", "", "chat_app_db");
            $sql = "SELECT * from bios WHERE user_id= $chatWith[user_id]";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $relation = $row['relationship_status'];
                $bio = $row['bio'];
                $work = $row['work_history'];

            ?>
                <p class="card-text"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo ''  . $row["location"] . '' ?></p>
                <p class="card-text"><i class="fa fa-link" aria-hidden="true"></i> Relationship Status: <?php echo ''  . $row["work_history"] . '' ?></p>
                <p class="card-text"><i class="fa fa-tasks" aria-hidden="true"></i> Works</p>
                <p class="card-text"><svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path d="M219.3 .5c3.1-.6 6.3-.6 9.4 0l200 40C439.9 42.7 448 52.6 448 64s-8.1 21.3-19.3 23.5L352 102.9V160c0 70.7-57.3 128-128 128s-128-57.3-128-128V102.9L48 93.3v65.1l15.7 78.4c.9 4.7-.3 9.6-3.3 13.3s-7.6 5.9-12.4 5.9H16c-4.8 0-9.3-2.1-12.4-5.9s-4.3-8.6-3.3-13.3L16 158.4V86.6C6.5 83.3 0 74.3 0 64C0 52.6 8.1 42.7 19.3 40.5l200-40zM111.9 327.7c10.5-3.4 21.8 .4 29.4 8.5l71 75.5c6.3 6.7 17 6.7 23.3 0l71-75.5c7.6-8.1 18.9-11.9 29.4-8.5C401 348.6 448 409.4 448 481.3c0 17-13.8 30.7-30.7 30.7H30.7C13.8 512 0 498.2 0 481.3c0-71.9 47-132.7 111.9-153.6z" />
                    </svg> <?php echo ''  . $row["education"] . '' ?></p>
                <p class="card-text"><i class="fas fa-map-marker"></i> <?php echo ''  . $row["work_history"] . '' ?> </p>
                <hr>
                <p class="card-text"><i class="fas fa-user-cog"></i> Bio:</p>
                <p class="card-text" style="width: 20pc;text-align: justify;"><?php echo $bio ?></p>

        </div>

    <?php
            }
    ?>


    <div class="edit_details">



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

        $query = $db->query("SELECT images.id, images.name,images.file_name,images.something,
                images.uploaded_on,users.user_id, users.name, users.lastname, users.p_p FROM images
                 INNER JOIN users ON users.name = '$name' AND images.name ='$name' Order by images.id DESC");
        while ($data = mysqli_fetch_array($query)) {
        ?>

            <div class="userrprofile" style="background-color: rgb(255 255 255);
                border-top-left-radius: 15px;
                border-top-right-radius: 15px; position: relative; top: 18px;">
                <div class="" style="display: flex;">
                    <div class="">
                        <img src="<?php echo  'assets/uploads/' . $data["p_p"]; ?>" width="10" height="20" style="width:3pc; height:3pc; position:relative; left:0px; border-radius:50%; top: 4px;">
                    </div>
                    <div class="" style="margin-left: 10px;">
                        <b style="font-size: 15px;"> <?php echo $data['name']; ?> <?php echo $data['lastname']; ?> </b><br>
                        <b style="font-size: 15px;"> <?php echo $data['uploaded_on']; ?> <br> </b>
                    </div>

                </div>
                <p> <?php echo $data['something']; ?> </p><br>
                <hr>
            </div>



            <?php
            $file_name = $data['file_name'];
            if ($file_name != '') {
              $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
              if (in_array($file_ext, array('jpg', 'jpeg', 'png', 'gif'))) {
                  // Display image file
                  echo '<img class="post_image" src="http://localhost/main/client/assets/post/' . $file_name . '" style="    width: -webkit-fill-available;"><br>';
              } else if ($file_ext == 'mp4') {
                  // Display video file
                  
                  if ($file_name != '') {
                      echo '<video class="post_video" controls style="    width: -webkit-fill-available;">
                                <source src="http://localhost/main/client/assets/post/' . $file_name . '" type="video/mp4" >
                            </video><br>';
                  }
              } else {
                  // Unsupported file format
                  echo 'Unsupported file format: ' . $file_ext;
              }
            }
            ?>



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
                        <input type="hidden" name="name" value=<?php echo ($_SESSION["user_id"]); ?>>
                        <input type="hidden" name="name" value=<?php echo ($_SESSION["name"]); ?> placeholder="Display Name">
                        <div>
                            <img src="assets/uploads/<?= $user['p_p'] ?>" style="width: 36px; height: 36px; border-radius: 50%;">
                        </div>
                        <div>
                            <input id="comment" type="text" name="comment" placeholder="Enter your Comment">
                        </div>
                        <div class="">
                            <input type="submit" name="submit" class="btn">
                        </div>
                    </div>

                </form>
            </div>
            <br>
        <?php } ?>


    </div>


    


    </div>

<?php } ?>

</div>
<br>


</div>
</div>


</div>









<style>
    body a {
        text-decoration: none;
    }
    body {
        background-color: #f3f2ef;
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #d0ced1;

    }

    .profile-button {
        background-color: #9d9e9e;
        box-shadow: none;
        border: none
    }


    .profile-button:hover {
        background: #b7b6b8
    }

    .profile-button:focus {
        background: #682773;
        box-shadow: none
    }

    .profile-button:active {
        background: #682773;
        box-shadow: none
    }

    .back:hover {
        color: #682773;
        cursor: pointer
    }

    .center {
        margin: auto;
        width: 60%;
        padding: 20px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

        opacity: 0.8;

    }

    .hideform {
        display: none;
    }

    .cover {
        display: none;
    }

    .col-md-4 input[type="text"] {
        width: 20pc;
    }

    .post {
        background-color: white;
        border-radius: 8px;

        padding: 8px;

        left: 1pc;

        width: 30pc;

        transform: scale(1);

    }

    .post form {
        transform: scale(1);
    }

    .post input[type="text"] {
        border-radius: 15px;
        background-color: #f0f2f5;
        width: 28pc;
        margin-left: 14px;
        padding-left: 20px;
        border: 1px solid white;
    }


    .hr {
        align-items: center;
        width: 62pc;
        margin-left: 13pc;
    }

    .image-upload>input {
        display: none;
    }

    .post_btn {


        font-family: inherit;
        font-size: -0.0625rem;
        font-weight: 500;
        padding: 0;
        height: 27px;
        margin-left: 30px;

    }

    .coverimage {
        box-shadow: -2px -18px 0px 0px rgb(0 0 0 / 20%), -2px -1px 3px 0 rgb(0 0 0 / 19%);
        object-fit: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        width: 57pc;
        height: 20pc;
        border-radius: 10px;


    }

    .containerr {
        display: flex;
        justify-content: center;
        position: relative;
        top: 80px;
    }

    .userprofile {
        position: relative;
    left: 8pc;
    top: 161px;

    }

    .edit_details {
        width: 30pc;
    }

    .comment {
        background-color: rgb(255 255 255);
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px;
    }

    /* .container{
    
    background-color:#f0f2f5;
    background: linear-gradient(#9b9b9b 10px,#f0f2f5 80px );
} */

.usernameac{
    position: absolute;left: 25pc;font-size: 22px;font-weight: 500;
}
</style>