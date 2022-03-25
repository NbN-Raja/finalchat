<?php
    session_start();
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