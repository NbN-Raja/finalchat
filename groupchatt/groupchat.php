<?php
session_start();
include 'config.php';


$namee=$_SESSION['name'];

if(isset($_POST['submit'])){

$chat_name = $_POST['chat_name'];

echo "<h1>Chat Found </h1>";

// $sql="SELECT * FROM groupchat where chat_room=$chat_name";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     // output data of each row
//     while($row = $result->fetch_assoc()) {
//       // echo "id: " . $row["id"]. " - Name: " . $row["chats"]. "" .$row['chat_room']. "";
//       $idd= "" . $row["chat_room"]. "" ;
//       $_SESSION['chat_room'] = "" . $row["chat_room"]. ""; 
//       // echo $_SESSION['room'];
      
//       // echo "<p style='position:relative; left:30pc;'> Total users : " .$row['name'] ."</p>";
//     }
// }
}

// if(isset($_POST['message'])){

//   $idd=$_POST['chat_room'];
//   $chats= $_POST['chats'];



//   $sql = "INSERT INTO groupchat (chat_room,chats)
//   VALUES ('$idd','$chats')";

// $result = mysqli_query($conn,$sql);

 

// }








?>

<?php
$sql="SELECT * FROM users  where name='$namee'";
// $sql="SELECT * FROM groupchat INNER JOIN users ON users.name = '$name' AND groupchat.name ='$name' Where chat_room = $chat;";
// $sqll ="SELECT * FROM groupchat INNER JOIN users ON users.name = 'Noblesse' AND groupchat.name ='Noblesse' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $p_p = "" . $row["p_p"] . "";
      // echo $p_p;
    }
}

?>

<!-- 
<div class="room">
<form action="" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">search Chat Room</label>
    <input type="text" class="form-control" name="chat_name" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">create Your Group chat Name .</div>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">search</button>
</form>
</div> -->





<form action="joinchat.php" method="post">
<label> Send Message Here </label> <br>
<input type="text" name="chats" placeholder="send chats">   <br>
<input type="text" name ="chat_room" value="<?php echo   $idd ?>"> <br>
<input type="text" name ="p_p" value="<?php  echo  $p_p ?>"> <br>
 <input type="submit" name="message">
</form>
<?php echo   $_SESSION['chat_room']; ?>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>