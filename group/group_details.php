<?php
session_start();

// Get the group ID from the query string
$group_id = $_GET['id'];
$groupp_name = $_GET['name'];

// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "chat_app_db");
// If the form was submitted, insert a new group into the database
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $uname = $_POST['uname'];
    $p_p = $_POST['p_p'];

    $description = $_POST['description'];
    $admin_id = $_POST['admin_id'];
    $topic = $_POST['topic'];

    // Handle file upload
    $target_dir = "uploads/";
    $file_name = $_FILES["photo"]["name"];
    $target_file = $target_dir . basename($file_name);
    $upload_ok = true;
    $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["photo"]["tmp_name"]);
        if ($check !== false) {
            $upload_ok = true;
        } else {
            $error = "File is not an image.";
            $upload_ok = false;
        }
    }
    if ($_FILES["photo"]["size"] > 5000000) {
        $error = "File is too large.";
        $upload_ok = false;
    }
    if ($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg" && $image_file_type != "gif") {
        $error = "Only JPG, JPEG, PNG, and GIF files are allowed.";
        $upload_ok = false;
    }
    if ($upload_ok) {
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            // Insert the new group into the database
            $sql = "INSERT INTO group_posts (name,uname,p_p,topic, description, admin_id, group_posts, date) VALUES ('$name','$uname','$p_p','$topic','$description', '$admin_id', '$file_name', NOW())";
            if (mysqli_query($conn, $sql)) {
                $success = "Group created successfully";
            } else {
                $error = "Error creating group: " . mysqli_error($conn);
            }
        } else {
            $error = "Error uploading file.";
        }
    }

    exit;
}
?>


<?php
// Get the group details from the database
$sql = "SELECT * FROM groups WHERE name = '$groupp_name'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $group_name = $row['name'];
    $group_description = $row['description'];
    $group_admin_id = $row['admin_id'];
    $adminname = $row['adminname'];
    $group_photo = $row['group_photo'];


?>


    <?php include './nav.php' ?>


    <div class="container">

        <div class="sidenav">

            <div class="containerr">
                <div class="row justify-content-center" style="    position: relative;
    top: 33pc;">
                    <div class="col-lg-10">
                        <form method="post" enctype="multipart/form-data">
                            <input type="hidden" name="uname" value="<?php echo $_SESSION['name'] ?>"><br>
                            <input type="hidden" name="name" value="<?php echo $groupp_name ?>"><br>
                            <div class="form-group">
                                <input type="text" class="form-control" name="topic" value="" placeholder="Topic">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="description" placeholder="Description"></textarea>
                            </div>
                            <input type="hidden" name="admin_id" value="<?php echo $_SESSION["user_id"]; ?>"><br>
                            <div class="form-group">
                                <input type="file" class="form-control-file" name="photo">
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Post in Group</button>
                        </form>
                    </div>
                </div>
            </div>


        </div>
        <div class="contents">
        <div class="Groupdetails d-flex align-items-end shadow p-2">
    <div class="mr-3">
        <img src="http://localhost/main/group/uploads/group_profile/<?php echo $group_photo ?>" alt="Group Profile Photo" class="img-fluid rounded-circle" style="width: 100px; height: 100px;">
    </div>
    <div class="groupdetails align-self-end">
        <h5><?php echo $group_name ?></h5>
    </div>

   
</div>
<hr>
<div class="posts d-flex justify-content-around">
    <h5 style="color: #666666;">Posts</h5>
    <h5 style="color: #666666;">Admin:<br>  <a> <?php echo $adminname ?>  </a></h5>
    <h5 style="color: #666666;">Videos</h5>
    <h5 style="color: #666666;">Likes</h5>
</div>


<hr>



            <?php
            $sql = "SELECT * FROM group_posts WHERE name = '$groupp_name'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // Output the group details in HTML
                    $group_name = $row['name'];
                    $group_namee = $row['name'];
                    $uname = $row['uname'];
                    $p_p = $row['p_p'];
                    $group_description = $row['description'];
                    $group_admin_id = $row['admin_id'];
                    $group_photo = $row['group_posts'];
                    $create = $row['date'];
            ?>
                    <div class="display_posts">

                        <div class="div" style="display:flex">
                            <div class="">
                                <img src="http://localhost/main/client/assets/uploads/<?php echo $p_p ?>" class="rounded-circle" height="50px" width="50px">

                            </div>
                            <div class="">
                                <p class="font-weight-bold"><?php echo $uname; ?></p>

                                <a style="margin-right:10px"><?php echo $create; ?></a>
                            </div>


                        </div>
                        <p><?php echo $group_description; ?></p>
                        <?php if ($group_photo) { ?>
                            <img src="uploads/<?php echo $group_photo; ?>" alt="<?php echo $group_name; ?>" width="200px" height="200px" style="    width: -webkit-fill-available;
    height: auto;">
                        <?php } ?>
                    </div>
                    <br>
            <?php
                }
            } else {
                die("No groups found");
            }
            ?>



        </div>

        <div class="create shadow p-2">

            

        <?php
$sql = "SELECT * FROM groups WHERE adminname = '{$_SESSION['username']}'";
$result = mysqli_query($conn, $sql);

if($sql){
    ?>
    <form action="updategphoto.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
      Group admin Id: <?php echo  $group_admin_id ?>
        <label for="group_photo">Add Group Photo</label>
        <input type="file" class="form-control-file" name="group_photo" id="group_photo">
    </div>
    <div class="form-group">
        <label for="name">Group Name</label>
        <input type="text" class="form-control" name="name" value="<?php echo $group_namee; ?>" id="name">
    </div>
    <button type="submit" class="btn btn-primary" name="gphoto">Add</button>
</form>
<?php 
}else{

}
            
?>  
       
                
 
            
          

            <?php if (isset($error)) { ?>
                <div style="color: red;"><?php echo $error; ?></div>
            <?php } ?>
            <?php if (isset($success)) { ?>
                <div style="color: green;"><?php echo $success; ?></div>
            <?php } ?>
            <h1>Create a Post For Group</h1>
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="name" value="<?php echo $groupp_name ?>"><br>
                <input type="hidden" name="uname" value="<?php echo $_SESSION['username'] ?>"><br>
                <input type="hidden" name="p_p" value="<?php echo $_SESSION['p_p'] ?>"><br>



                <div class="form-group">
                    <input type="text" class="form-control" name="topic" id="topic" placeholder="Add Title">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="description" id="description" placeholder="Add Description"></textarea>
                </div>

                <input type="hidden" name="admin_id" value="<?php echo $_SESSION["user_id"]; ?>"><br>

                <div class="form-group">
                    <label for="photo">Upload Photo</label>
                    <input type="file" class="form-control-file" name="photo" id="photo">
                </div>

                <button type="submit" class="btn btn-primary" name="submit">Post In Group</button>
            </form>

        </div>
        <hr>
    </div>

<?php
} else {
    die("Group not found");
}
?>

<style>
    .container {
        display: flex;
        position: relative;
        top: 5pc;
        justify-content: space-between;

    }

    .display_posts {
        padding-bottom: 5pc;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        padding: 10px;
    }

    .contents {
        width: 32pc;
        border: 1px solid white;
    }
</style>