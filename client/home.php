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
$firstname = $_SESSION['name'];

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

$sql = "SELECT user_id,username,name,username,lastname,interests,phone, password,email,gender, p_p ,last_seen,is_blocked FROM users WHERE user_id= '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        // $imageURL = 'uploads/'.$row["p_p"];
        $name = "" . $row["name"];
        $usernamee = "" . $row["username"];
        $lastname = "" . $row["lastname"];
        $interests = "" . $row["interests"];
        $gender = "" . $row["gender"];
        $email = "" . $row["email"];
        $phone = "" . $row["phone"];
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
                <p> First Name </p>
                <div class="col-md-4"><input type="text" class="form-control" name="name" value="<?php echo  $usernamee ?>"></div>
                <p> Last Name </p>
                <div class="col-md-4"><input type="text" class="form-control" name="lastname" value="<?php echo  $lastname ?>" placeholder=""></div>
                <p>Interests</p>
                <div class="col-md-4">
                    <select class="form-control" name="interests">
                        <option value="">
                            <?php if ($interests) {
                             echo $interests;
                             }else{
                             echo "Select interest";
                             }
                             ?>
                        </option>
                        <option value="life">Life</option>
                        <option value="coding">Coding</option>
                        <option value="music">Music</option>
                        <option value="video">Video</option>
                        <option value="politics">Politics</option>
                    </select>
                </div>

            </div>
            <div class="lastmain">
                <p> Email </p>
                <div class="col-md-4"><input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $email ?> "></div>
                <p> Phone </p>
                <div class="col-md-4"><input type="text" class="form-control" name="phone" value="<?php echo $phone ?>" placeholder="Phone number"></div>
                <div class="" style="margin-top: 20px;">
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
<div class="container d-flex ">

    <div class="personal_information ">
        <!-- Button to trigger the modal -->

        <!-- Modal -->
        <!-- fetch Users Details -->

        <div class=" df card w-50">
            <div class="card-body">
                <?php

                $con = mysqli_connect("localhost", "root", "", "chat_app_db");
                $sql = "SELECT * FROM bios WHERE user_id = $user_id";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    echo '<button type="button" class="btn btn-primary w-auto" data-toggle="modal" data-target="#bioModall">
                   Edit Bio
               </button>';
                } else {
                    // User details are not stored in the database
                    echo '<button type="button" class="btn btn-primary w-auto" data-toggle="modal" data-target="#addModel">
                   Add Bio
               </button>';
                }
                ?>

                <?php
                $user_idd = $_SESSION['user_id'];
                $con = new mysqli("localhost", "root", "", "chat_app_db");
                $sql = "SELECT * from bios WHERE user_id= $user_idd";
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
                } else {
                    echo "Set Up Your Personal Information Here";
                }
        ?>
        </div>
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
         INNER JOIN users ON users.name = '$name' AND images.name ='$name' where status =1 Order by images.id DESC");
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
            <div class="comment">
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
        margin-left: 33pc;
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



    .card-body {
        position: absolute;
        width: 27pc;
        margin-left: 10pc;
    }
</style>


<!-- Java Script Here -->
<link rel="stylesheet" href="https://unpkg.com/emoji-mart/css/emoji-mart.css" />
<script src="https://unpkg.com/emoji-mart/dist/emoji-mart.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="js/ajax.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- End Of Javascript Here  -->
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


<!-- All Php Coode Here  -->

<?php

// Get the form data
if (isset($_POST['bio_submit'])) {
    $user_id = $_POST['user_id'];
    $relationship_status = $_POST['relationship_status'];
    $bio = $_POST['bio'];
    $work_history = $_POST['work_history'];
    $education = $_POST['education'];
    $location = $_POST['location'];

    // Connect to the database
    $dsn = 'mysql:host=localhost;dbname=chat_app_db';
    $username = 'root';
    $password = '';
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );
    $dbh = new PDO($dsn, $username, $password, $options);

    // Insert the bio data into the database
    $sql = "INSERT INTO bios (user_id, relationship_status, bio, work_history, education, location) VALUES (?, ?,?, ?, ?, ?)";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$user_id, $relationship_status, $bio, $work_history, $education, $location]);

    // Redirect the user back to their profile page

}

?>

<?php
// Set up database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chat_app_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle form submission
if (isset($_POST['bio_update'])) {
    // Sanitize and validate form inputs
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $bio = mysqli_real_escape_string($conn, $_POST['bio']);
    $relationship_status = mysqli_real_escape_string($conn, $_POST['relationship_status']);
    $work_history = mysqli_real_escape_string($conn, $_POST['work_history']);
    $education = mysqli_real_escape_string($conn, $_POST['education']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);

    // Update the database
    $sql = "UPDATE bios SET bio='$bio', relationship_status='$relationship_status', work_history='$work_history', education='$education', location='$location' WHERE user_id='$user_id'";
    if (mysqli_query($conn, $sql)) {
        echo "Bio updated successfully";
    } else {
        echo "Error updating bio: " . mysqli_error($conn);
    }
}

?>

<!-- modal open here Update  -->
<div class="modal fade" id="bioModall" tabindex="-1" role="dialog" aria-labelledby="bioModalLabell" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bioModalLabel">Edit Bio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    <input type="text" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                    <div class="form-group">
                        <label for="relationship_status">Bio</label>

                        <input type="text" name="bio" value="<?php echo $bio ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="relationship_status">Relationship status:</label>
                        <input type="text" name="relationship_status" value="<?php echo ''  . $row["relationship_status"] . '' ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="work_history">Work history:</label>
                        <input type="text" name="work_history" value="<?php echo ''  . $row["work_history"] . '' ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="education">Education:</label>
                        <input type="text" name="education" value="<?php echo ''  . $row["education"] . '' ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="location">Location:</label>
                        <input type="text" name="location" value="<?php echo ''  . $row["location"] . '' ?>" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" value="update" name="bio_update" class="btn btn-secondary">
                        <input type="submit" name="bio_submit" class="btn btn-primary" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- popup add model here  -->
<div class="modal fade" id="addModel" tabindex="-1" role="dialog" aria-labelledby="bioModalLabell" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bioModalLabel">Edit Bio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    <input type="text" name="user_id" value="<?php echo $user_id ?>">
                    <div class="form-group">
                        <label for="relationship_status">Bio</label>

                        <input type="text" name="bio" value="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="relationship_status">Relationship status:</label>
                        <input type="text" name="relationship_status" value="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="work_history">Work history:</label>
                        <input type="text" name="work_history" value="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="education">Education:</label>
                        <input type="text" name="education" value="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="location">Location:</label>
                        <input type="text" name="location" value="" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" value="update" name="bio_update" class="btn btn-secondary">
                        <input type="submit" name="bio_submit" class="btn btn-primary" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>