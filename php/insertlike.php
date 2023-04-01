<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'chat_app_db');
$userrid= $_SESSION['user_id'];

if(isset($_POST['submit'])){
    $user_id = $_POST['user_id'];
    $photo_id = $_POST['Photo_id'];
    $likes = $_POST['likes'];

    // Check if the user has already liked the photo
    $sql = "SELECT id FROM likes WHERE user_id = '$user_id' AND Photo_id = '$photo_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $count = mysqli_num_rows($result);

    if($count == 0) {
        // If the user hasn't liked the photo yet, insert a new like
        $sql = "INSERT INTO likes (user_id, Photo_id,likes) VALUES ('$user_id', '$photo_id','$likes')";
        mysqli_query($conn, $sql);
    }else if ($count == 1) {
    
          $idd= $row['id'];
          
        // Update the likes count for the photo
        $sql = "UPDATE likes SET likes = likes + 1 WHERE user_id = $userrid AND id = $idd ";
        mysqli_query($conn, $sql);
    } else {
        // If the user has already liked the photo, show an error message
        echo "You have already liked this photo.";
    }

    if($sql){
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }
}
?>

