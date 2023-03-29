<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chat_app_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if($conn){
    echo "success";
}


if (isset($_POST['submit'])) {
    $idd = $_POST['user_id'];
    // $p_p = $_POST['p_p'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];


    



    $update = "UPDATE users SET user_id = '$idd',name = '$name',
     gender = '$gender', lastname = '$lastname',
     email = '$email' WHERE users.user_id = '$idd'";

    $q = mysqli_query($conn, $update);

    if($q){
        header('location:home.php');
    }

}?>
 <!-- <script>
    alert('Upadated Successfully');
window.location.replace("home.php");
</script> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<p> Updated Successfully </p>
<a href="home.php"> d</a>
</body>
</html>
