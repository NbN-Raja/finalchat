<?php
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chat_app_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT user_id,name, username,lastname, password,email,gender, p_p ,last_seen,is_blocked,report FROM users WHERE user_id= '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    // $imageURL = 'uploads/'.$row["p_p"];
    $name = "" . $row["name"];
    $lastname = "" . $row["lastname"];
    $gender = "" . $row["gender"];
    $email = "" . $row["email"];
    $is_blocked = "" . $row["is_blocked"];
    $report = "" . $row["report"];

    if ($row["is_blocked"] == 1) {

      header('location:client/blocked.php');
    } else {
    }


    if ($row["report"] >= 2) {

      header('location:client/reportblocked.php');
    } else {
    }
  }
} else {
  echo "0 results";
}
$conn->close();
?>