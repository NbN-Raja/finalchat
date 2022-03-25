<?php
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

$sql = "select  message, count(opened) as opened from chats where opened = '0';";
$result = $conn->query($sql);

echo $result->num_rows;

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["opened"]. "";
        $opened = "" . $row["opened"]. "";
    }
} else {
    echo "0 results";
}

$conn->close();
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<table width="100%" style="background-color: #0066ff;color: white;">
 <tr width="75%">
  <td>
   <h2>Welcome to facebook</h2>
  </td>
  <td width="15%">
   <i class="fa fa-bell" aria-hidden="true" id="noti_number"></i>
  </td>
 </tr>
</table>

<?php 

include 'include.php';

if($opened ==1){ ?>
    
  <?php echo "" . $row["opened"]. ""; ?>
  <?php }else{ ?>
  <?php   echo "sdsd"; ?>
   <?php }  ?>











<script type="text/javascript">
 function loadDoc() {
  

  setInterval(function(){

   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("noti_number").innerHTML = this.responseText;
    }
   };
   xhttp.open("GET", "demo2.php", true);
   xhttp.send();

  },1000);


 }
 loadDoc();
</script>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- for fetching Last Chat Here Given  -->


SELECT message FROM `chats` WHERE (from_id=7 AND to_id=5)
or (from_id = 5 AND to_id =7)
           AND chat_id=(SELECT MAX(chat_id) from chats );
           <!-- sql  -->

           <!-- SELECT message FROM `chats` WHERE chat_id=(SELECT MAX(chat_id)from chats ); -->

           <?php
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

foreach ($chats as $chat) {
    $from_id = $chats['from_id'];
}



$sql = "SELECT message FROM `chats` WHERE (from_id=7 AND to_id=5)
or (from_id = 5 AND to_id =7)
           AND chat_id=(SELECT MAX(chat_id) from chats )";
$result = $conn->query($sql);

echo $result->num_rows;

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
        echo "id: " . $row["message"]. "";
        
    }
} else {
    echo "0 results";
}

$conn->close();
?>




</body>
</html>

<?php
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





$sql = "SELECT * from  chats WHERE (from_id=6 AND to_id=4)
or (from_id = 4 AND to_id =6) AND opened =0";
$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);

echo "unopened";
echo $count;


