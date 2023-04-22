

<!-- base 64 message  -->
<?php
// Create a database connection
$conn = mysqli_connect("localhost", "root", "", "chat_app_db");

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$msg= base64_encode('helo');

// Prepare the SQL query
$query = "SELECT message FROM chats WHERE message LIKE '%$msg%'";

// Execute the query and fetch the results
$results = mysqli_query($conn, $query);
$searchResults = mysqli_fetch_all($results, MYSQLI_ASSOC);

// Encode the message using base64
foreach ($searchResults as &$result) {
    $result['message'] = base64_decode($result['message']);
}

// Return the search results as JSON data
echo json_encode($searchResults);

// Close the database connection
mysqli_close($conn);
?>