<?php

function showblogs(){
    $conn = mysqli_connect('localhost', 'root', '', 'chat_app_db');

    // Select all the contents from the community table
    $sql = "SELECT contents FROM community";
    $result = mysqli_query($conn, $sql);

    // Loop through the results and display each content
    while ($row = mysqli_fetch_assoc($result)) {
        
        echo $row['contents']; 
    }

    // Close the database connection
    mysqli_close($conn);
}




?>