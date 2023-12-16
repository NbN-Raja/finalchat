<nav class="navbar navbar-expand-sm  fixed-top ">
    <!-- <img src="client/assets/img/icon/logo.png"> -->
    <form class="relative" style="left:100px">
        <div class="input-group search-box" style="left: 248px; width: 14pc;">

        <!-- Search userName Here  -->
        <img src="http://localhost/main/client/assets/img/logo.jpg" class="mr-2 mt-1" height="30px" width="30px">
            <input type="search" id="searchText" class="form-control" placeholder="Search by Name" autocomplete="off" style="background-color:#eef3f8">
        </div>
    </form>
    <!-- chat lists  -->

    <a style="margin-left: 27pc;" href="home.php" class="navbar-brand "><i class="fa fa-cube"></i><b>Link <span> Up </span></b></a>
    <!-- Collection of nav links, forms, and other content for toggling -->
    <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start ml-5">
        <div class="navbar-nav">
            </i>
        </div>
        <div class="navbar-nav ml-auto ">
           
        <div class="block" style="position: relative;right: 10pc; top: 9px;">
        <!DOCTYPE html>
<html>
<head>
    <title>Bootstrap Hover Example</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .hover-effect:hover {
            background-color: lightgray;
        }
    </style>
</head>
<body>
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'chat_app_db');
    $useridd= $_SESSION['user_id'];

    $sql = "SELECT * FROM `notifications` where user_id= $useridd";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $dataa = mysqli_fetch_assoc($result);
        $count = "<a href='http://localhost/main/pages/blockposts.php' style='color:red'> Your Post Got reported  </a>";
        echo '<div class="hover-effect">' . $count . '</div>';
    } else {
        echo "";
    }
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
       
        </div>
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



            <style>
  .black-and-white {
    filter: grayscale(100%); /* Convert image to black and white */
  }

  .profile-text {
    text-align: center;
    font-size: 12px;
    margin-top: 5px;
  }
</style>

<div class="" style="position:relative; right:43px; display:flex">
  <a class="ml-15" href="http://localhost/main/client/home.php" style="color: black;     position: relative;
    left: -19px;">
  <i class="fas fa-home" style="font-size: 24px; color: black; width: 24px; height: 24px; margin-top:10px"></i>

  </a>
  

  <a href="Blog/home.php" target="_blank" class="ml-3">
  <i class="fas fa-calendar-week" style="font-size: 24px; color: black; width: 24px; height: 24px; margin-top:10px"></i>
  </a>
</div>



            <a class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="notification_bell">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="mercado-match" width="24" height="24" focusable="true">
                    <path d="M22 19h-8.28a2 2 0 11-3.44 0H2v-1a4.52 4.52 0 011.17-2.83l1-1.17h15.7l1 1.17A4.42 4.42 0 0122 18zM18.21 7.44A6.27 6.27 0 0012 2a6.27 6.27 0 00-6.21 5.44L5 13h14z"></path>
                </svg>

                <span class="badged">
                    <?php notification() ?>
                </span>

                </i>
            </a>
            <a href="client/final_one.php" class="nav-item nav-link messages">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="mercado-match" width="24" height="24" focusable="false">
                    <path d="M16 4H8a7 7 0 000 14h4v4l8.16-5.39A6.78 6.78 0 0023 11a7 7 0 00-7-7zm-8 8.25A1.25 1.25 0 119.25 11 1.25 1.25 0 018 12.25zm4 0A1.25 1.25 0 1113.25 11 1.25 1.25 0 0112 12.25zm4 0A1.25 1.25 0 1117.25 11 1.25 1.25 0 0116 12.25z"></path>
                </svg> <span class="badged" id="message-count">
                    <?php notification_message() ?>
                </span>

            </a>
            <div class="nav-item dropdown ml-4">
                <a href="#" data-toggle="dropdown" class="">
                    <div class="rounded-circle object-fit-cover">
                        <?php $phoo = $_SESSION['p_p'] ?>

                        <img src="client/assets/uploads/<?= $phoo ?>" class="w-30 rounded-circle" height="36" width="40">
                    </div>
                </a>
                <div class="dropdown-menu " style="left: -5pc;">
                    <a href="client/home.php" class="dropdown-item"><i class="fa fa-user-o"></i> <?php echo $_SESSION['username']  ?></a>

                    <a href="client/settings.php" class="dropdown-item"><i class="fa fa-sliders"></i>
                        Settings</a></a>
                    <div class="dropdown-divider"></div>
                    <a href="client/logout.php" class="dropdown-item"><i class="material-icons">&#xE8AC;</i>
                        Logout</a></a>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- message Toggle here  -->
<!-- <div class="modal fade" id="myModalmsg" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="left: 33pc;">
            <div class="modal-header">
                <p> Notifications </p>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <p>

        </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> -->


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content" style="left: 33pc;">
            <div class="modal-header">
                <p> Notifications </p>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <p>
                    Notifications

                    <?php


                    $conn = new mysqli('localhost', 'root', '', 'chat_app_db');
                    $sqll = "SELECT  name,uploaded_on,file_name from images where status=1 ORDER BY id DESC";
                    $result = mysqli_query($conn, $sqll);


                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                <div class="noti" style="display:flex; padding:5px">
                    <?php
                            $file_name = $row['file_name'];
                            if ($file_name != '') {
                                $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
                                if (in_array($file_ext, array('jpg', 'jpeg', 'png', 'gif'))) {
                                    // Display image file
                                    echo '<img class="post_image" style="width:36px; height:50px; border-radius:50px" src="client/assets/post/' . $file_name . '" ><br>';
                                } else if ($file_ext == 'mp4') {
                                    // Display video file

                                    if ($file_name != '') {
                                        echo '<video class="post_video" controls style=" width:50px;    border-radius: 20px;">
                    <source src="client/assets/post/' . $file_name . '" type="video/mp4" >
                </video><br>';
                                    }
                                } else {
                                    // Unsupported file format
                                    echo 'Unsupported file format: ' . $file_ext;
                                }
                            }
                    ?>



                    <div class="" style="margin-left:10px">
                        <?php
                            echo "" . $row['name'] . "&nbsp;&nbsp; Posted    On <br> " . last_seen($row['uploaded_on']) . "<br> <hr>";
                        ?>
                    </div>


                </div>
        <?php
                        }
                    }

        ?>
        </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<style>
    *:before,
    *:after {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
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


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js"></script>
