<?php

function notification()
{

    $conn = new mysqli('localhost', 'root', '', 'chat_app_db');
    $sqll = "SELECT COUNT(status) as status from `images` ";
    $result = mysqli_query($conn, $sqll);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            echo "" . $row['status'] . "<br>";
            echo "";
        }
    }
}

?>

<?php

function notification_message(){
$from_id = $_SESSION['user_id'];
$conn = new mysqli('localhost', 'root', '', 'chat_app_db');
$sql = "SELECT count(opened) as open, MAX(message) as messages FROM `chats` WHERE to_id = $from_id and opened = 0";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        echo "" . $row['open'] . "<br>";

        $message =  "" . $row['messages'] . "<br>";
        //    echo base64_decode($message); 
        // 	echo "msg";


    }
}
}

?>