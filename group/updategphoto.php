<?php

$conn = mysqli_connect("localhost", "root", "", "chat_app_db");

if (isset($_POST['gphoto'])) {
    
    $group_name = $_POST['name']; // replace with actual group name
    $group_photo = $_FILES['group_photo']['name'];
    
    // Handle file upload
    $target_dir = "uploads/group_profile/";
    $target_file = $target_dir . basename($group_photo);
    $upload_ok = true;
    $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Check if file is an image
    $check = getimagesize($_FILES['group_photo']['tmp_name']);
    if($check === false) {
        $error = "File is not an image.";
        $upload_ok = false;
    }
    
    // Check file size
    if ($_FILES['group_photo']['size'] > 5000000) {
        $error = "File is too large.";
        $upload_ok = false;
    }
    
    // Allow certain file types
    if ($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg" && $image_file_type != "gif") {
        $error = "Only JPG, JPEG, PNG, and GIF files are allowed.";
        $upload_ok = false;
    }
    
    if ($upload_ok) {
        if (move_uploaded_file($_FILES['group_photo']['tmp_name'], $target_file)) {
            // Insert the new group photo into the database
            $sql = "UPDATE groups SET group_photo='$group_photo' WHERE name='$group_name'";
            if (mysqli_query($conn, $sql)) {
                $success = "Group photo changed successfully";
            } else {
                $error = "Error updating group photo: " . mysqli_error($conn);
            }
        } else {
            $error = "Error uploading file.";
        }
    }
}
?>


