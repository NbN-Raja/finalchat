<?php

session_start()
?>

<!DOCTYPE html>
<html>
<head>
  <title>Bootstrap Navigation</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">

  
  <form class="form-inline ">
    <input class="form-control mr-sm-2" type="search" placeholder="Search By Name" aria-label="Search">
  </form>
  
  <ul class="navbar-nav mx-auto">
    <li class="nav-item" style="display:flex">
    <i class="fa fa-cube" style="margin-top: 12px;"></i>
      <a href="http://localhost/main" class="nav-link" style="    font-size: 20px;" href="#"> <b> Link  Up</b>  </a>
    </li>
  </ul>
  
  <ul class="navbar-nav ml-auto">
  <div class="navbar-nav ml-auto ">

<div class="video__icon">
    <div class="circle--outer"> </div>
    <div class="circle--inner" id="">
        <div class="hoverable">
            <p>online</p>
            <div class="hover-content">
                <?php
                // Connect to the database
                $conn = mysqli_connect('localhost', 'root', '', 'chat_app_db');

                // Check for errors
                if (!$conn) {
                    die('Could not connect to database: ' . mysqli_connect_error());
                }

                // Fetch users who were last seen online within the last hour
                $sql = "SELECT name FROM users WHERE last_seen BETWEEN DATE_SUB(NOW(), INTERVAL 1 HOUR) AND DATE_ADD(NOW(), INTERVAL 1 HOUR)";
                $result = mysqli_query($conn, $sql);

                // Check for errors
                if (!$result) {
                    die('Error executing query: ' . mysqli_error($conn));
                }

                // Display the list of users
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<p>' . $row['name'] . '</p>';
                }

                // Close the database connection
                mysqli_close($conn);
                ?>

            </div>
        </div>
    </div>
    <p> <?php
        $conn = mysqli_connect('localhost', 'root', '', 'chat_app_db');

        $sql = "SELECT COUNT(*) as count FROM `users` WHERE last_seen BETWEEN DATE_SUB(NOW(), INTERVAL 1 HOUR) AND DATE_ADD(NOW(), INTERVAL 1 HOUR)";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $dataa = mysqli_fetch_assoc($result);
            $count = $dataa['count'];
            echo $count;
        } else {
            echo "0";
        }

        ?> </p>

</div>



<div class="" style="position:relative; right:33px; display:flex">
    <a class="ml-10" href="http://localhost/main/client/home.php">

        <img src="https://static.xx.fbcdn.net/rsrc.php/v3/yx/r/-XF4FQcre_i.png" width="36" height="36">

    </a>


    <a href="Blog/home.php" class="ml-3">
        <img src="https://static.xx.fbcdn.net/rsrc.php/v3/yC/r/mruGO7HkgS-.png" height="36" width="36">
        <i class="bi bi-bell-fill"></i>
    </a>
</div>


<a class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="notification_bell">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="mercado-match" width="24" height="24" focusable="true">
        <path d="M22 19h-8.28a2 2 0 11-3.44 0H2v-1a4.52 4.52 0 011.17-2.83l1-1.17h15.7l1 1.17A4.42 4.42 0 0122 18zM18.21 7.44A6.27 6.27 0 0012 2a6.27 6.27 0 00-6.21 5.44L5 13h14z"></path>
    </svg>

    <span class="badged">
    </span>

    </i>
</a>
<a href="client/final_one.php" class="nav-item nav-link messages">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="mercado-match" width="24" height="24" focusable="false">
        <path d="M16 4H8a7 7 0 000 14h4v4l8.16-5.39A6.78 6.78 0 0023 11a7 7 0 00-7-7zm-8 8.25A1.25 1.25 0 119.25 11 1.25 1.25 0 018 12.25zm4 0A1.25 1.25 0 1113.25 11 1.25 1.25 0 0112 12.25zm4 0A1.25 1.25 0 1117.25 11 1.25 1.25 0 0116 12.25z"></path>
    </svg> <span class="badged" id="message-count">
    </span>

</a>
<div class="nav-item dropdown ml-4">
    <a href="#" data-toggle="dropdown" class="">
        <div class="rounded-circle object-fit-cover">
            <?php $phoo = $_SESSION['p_p'] ?>

            <img src="client/assets/uploads/<?= $phoo ?>" class="w-30 rounded-circle" height="36" width="40">
        </div>
    </a>
    <div class="dropdown-menu ">
        <a href="client/home.php" class="dropdown-item"><i class="fa fa-user-o"></i> <?php echo $_SESSION['username']  ?></a>

        <a href="client/settings.php" class="dropdown-item"><i class="fa fa-sliders"></i>
            Settings</a></a>
        <div class="dropdown-divider"></div>
        <a href="client/logout.php" class="dropdown-item"><i class="material-icons">&#xE8AC;</i>
            Logout</a></a>
    </div>
</div>
</div>
    
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="#">Logout</a>
        <a class="dropdown-item" href="#">Settings</a>
        <a class="dropdown-item" href="#">Profile</a>
      </div>
    </li>
  </ul>
</nav>


<!-- Add your page content here -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merienda+One">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" rel="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    </html>
    <!-- Java Script Here -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="js/ajax.js"></script>
    <!-- End Of Javascript Here  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



    <style>
    *:before,
    *:after {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }


    #notification_bell{
        color: black;
    background-color: white;
    border: 1px solid white;
    }
    .video__icon {
        position: absolute;
        width: 50px;

        right: 20pc;
    }

    .video__icon .circle--outer {
        border: 1px solid #e50040;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        margin: 0 auto 5px;
        position: relative;
        opacity: .8;
        -webkit-animation: circle 2s ease-in-out infinite;
        animation: circle 2s ease-in-out infinite;
    }

    .video__icon .circle--inner {
        background: #e50040;
        left: 15px;
        top: 10px;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        position: absolute;
        opacity: .8;
    }

    .video__icon .circle--inner:after {
        content: '';
        display: block;
        border: 2px solid #e50040;
        border-radius: 50%;
        width: 28px;
        height: 28px;
        top: -4px;
        left: -4px;
        position: absolute;
        opacity: .8;
        -webkit-animation: circle 2s ease-in-out .2s infinite;
        animation: circle 2s ease-in-out .2s infinite;
    }

    .video__icon p {
        color: #000;
        text-align: center;
    }

    @-webkit-keyframes circle {
        from {
            -webkit-transform: scale(1);
            transform: scale(1);
        }

        to {
            -webkit-transform: scale(1.5);
            transform: scale(1.5);
            opacity: 0;
        }
    }

    @keyframes circle {
        from {
            -webkit-transform: scale(1);
            transform: scale(1);
        }

        to {
            -webkit-transform: scale(1.5);
            transform: scale(1.5);
            opacity: 0;
        }
    }

    .hoverable {
        position: relative;
        display: inline-block;
    }

    .hoverable .hover-content {
        display: none;
        position: absolute;
        z-index: 1;
        top: 100%;
        left: 0;
        background-color: #f9f9f9;
        min-width: 160px;
        padding: 5px;
        border: 1px solid #ddd;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }

    .hoverable:hover .hover-content {
        display: block;
    }
</style>


















<?php

    $conn = mysqli_connect('localhost', 'root', '', 'chat_app_db');
    $useridd= $_SESSION['user_id'];

    $sql = "SELECT * FROM `notifications` where user_id= $useridd";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $dataa = mysqli_fetch_assoc($result);
        $image_id = $dataa['image_id'];
        echo $image_id;
    } else {
        echo "";
    }
    ?>


<?php
$name=$_SESSION['name'];
$sql = "SELECT notifications.post_noti, notifications.message_noti, notifications.user_id, notifications.image_id, images.file_name, images.name, images.something 
FROM notifications 
LEFT JOIN images ON notifications.image_id = images.id where images.name='$name'";
$result = mysqli_query($conn, $sql);
?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Reply from admin</th>
            <th>Details</th>
            <th>Post Content</th>
            <th>Report Message</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($dataa = mysqli_fetch_assoc($result)) : ?>
            <?php
            $message_noti = $dataa['message_noti'];
            $user_id = $dataa['user_id'];
            $file_name = $dataa['file_name'];
            $name = $dataa['name'];
            $something = $dataa['something'];
            ?>

            <tr>
                <td>Your Post Got Deleted</td>
                <td><?php echo $something; ?></td>

                <td>
                    User ID: <?php echo $user_id; ?><br>

                    <?php
                    $post_file = $dataa['file_name'];
                    if ($post_file != '') {
                        $file_extension = pathinfo($post_file, PATHINFO_EXTENSION);
                        if (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif', 'bmp'])) {
                            echo '<img class="post-image" height="400px" weight="400px" src="../client/assets/post/' . $post_file . '"><br>';
                        } elseif (in_array($file_extension, ['mp4', 'webm', 'ogg'])) {
                            echo '<video height="400px" weight="400px" class="post-video" controls>
                                    <source src="../client/assets/post/' . $post_file . '" type="video/' . $file_extension . '">
                                  </video><br>';
                        } else {
                            echo '<p>' . $post_file . '</p><br>';
                        }
                    } else {
                        echo '<p>No file available</p><br>';
                    }
                    ?>

                    Name: <?php echo $name; ?><br>
                    
                </td>
                 <td> Message: <?php echo $message_noti; ?><br> </td>
                 <!--  -->
            </tr>

        <?php endwhile; ?>
    </tbody>
</table>


