

<?php 
          $conn = mysqli_connect('localhost', 'root', '', 'chat_app_db');

$sql = "SELECT likes FROM likes WHERE Photo_id = $image_id AND user_id = $user_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
$dataa = mysqli_fetch_assoc($result);
$likes = $dataa['likes'];
echo $likes;
} else {
 echo "0";
}

?>