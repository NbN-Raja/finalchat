<?php
// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'chat_app_db');

// retrieve the query parameter
$query =  $_POST['query'];

// perform the search query
$sql = "SELECT * FROM community WHERE tags LIKE '%$query%'";
$result = mysqli_query($conn, $sql);

// generate the search results
while ($row = mysqli_fetch_assoc($result)) {
  echo '<div class="search-result">';
  echo '<h3>' . $row['title'] . '</h3>';
  echo '<p>' . $row['contents'] . '</p>';
  echo '</div>';
}
?>
