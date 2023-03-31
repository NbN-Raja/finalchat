<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "chat_app_db");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the group ID from the query string
$group_id = $_GET['id'];

// Get the group details from the database
$sql = "SELECT * FROM groups WHERE admin_id = $group_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $group_name = $row['name'];
    $group_description = $row['description'];
    $group_admin_id = $row['admin_id'];
    $group_photo = $row['photo'];
} else {
    die("Group not found");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $group_name; ?></title>
</head>
<body>
    <h1><?php echo $group_name; ?></h1>
    
    <p><?php echo $group_description; ?></p>
    <p>Admin ID: <?php echo $group_admin_id; ?></p>
</body>
</html>



<?php
// Connect to the database

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// If the form was submitted, insert a new group into the database
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $admin_id = $_POST['admin_id'];
    
    // Handle file upload
    $target_dir = "uploads/";
    $file_name = $_FILES["photo"]["name"];
    $target_file = $target_dir . basename($file_name);
    $upload_ok = true;
    $image_file_type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["photo"]["tmp_name"]);
        if($check !== false) {
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
            $sql = "INSERT INTO groups (name, description, admin_id, photo, created_at) VALUES ('$name', '$description', '$admin_id', '$file_name', NOW())";
            if (mysqli_query($conn, $sql)) {
                $success = "Group created successfully";
            } else {
                $error = "Error creating group: " . mysqli_error($conn);
            }
        } else {
            $error = "Error uploading file.";
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
    <?php if (isset($error)) { ?>
        <div style="color: red;"><?php echo $error; ?></div>
    <?php } ?>
    <?php if (isset($success)) { ?>
        <div style="color: green;"><?php echo $success; ?></div>
    <?php } ?>
    <h1>Create a Group</h1>
    <form method="post" enctype="multipart/form-data">
        <label for="name">Group Name:</label>
        <input type="text" name="name" id="name"><br>
        <label for="description">Description:</label>
        <textarea name="description" id="description"></textarea><br>
        <label for="admin_id">Admin ID:</label>
        <input type="text" name="admin_id" id="admin_id"><br>
        <label     for="photo">Group Photo:</label>
    <input type="file" name="photo" id="photo"><br>
    <input type="submit" name="submit" value="Create Group">
</form>

<?php
// Connect to the database

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the group ID from the query string

// Get the group details from the database

$sql = "SELECT * FROM groups WHERE admin_id = $group_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Output the group details in HTML
        $group_name = $row['name'];
        $group_description = $row['description'];
        $group_admin_id = $row['admin_id'];
        $group_photo = $row['photo'];
        ?>
        <h1><?php echo $group_name; ?></h1>
        <?php if ($group_photo) { ?>
            <img src="uploads/<?php echo $group_photo; ?>" alt="<?php echo $group_name; ?>">
        <?php } ?>
        <p><?php echo $group_description; ?></p>
        <p>Admin group detail ID: <?php echo $group_admin_id; ?></p>
        <?php
    }
} else {
    die("No groups found");
}
