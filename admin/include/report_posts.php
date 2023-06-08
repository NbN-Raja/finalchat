<?php 

include_once 'model/db.php';
$sql = "SELECT report_posts.post_id,report_posts.user_id as user_id, report_posts.reason,images.id, images.file_name, images.something,images.name
FROM report_posts
INNER JOIN images ON images.id = report_posts.post_id";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    $imageid= $row['id'];
    
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Comment</th>
      <th scope="col">Photo</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php echo $row['name'] ?>
      <?php echo $row['user_id'] ; echo $row['id']  ?></td>
      <td><a href="http://localhost/main/pages/singlepost.php?user=<?=$row['post_id'] ?>">
        <?php echo $row['reason'] ?></a></td>
      <td> <?php
$post_file = $row['file_name'];
if ($post_file != '') {
  $file_extension = pathinfo($post_file, PATHINFO_EXTENSION);
  if (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif', 'bmp'])) {
    echo '<img class="post_image"   width="300" height="300" src="../client/assets/post/' . $post_file . '"><br>';
  } elseif (in_array($file_extension, ['mp4', 'webm', 'ogg'])) {
    echo '<video class="post_video" controls width="300" height="300">
            <source src="../client/assets/post/' . $post_file . '" type="video/' . $file_extension . '">
          </video><br>';
  } else {
    echo '<p>' . $post_file . '</p><br>';
  }
} else {
  echo '<p>No file available</p><br>';
}
?></td>
      <td>
        <form method="post" action="">
          <input type="hidden" name="post_id" value="<?=$row['post_id']?>">
          <input type="hidden" name="user_id" value="<?=$row['user_id']?>">
          <input type="text" name="message_noti">
          <button type="submit" name="submit" class="btn btn-danger">Delete</button>
        </form>
      </td>
    </tr>
  </tbody>
</table>



<?php 

} 
}

?>


<!-- Delete  -->
<?php
if (isset($_POST['submit'])) {
  $image_id = $_POST['post_id'];

  // Create a connection to the database
  $conn = mysqli_connect('localhost', 'root', '', 'chat_app_db');

  // Check if the connection was successful
  if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
  }

  // Construct the delete query
  $sql = "UPDATE `images` SET `status` = '0' WHERE `images`.`id` = $imageid";

  // Execute the query
  if (mysqli_query($conn, $sql)) {
    // Add notification for the user
    $user_id = $_POST["user_id"];
    $post_id = $_POST["post_id"];
    $message_noti = $_POST["message_noti"];
    $notification_message = "Your post has been deleted by an admin.";
    $notification_sql = "INSERT INTO notifications (user_id, post_noti,image_id,report,message_noti) VALUES ('$user_id', '$notification_message','$post_id','1','$message_noti')";
    mysqli_query($conn, $notification_sql);

    echo "Image deleted successfully";
  } else {
    echo "Error deleting image: " . mysqli_error($conn);
  }

  // Close the database connection
  mysqli_close($conn);
}
?>


<!-- warning  -->








<style>
  table {
    border-collapse: collapse;
    width: 100%;
    max-width: 800px;
    margin: 0 auto;
  }

  th, td {
    padding: 8px;
    text-align: left;
    vertical-align: middle;
    border-bottom: 1px solid #ddd;
  }

  th {
    background-color: #f2f2f2;
  }

  img {
    display: block;
    margin: 0 auto;
  }
</style>
