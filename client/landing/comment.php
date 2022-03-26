<?php
session_start();
// $_SESSION["name"];
// if(!$_SESSION['name']){
//     header("Location: login.php");
// }

// echo $_SESSION['photo_id_name']+"    dsfsdkhfkdjshfkjsd";
$name=$_SESSION["name"];
echo "$name";
$con = mysqli_connect('localhost','root','', 'chat_app_db');  

if(isset($_POST['comment_submit'])){
    // echo "post";
    // yehi name hun6/
    // $_SESSION["name"] 
    $cmt=$_POST['comment'];
    echo $cmt;
    $name = $_SESSION['name'];
    $profile_pic = $_POST['profile_pic'];
    echo $name;

    $ID_of_photo = $_POST['photo_id_name'];

    echo $ID_of_photo;

    // exit();


    
    // data db 
    $sql = "INSERT INTO comment (name, comment,photo_id,profile_pic) VALUES ('$name', '$cmt','$ID_of_photo','$profile_pic')";
    
    // $ins = "INSERT INTO comment(name,comment) VALUES(`$name`,`$cmt`)";

    $mysql = mysqli_query($con,$sql);
    // if($mysql){echo "yes";}else{ echo "nope";}
    if ($mysql) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

  
    

}else{
    echo "get req";
}


?>
<?php 
$user=$_SESSION['name'];
echo $user;

?>


<?php
    // session_start();
    // $_SESSION["name"];
    $name=$_SESSION["name"];
    $con = mysqli_connect('localhost','root','', 'comment');  

    $sql = "SELECT * FROM comment";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {


        echo '<form action="comment.php" method="post">
            <label> Comment </label>
            <!-- photo render -->
            <input type="comment" name="comment"> 
            <input type="hidden" vlaue="<?php echo $name ?>"  name="photo_id_name"> 
            <input type="hidden" name="name" value=""> 

            <!-- <input type="text" value="<?php echo $name ?>" name="name" >  -->
            <input type="submit" name="submit">
        </form>';
        // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["comment"]. "<br>";
    }
    } else {
    echo "0 results";
    }

?>



<?php
// session_start();
// $_SESSION["name"];
$name=$_SESSION["name"];
$con = mysqli_connect('localhost','root','', 'comment');  

$sql = "SELECT * FROM comment";
$result = $con->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {


    // if(photo_id==)
    echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["comment"]. "<br>";
}
} else {
echo "0 results";
}





?>