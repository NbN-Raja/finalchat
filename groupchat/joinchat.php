<?php
session_start();

$_SESSION['chat_room'];

$idd =$_SESSION['chat_room'];
$namee =$_SESSION['name'];
echo $_SESSION['chat_room'];

$conn = new mysqli('localhost', 'root', '', 'chat_app_db');

if(isset($_POST['message'])){
    $chats= $_POST['chats'];
    $name = $_POST['name'];
    $p = $_POST['p_p'];
 
    $idd=$_POST['chat_room'];
    
    $sql = "INSERT INTO `groupchat` (`name`,`chats`,`chat_room`,`p_p`)  VALUES ('$name','$chats', '$idd','$p')";

  $result = mysqli_query($conn,$sql);
  
   if ($result) {
       echo "success";
       header('location:join.php');
   }else{
       echo "error";
   }

}

?>


<!-- select -->
<?php
// $sql="SELECT * FROM users  where name='$namee'";
// // $sql="SELECT * FROM groupchat INNER JOIN users ON users.name = '$name' AND groupchat.name ='$name' Where chat_room = $chat;";
// // $sqll ="SELECT * FROM groupchat INNER JOIN users ON users.name = 'Noblesse' AND groupchat.name ='Noblesse' ";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     // output data of each row
//     while($row = $result->fetch_assoc()) {
      
//       $p_p = "" . $row["p_p"] . "";
//       echo $p_p;
     
      
//     }
// }


?>




<!-- <form action="joinchat.php" method="post">
<p> send message </p>
<input type="text" name="chats">   <br>
<input type="text" name ="name" value="<?php  echo $_SESSION['name'];?>"> <br>
<input type="text" name ="p_p" value="<?php  echo $p_p ;?>"> <br>
<input type="text" name ="chat_room" value="<?php  echo $_SESSION['chat_room'];?>"> <br>
 <input type="submit" name="message">

</form> -->



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>