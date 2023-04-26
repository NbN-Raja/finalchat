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
            $sql = "INSERT INTO group_posts (name,topic, description, admin_id, group_posts, date) VALUES ('$name','$topic','$description', '$admin_id', '$file_name', NOW())";
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
$sql = "SELECT * FROM groups WHERE admin_id = $group_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $group_name = $row['name'];
    $group_description = $row['description'];
    $group_admin_id = $row['admin_id'];
    $group_photo = $row['photo'];

    
?>


<?php include './nav.php' ?>


<div class="container">

    <div class="sidenav">
       <div class="" style="margin-top:5pc">
       <?php include 'sidenav.php' ?>
       </div>
        <div class="">
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="name" id="name" value="<?php echo $groupp_name ?>"><br>
                <input type="text" name="topic" id="name" value="" placeholder="topic"><br>
                <input name="description" id="description" placeholder="Description"></input><br>
                <input type="hidden" name="admin_id" id="admin_id" value="<?php echo $_SESSION["user_id"]; ?> "><br>
                <input type="file" name="photo" id="photo"><br>
                <input type="submit" name="submit" value="Post In Group">
    </form>
             </div>
    </div>
    <div class="contents">

        <?php
        $sql = "SELECT * FROM group_posts WHERE name = '$groupp_name'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // Output the group details in HTML
                $group_name = $row['name'];
                $group_namee = $row['name'];
                $group_description = $row['description'];
                $group_admin_id = $row['admin_id'];
                $group_photo = $row['group_posts'];
                $create = $row['date'];
        ?>
        <div class="display_posts">

       
                <div class="div" style="display:flex">
                <p><?php echo $group_name; ?></p>
                <p><?php echo $create; ?></p>
                </div>
                <p><?php echo $group_description; ?></p>
                <?php if ($group_photo) { ?>
                    <img src="uploads/<?php echo $group_photo; ?>" alt="<?php echo $group_name; ?>" width="200px" height="200px">
                <?php } ?>
                </div>
        <?php
            }
        } else {
            die("No groups found");
        }
        ?>



    </div>

    <div class="create">


        <form action="updategphoto.php" method="post" enctype="multipart/form-data">
            <p> Add Group Photo </p>
            <input type="file" name="group_photo" id="photo"><br>
            <input type="text" name="name" value="<?php echo $group_namee; ?>" id="photo"><br>
            <input type="submit" name="gphoto" value="Add">

        </form>
        <?php if (isset($error)) { ?>
            <div style="color: red;"><?php echo $error; ?></div>
        <?php } ?>
        <?php if (isset($success)) { ?>
            <div style="color: green;"><?php echo $success; ?></div>
        <?php } ?>
        <h1>Create a Post For Group</h1>
        <form method="post" enctype="multipart/form-data">
            <label for="name">Group Name:</label>
            <input type="text" name="name" id="name" value="<?php echo $groupp_name ?>"><br>
            <label for="name">Topic:</label>
            <input type="text" name="topic" id="name" value=""><br>
            <label for="description">Description:</label>
            <textarea name="description" id="description"></textarea><br>
            <label for="admin_id">Admin ID:</label>
            <input type="text" name="admin_id" id="admin_id" value="<?php echo $_SESSION["user_id"]; ?> "><br>
            <label for="photo">Group Photo:</label>
            <input type="file" name="photo" id="photo"><br>
            <input type="submit" name="submit" value="Post In Group">
        </form>
    </div>
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

    .display_posts{
        padding-bottom: 5pc;
    }

    .contents{
        width: 32pc;
    border: 1px solid black;
    }
</style>