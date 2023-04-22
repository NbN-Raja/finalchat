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
    
    // Validate input
    if (empty($name)) {
        $error = "Group name is required";
    } elseif (empty($description)) {
        $error = "Group description is required";
    } elseif (empty($admin_id)) {
        $error = "Admin ID is required";
    } else {
        // Insert the new group into the database
        $sql = "INSERT INTO groups (name, description, admin_id) VALUES ('$name', '$description', '$admin_id')";
        if (mysqli_query($conn, $sql)) {
            $success = "Group created successfully";
        } else {
            $error = "Error creating group: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create a Group</title>
</head>
<body>

<?php require_once '../components/nav.php' ?>
    <?php if (isset($error)) { ?>
        <div style="color: red;"><?php echo $error; ?></div>
    <?php } ?>
    <?php if (isset($success)) { ?>
        <div style="color: green;"><?php echo $success; ?></div>
    <?php } ?>
    <h1>Create a Group</h1>
    <form method="post">
        <label for="name">Group Name:</label>
        <input type="text" name="name" id="name"><br>
        <label for="description">Description:</label>
        <textarea name="description" id="description"></textarea><br>
        <label for="admin_id">Admin ID:</label>
        <input type="text" name="admin_id" id="admin_id" value="<?php echo $_SESSION["user_id"] ; ?>"><br>
        <input type="submit" name="submit" value="Create Group">
    </form>
</body>
</html>


<?php
// Connect to the database

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the group ID from the query string
// $group_id = $_GET['id'];

// Get the group details from the database
$sql = "SELECT  Distinct name FROM groups";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $group_name = $row['name'];
   
  ?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $group_name; ?></title>
</head>
<body>
    <h1><?php echo $group_name; ?></h1>
    <?php if ($group_photo) { ?>
        <img src="uploads/<?php echo $group_photo; ?>" alt="<?php echo $group_name; ?>">
    <?php } ?>

</body>
</html>
<a href="group_details.php?id=<?php echo $group_admin_id; ?>&amp;name=<?php echo urlencode($group_name); ?>"><?php echo $group_name; ?></a>
<?php
  }
} else {
    die("Group not found");
}
?>
