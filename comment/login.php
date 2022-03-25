<?php  
// session_start();




$con = mysqli_connect('localhost','root','', 'comment');  

if ($con) {
    echo 'run';
}

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $_SESSION["name"] = $name;
    $password=$_POST['password'];


        $sql = "select *from login where name = '$name' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            echo "<h1><center> Login successful </center></h1>"; 
            header("location:comment.php"); 
        }  

        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }   
    }  
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="name">: Name  <br>
        <input type="password" name="password"> : Password  <br>
        <input type="submit" name="submit">


</form>

<!-- Comment Here  -->





</body>
</html>




