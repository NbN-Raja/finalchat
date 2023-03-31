<?php
// Connect to database
$conn = mysqli_connect('localhost', 'root', '', 'chat_app_db');

// Retrieve chat messages from database
$query = "SELECT * FROM live_chat ORDER BY timestamp ASC ";
$result = mysqli_query($conn, $query);

// Output chat messages as HTML
while ($row = mysqli_fetch_assoc($result)) {
    echo '<div><strong>' . $row['username'] . ':</strong> ' . $row['message'] . '</div>';
}
?>

