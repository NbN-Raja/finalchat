<?php

function status(){
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


<!-- Get Message  -->

<?php

function message(){
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



<!-- Comment Insert Into database -->

<?php function insertcomment(){

$conn = new mysqli('localhost', 'root', '', 'chat_app_db');

if (isset($_POST['comment'])) { // Check press or not Post Comment Button
	
	$name = $_POST['name']; // Get Name from form
	$comment = $_POST['comment']; // Get Comment from form
	$profile_pic = $_POST['profile_pic']; // Get pic from form
	

	$sql = "INSERT INTO `comment` ( `name`,`comment`,`profile_pic`)
			VALUES ('$name', '$comment','$profile_pic')";

			// $sql = "UPDATE images SET images.id,images.name, images.comment  WHERE images.comment = '$comment''";
	$result = mysqli_query($conn, $sql);

	if($result){
		header('Location: ' . $_SERVER['HTTP_REFERER']);

	}
	
}
}



