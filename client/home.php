<?php
session_start();

if (isset($_SESSION['username'])) {
    # database connection file
    include '../server/db.conn.php';

    include '../server/helpers/user.php';
    include '../server/helpers/conversations.php';
    include '../server/helpers/timeAgo.php';
    include '../server/helpers/last_chat.php';

    # Getting User data data
    $user = getUser($_SESSION['username'], $conn);

    # Getting User conversations
    $conversations = getConversation($user['user_id'], $conn);

?>
<?php
}
?>

<!-- check if blocked or not users  -->



<?php
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

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

$sql = "SELECT user_id,username,name,username,lastname, password,email,gender, p_p ,last_seen,is_blocked FROM users WHERE user_id= '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        // $imageURL = 'uploads/'.$row["p_p"];
        $name = "" . $row["name"];
        $usernamee = "" . $row["username"];
        $lastname = "" . $row["lastname"];
        $gender = "" . $row["gender"];
        $email = "" . $row["email"];
        $is_blocked = "" . $row["is_blocked"];

        if ($row["is_blocked"] == 1) {

            header('location:blocked.php');
        } else {
        }
    }
} else {
    echo "0 results";
}
$conn->close();
?>

<!-- My pOSTS aPPPERA hERE  -->

<!-- Navigation Here  -->


<?php
if (empty($_SESSION['username'])) {
    //redirect to login page
    header('Location: ../server/http/auth.php');
    die;
} else {
}
?>



<?php 
$nav = include 'nav.php';
 ?>











<div class="container" style=" display: flex; 
            margin-top: 64px;">


    <div class="userprofile">
        <img class="rounded-circle mt-5" src="assets/uploads/<?= $user['p_p'] ?>" width="168" height="168" style="border:2px solid white"><span class="font-weight-bold"> <br>



            <span>
                <p style="position: relative;top: 33px;"> <?php echo $name ?>
                    <?php echo $lastname ?> </p>
            </span>

    </div>
    <div class="coverimage">
        <!-- <?php include 'coverfetch.php' ?> -->
        <?php
        $db = new mysqli('localhost', 'root', '', 'chat_app_db');

        // Get images from the database
        $query = $db->query("SELECT c_p from users  where user_id=$user_id");

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
<hr>


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

    <p id="show">
        <img src="https://static.xx.fbcdn.net/rsrc.php/v3/yl/r/tmaz0VO75BB.png" height="17" width="17"> <a>Edit Profile </a>
    </p>
    <p id="">
        <a href="home.php"> Posts</a>
    </p>
    <p id="">
        <a href="final_one.php">Chats</a>
    </p>
    <p id="show">
        <a href="settings.php">Settings</a>
    </p>
    <p id="cover">
        <a href="" id=""> Change Cover</a>
    </p>

</div>


<!-- Users Information Here -->



<div class="center hideform">
    <button id="close" style="float: right;">X</button>
    <form action="update_user.php" method="post">
        <input type="hidden" name="user_id" value="<?php echo  $user_id ?>">
        <div class="main" style="display: flex; justify-content: space-between;">
            <div class="submain">
                <p> FirstName </p>
        <div class="col-md-4"><input type="text" class="form-control" name="name" 
                value="<?php echo  $usernamee ?>"  disabled  ></div>
                <p> LastName </p>
                <div class="col-md-4"><input type="text" class="form-control" name="lastname" value="<?php echo  $lastname ?>" placeholder="Doe"></div>
            </div>
            <div class="lastmain">
                <p> Email </p>
                <div class="col-md-4"><input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $email ?> "></div>
                <p> Gender </p>
                <div class="col-md-4"><input type="text" class="form-control" name="gender" value="<?php echo $gender ?>" placeholder="Phone number"></div>
                <div class="" style="margin-top: 10px;">

                </div>
            </div>
        </div>
        <input class="btn btn-primary profile-button " type="submit" name="submit" value="Save Profile">
    </form>

    <!-- profile picture Upload Here  -->

    <form action="profile_pic.php" method="post" enctype="multipart/form-data" style="margin-top: 4pc;">
        Profile img : <input type="file" name="p_p">
        <input type="submit" name="submit">
    </form>





    <!-- cover photo Upload here  -->
    <form action="cover.php" method="post" enctype="multipart/form-data" style="margin-top: 4pc;">
        cover img : <input type="file" name="c_p">
        <input type="submit" name="submit">
    </form>
</div>




</div>


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

                        <input type="text" name="something" style="    width: 15pc;" placeholder="Whats on Your Mind  <?php echo htmlspecialchars($_SESSION["name"]); ?> ?"> <br>
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

                    <a href="delete.php?del=<?php echo $data['id']; ?>" class="del_btn">Delete</a>

                </div>
                <?php echo $data['something']; ?> <br>
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
        box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);

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


<!-- Java Script Here -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="js/ajax.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- End Of Javascript Here  -->
<a href="https://icons8.com/icon/bjHuxcHTNosO/image">Image icon by Icons8</a>
<script>
    $('#show').on('click', function() {
        $('.center').show();
        $(this).hide();
    })

    $('#close').on('click', function() {
        $('.center').hide();
        $('#show').show();
    })
</script>