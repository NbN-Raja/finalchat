<?php 

include_once 'model/db.php';
$sql = "SELECT report_posts.post_id, report_posts.reason, images.file_name, images.something,images.name
FROM report_posts
INNER JOIN images ON images.id = report_posts.post_id";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    
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
      <td><?php echo $row['name'] ?></td>
      <td><a href="http://localhost/main/pages/singlepost.php?user=<?=$row['post_id'] ?>">
        <?php echo $row['reason'] ?></a></td>
      <td><img src="../client/assets/post/<?=$row['file_name']?>" width="55px" height="55px" /></td>
      <td>
        <form method="post" action="">
          <input type="hidden" name="post_id" value="<?=$row['post_id']?>">
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
  $sql = "DELETE FROM images WHERE `id` = $image_id";

  // Execute the query
  if (mysqli_query($conn, $sql)) {
    echo "Image deleted successfully";
  } else {
    echo "Error deleting image: " . mysqli_error($conn);
  }

  // Close the database connection
  mysqli_close($conn);
}
?>


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
