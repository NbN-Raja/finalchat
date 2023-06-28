<?php
// Establish database connection
$conn = new mysqli('localhost', 'root', '', 'chat_app_db');

if (isset($_POST['searchQuery'])) {
  $searchQuery = $_POST['searchQuery'];
  
  // Perform the SQL query to fetch search results
  $sql = "SELECT * FROM chat_room WHERE room_name LIKE '$searchQuery%'";
  
  // Execute the query and retrieve the results
  $result = $conn->query($sql);
  
  // Display the search results
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id=$row['id'];
        $room_name=$row['room_name'];
        echo"Group Found";
        echo "<a href='display.php?user_id=$id&room_name=$room_name'> <div class='response-box'>";
    echo "<p> " . $row['room_name'] . "</p>";
    echo "<p> " . $row['id'] . "</p>";
    echo "</div> </a>";
    }
  } else {
    echo "<p>No results found. . .</p>";
  }
}
?>
