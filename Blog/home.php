<?php


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

    <h1> Start Writing Your Blogs </h1>
    <div class="container">
        <div class="sidenav">
            <?php include 'include/sidenav.php' ?>
        </div>

        <div class="contents">
            <?php $conn = mysqli_connect('localhost', 'root', '', 'chat_app_db');

                //    $select =  'SELECT community.contents as contents , community.username, users.name as name , users.lastname as lastname, users.p_p as profile 
                //    FROM community 
                //    LEFT JOIN users ON users.username = community.username';
                // $contents =  $row['contents']; '<br>';
                // $name= $row['name'];
                // $lastname= $row['lastname'];
                // $profile= $row['profile'];

            // Select all the contents from the community table
            $sql = "SELECT community.contents as contents , community.username,community.title as title, users.name as name , users.lastname as lastname, users.p_p as profile 
               FROM community 
               LEFT JOIN users ON users.username = community.username";
            $result = mysqli_query($conn, $sql);

            // Loop through the results and display each content
            while ($row = mysqli_fetch_assoc($result)) {
            $contents =  $row['contents']; '<br>';
                $name= $row['name'];
                $title= $row['title'];
                $lastname= $row['lastname'];
                $profile= $row['profile'];
               

                ?>
                <div class="blogs">
                     <div class="profile">
                     <img src="../client/assets/uploads/<?= $profile?>" class="w-30 rounded-circle" >
                     <h5> <?php echo $name ?> </h5>
                     <h5> <?php echo $lastname ?> </h5>
                     </div>
                     <div class="contents">
                        <h1>  <?php echo $title ?>   </h1>
                        <p> <?php echo $contents ?>
                     </div>
                     </div>

               <?php 
            }

            // Close the database connection
            mysqli_close($conn); ?>
        </div>




    </div>

</body>

</html>

<style>
    .container {
        display: flex;
    }
    .contents{
        padding: 15px;
        max-width: 80%;

    }
    .blogs{
        display: flex;
        background-color: aliceblue;
        padding: 2px;
        margin-bottom: 10px;
    }
</style>




