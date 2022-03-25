<?php

$conn =new mysqli( 'localhost', 'root','','chat_app_db');

// $sql="SELECT chat_id,  message FROM `chats` WHERE opened = 0";
// $result= mysqli_query($conn,$sql);

// if (mysqli_num_rows($result) > 0) {
//     while ($row= mysqli_fetch_assoc($result)) {
//         echo "<div>";
//         echo "".$row['message']. "<br>" .$row['chat_id']. "";
//         echo "</div>";
//     }
// }

?>

<?php
session_start();
$from_id= $_SESSION['user_id'];
echo $from_id;
$conn =new mysqli( 'localhost', 'root','','chat_app_db');
// $sql="SELECT count(opened) as open FROM `chats` WHERE from_id = $from_id and opened = 0";
$sql="select  count(chat_id) as chat   from chats where  from_id = $from_id ";
$result= mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {


   
    while ($row= mysqli_fetch_assoc($result)) {
        // echo "<div>";
        // echo "".$row['open']. "<br>";
        // echo "</div>";
        
        if($row['opened'] == 0){
            echo "New Message Arraive";
        } else {
            echo "No Msg";
        }
        
        
    }
}



?>


<style>
    div{
        color:red;
    }

</style>