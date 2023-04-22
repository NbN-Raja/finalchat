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



            <span>
                <p style="position: relative;top: 33px;"> <?php echo $chatWith['name'] ?>
                    <?php echo $chatWith['lastname'] ?> </p>

            </span>

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
                    .coverimage {
                        background-position: center;
                        background-repeat: no-repeat;
                        background-size: cover;
                        width: 57pc;
                        height: 20pc;
                        border-radius: 10px;

                    }
                </style>
            <?php }
        } else { ?>

        <?php } ?>
    </div>


</div>



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

<div class="container" style="display: flex;max-width: 36pc;
        justify-content: space-around;position: sticky;position:sticky;top:0">


    <p id="">
        <a href="home.php"> Post</a>
    </p>
    <p id="">
        <a href="final.php?user=<?php $chatWith['username'] ?>">Chats</a>
    </p>



    <form action="" method="post" id="reportform">

        <input type="submit" name="report" value="report" class="btn btn-primary">


    </form>

</div>



<style>
    .btnn {
        color: bue;
        margin-top: 10px;
    }
</style>










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
         INNER JOIN users ON users.name = '$name' AND images.name ='$name' Order by images.id DESC");
while ($data = mysqli_fetch_array($query)) {
?>
    <hr class="hr">

    <div class="containerr" style="display: flex;    justify-content: space-evenly;  ">

        <div class="personal_information">
            <h4> Personal Information</h4>
            <form action="" method="post">
                <i class="fa fa-university" aria-hidden="true"> <a><strong> Birendra Campus</strong> </a> </i>


            </form>



        </div>

        <div class="edit_details">
            <div class="post">
                <form action="posting.php" method="post" enctype="multipart/form-data">
                    <p> <b> Post Here </b> </p>
                    <input type="hidden" name="name" value=<?php echo htmlspecialchars($_SESSION["name"]); ?> placeholder="Display Name">

                    <div class="image_post" style="display: flex; ">
                        <div class="">
                            <img src="assets/uploads/<?= $user['p_p'] ?>" class="w-30 rounded-circle" style="width:36px; height: 36px; left: 19pc;">
                        </div>

                        <div class="" style="margin-left: 7px;">

                            <input type="text" name="something" style="    width: 15pc;" placeholder="Write For ..<?php echo $chatWith['name'] ?>"> <br>
                        </div>
                        <div class="image-upload" style="display: flex;     margin-left: 40px;">
                            <label for="file-input">
                                <img src="assets\img\image.png" style="height: 40px; width: 40px;" />
                            </label>

                            <input id="file-input" type="file" name="file" />

                        </div>
                        <input type="submit" name="submit" value="post" class="post_btn">

                    </div>






                </form>

            </div> <br>


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
                $post_img = $data['file_name'];

                if ($post_img != '') {
                    echo  '  <img class="image" src="assets/post/' . $data["file_name"] . '"
                     height="50" style="width:30pc; height:30pc;    transform: scale(1);"><br>';
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
        <br>


    </div>

<?php } ?>

</div>
<br>


</div>
</div>


</div>









<style>
    body {
        background: #eeeeee;
    }

    body a {
        text-decoration: none;
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
        box-shadow: -2px 4px 13px 12px #c8c6c6;
        object-fit: cover;


    }

    body {}

    .userprofile {
        position: relative;
        left: 11pc;
        top: 103px;

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

    body {
        background: linear-gradient(#636262 10px, #f0f2f5 200px);
    }
</style>