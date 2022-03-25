<?php 

include 'model/db.php' ;

  if(isset($_POST['submit'])){

$topic = $_POST["topic"];
     
$description =$_POST["description"];

$sql="INSERT INTO `global_notify` (`topic`, `description`)
VALUES ('$topic', '$description')";
$result = mysqli_query($connect,$sql);


  }

?>


<h1> Maintenance break </h1>
<form action="" method="post">

Topic : <input type="text" name="topic">
description : <input type="text" name="description">
 <input type="submit" name="submit">


</form>