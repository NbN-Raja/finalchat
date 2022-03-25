<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chat";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit'])){
    

    $name=$_POST['name'];
    $password=$_POST['password'];

$sql = "SELECT * FROM users where name='$name' AND password='$password'";
$result = mysqli_query($conn,$sql);

// if ($result->num_rows > 0) {
//   // output data of each row
//   while($row = $result->fetch_assoc()) {
//     // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["password"]. "<br>";
//     echo "login sicess";
//   }
// } else {
//   echo "0 results";
// }
if($result){
    // 
    echo "Login Success";
    echo "$sql";
    header('location:search.php');
}else{
    echo "nope";
}
}
$conn->close();
?>

<form action="" method="post">

name : <input type="text" name="name"> <br>
password : <input type="text" name="password">
<input type="submit" name="submit">
</form>


