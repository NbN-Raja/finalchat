
<?php 
session_start();
$user=$_SESSION['name'];
echo $user;

?>



<?php
// session_start();
// $_SESSION["name"];
$name=$_SESSION["name"];
$con = mysqli_connect('localhost','root','', 'comment');  

$sql = "SELECT * FROM photo";
$result = $con->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {


    // if(photo_id==)
    echo  "ID :".$row["id"]." - Name: " . $row["photo"]. " " . $row["name"]. "<br>";
        echo '<form action="comment.php" method="post">
                <label> Comment </label>
                <input type="comment" name="comment"> ';


        echo '<input type="text" name="photo_id_name" value="'; ?><?php echo $row["id"]; ?> 
        <?php echo '"> ';

            echo '<input type="submit" name="submit">';
            echo  '</form>';
}
        ?>
    <?php

                $id_name_photo =$row["id"];
            
                $sqlllll = "SELECT * FROM comment where photo_id='$id_name_photo'";
                $comnt_rslt = $con->query($sqlllll);

                if ($comnt_rslt->num_rows > 0) {
            
                while($row_data = $comnt_rslt->fetch_assoc()) {
                    
                    echo "id: " . $row_data["id"]. " - Name: " . $row_data["name"]. " " . $row_data["comment"]. $row_data["photo_id"]. "<br>";
                }
                }
                echo'<br><br><br>';

}

?>

