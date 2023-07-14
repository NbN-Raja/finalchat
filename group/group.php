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
    $adminname = $_POST['adminname'];
    $photo = "default.png";
    
    // Validate input
    
        // Insert the new group into the database
        $sql = "INSERT INTO groups (name, description, admin_id,adminname,group_photo) VALUES ('$name', '$description', '$admin_id','$adminname','$photo')";
        if (mysqli_query($conn, $sql)) {
            $success = "Group created successfully";
        } else {
            $error = "Error creating group: " . mysqli_error($conn);
        }
    
}
?>


   <?php include './nav.php' ?>

   <div class="containerr" style="display: flex;">
    <div class="sidenav">
    <?php include 'sidenav.php' ?>
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
$sql = "SELECT  Distinct name,group_photo,description FROM groups";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $group_name = $row['name'];
        $description = $row['description'];
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


<a class="font-bold" href="group_details.php?id=<?php echo $group_admin_id; ?>&amp;name=<?php echo urlencode($group_name); ?>">
        <strong> <?php echo $group_name; ?> <br> </strong>
        <span style="margin-left: 50px;     font-weight: 400;"> <?php echo substr($description, 0, 15); ?>.. </span>
        
      </a>   
<?php
  }
} else {
    die("Group not found");
}
?>
     </div>
     <div class="creategrup">
   <?php if (isset($error)) { ?>
        <div style="color: red;"><?php echo $error; ?></div>
    <?php } ?>
    <?php if (isset($success)) { ?>
        <div style="color: green;"><?php echo $success; ?></div>
    <?php } ?>
    <h4>Create a Group</h4>
    <form method="post" class="custom-form">
    <div class="form-group">
        <label for="name">Group Name:</label> <br>
        <input type="text" name="name" id="name" class="form-control">
        <input type="text" name="adminname" id="adminname" value="<?php echo $_SESSION['username'] ?>" class="form-control">
    </div>

    <div class="form-group">
        <label for="description">Description:</label> <br>
        <textarea name="description" id="description" class="form-control"></textarea>
    </div> <br>
    <input type="hidden" name="admin_id" id="admin_id" value="<?php echo $_SESSION["user_id"] ; ?>">
    <input type="submit" name="submit" value="Create Group" class="btn btn-primary">
</form>

   </div>

   </div>
   

   <style>

    .containerr{
    position: relative;
    top: 5pc;
    justify-content: space-between;
    
    }

    .container > div {
  margin: 5px;
  padding: 10px;
  border: 1px solid #ccc;
}

.displaygroup {
  
  position: relative;
    top: 1pc;
    right: 25pc;
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

.creategrup{
  position: relative;
    top: 2pc;
    right: 40pc;
}
.custom-form {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.form-group {
  margin-bottom: 10px;
}

label {
  font-weight: bold;
}

.form-control {
  padding: 5px;
}

textarea {
  height: 100px;
  resize: vertical;
}

.btn {
  padding: 10px 20px;
  background-color: #3498db;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}
</style>


    </style>



