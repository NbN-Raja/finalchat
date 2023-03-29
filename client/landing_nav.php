<?php

$username = $_SESSION['username'];
if (isset($_SESSION['username'])) {
    # database connection file
    include 'server/db.conn.php';
    include 'server/helpers/user.php';
    include 'server/helpers/conversations.php';
    include 'server/helpers/timeAgo.php';
    include 'server/helpers/last_chat.php';
    include 'server/helpers/chat.php';
    # Getting User data data
    $user = getUser($_SESSION['username'], $conn);
    # Getting User conversations
    $conversations = getConversation($user['user_id'], $conn);

?>
<?php } ?>

<?php include 'nav_header.php' ?>
<link rel="stylesheet" href="assets/css/landing_page.css">


<nav class="navbar navbar-expand-sm navbar-light fixed-top ">
    <!-- <img src="client/assets/img/icon/logo.png"> -->
    <form class="">
        <div class="input-group search-box" style="    margin-top: 20px;">
            <input type="search" id="searchText" class="form-control" placeholder="Search by Name" autocomplete="off">
            <span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
        </div>
        <ul id="chatList" class="absolute search-list">
            <?php if (!empty($conversations)) { ?>

                <?php
                foreach ($conversations as $conversation) { ?>
                <?php } ?>
            <?php } else { ?>
            <?php } ?>
        </ul>
    </form>

    <a style="margin-left: 27pc;" href="landing_page.php" class="navbar-brand "><i class="fa fa-cube"></i><b>Open <span> Feed </span></b></a>
    <!-- Collection of nav links, forms, and other content for toggling -->
    <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start ml-5">
        <div class="navbar-nav">
            <a style="margin-top:10px" href=""> <img src="https://cdn-icons-png.flaticon.com/512/2791/2791441.png" width="35" height="25"> </a>
            <a href="http://localhost:5000/api/getalluserdetail/<?php echo $username ?>" . $username target="_blank" class="nav-item nav-link active"> V2</a>
            </i>

        </div>

        <div class="navbar-nav ml-auto mr-5">
            <a class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
                <i class="fa fa-bell-o"> </i>
                <span class="badge">
                    <?php require_once 'function/nav_function.php' ?>
                    <?php echo status() ?>

                </span>
            </a>



            <a href="client/final_one.php" class="nav-item nav-link messages">
                <i class="fa fa-envelope-o"></i>
                <span class="badge">
                    <?php echo message() ?>
                   </span>
                </a>
           
            <div class="nav-item dropdown">
                <a href="#" data-toggle="dropdown" class="">
                     <div class="rounded-circle object-fit-cover">
                     <img src="client/assets/uploads/<?= $user['p_p'] ?>" class="w-30 rounded-circle" height="36" width="40">
                           ....
                     </div>
                    </a>
                    

                <div class="dropdown-menu ">
                    <a href="client/home.php" class="dropdown-item"><i class="fa fa-user-o"></i> <?php echo htmlspecialchars($_SESSION["username"]); ?></a></a>

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





<style>
    #message {
        background-color: red;
        color: white;
        font-weight: 500px;
        border-radius: 15px;


    }

    .search-list {
        position: absolute;
        top: 63px;
        width: 320px;
        /* display: flex; */
        /* display: none; */
    }
    .dropdown-menu{
        right: 10pc;
    }
</style>










<!-- Trigger the modal with a button -->


<!-- Modal -->
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
                    <img class="rounded-circle " src="client/assets/post/<?= $row['file_name'] ?>" width="50" height="50" style="border:2px solid white">

                    <div class="" style="margin-left:10px">
                        <?php
                            echo "" . $row['name'] . "&nbsp;&nbsp; Posted A Image   On <br> " . $row['uploaded_on'] . "<br> <hr>";
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