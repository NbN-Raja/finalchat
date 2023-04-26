<?php

session_start();
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "chat_app_db");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// If the form was submitted, insert a new group into the database
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $admin_id = $_POST['admin_id'];
    $photo = "default.png";
    
    // Validate input
    
        // Insert the new group into the database
        $sql = "INSERT INTO groups (name, description, admin_id,group_photo) VALUES ('$name', '$description', '$admin_id','$photo')";
        if (mysqli_query($conn, $sql)) {
            $success = "Group created successfully";
        } else {
            $error = "Error creating group: " . mysqli_error($conn);
        }
    
}
?>


   <?php include './nav.php' ?>

   <div class="container">
    <div class="sidenav">
    <?php include 'sidenav.php' ?>
    </div>
   <div class="creategrup">
   <?php if (isset($error)) { ?>
        <div style="color: red;"><?php echo $error; ?></div>
    <?php } ?>
    <?php if (isset($success)) { ?>
        <div style="color: green;"><?php echo $success; ?></div>
    <?php } ?>
    <h4>Create a Group</h4>
    <form method="post">
        <div class="label">

            <label for="name">Group Name:</label> <br>
            <input type="text" name="name" id="name">
        </div>

        <div class="label">

            <label for="description">Description:</label> <br>
            <textarea name="description" id="description"></textarea>
        </div> <br>
        <input type="hidden" name="admin_id" id="admin_id" value="<?php echo $_SESSION["user_id"] ; ?>">
        <input type="submit" name="submit" value="Create Group">
    </form>
   </div>

     <div class="displaygroup">
        
<?php
// Connect to the database

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the group ID from the query string
// $group_id = $_GET['id'];

// Get the group details from the database
$sql = "SELECT  Distinct name,group_photo FROM groups";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $group_name = $row['name'];
        $photo = $row['group_photo'];
   
  ?>


  

    <h1></h1>
    <?php if ($photo) { ?>
        <img src="uploads/group_profile/<?php echo $photo; ?>" alt="<?php echo $group_name; ?>" height="36px" width="36px">
    <?php }else{ ?>
        <img src="uploads/group_profile/default.png"  height="36px" width="36px">
        <?php 
    } ?>
<?php $group_admin_id = $_SESSION['user_id'] ?>

<a href="group_details.php?id=<?php echo $group_admin_id; ?>&amp;name=<?php echo urlencode($group_name); ?>"><?php echo $group_name; ?></a>
<?php
  }
} else {
    die("Group not found");
}
?>
     </div>


   </div>
   

   <style>

    .container{
        display: flex;
    position: relative;
    top: 10pc;
    
    }

    .container > div {
  margin: 5px;
  padding: 10px;
  border: 1px solid #ccc;
}

.displaygroup {
  
  align-items: center;
}

.displaygroup h1 {
  margin-right: 10px;
}

.displaygroup img {
  border-radius: 50%;
  margin-right: 10px;
}

.displaygroup a {
  text-decoration: none;
  color: #333;
  font-weight: bold;
  margin-bottom: 10px;
}

.displaygroup a:hover {
  color: #2E8B57;
}


    </style>



