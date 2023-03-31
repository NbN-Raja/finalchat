<nav class="navbar navbar-expand-sm  fixed-top ">
        <!-- <img src="client/assets/img/icon/logo.png"> -->
        <form class="">
            <div class="input-group search-box">
                <input type="search" id="searchText" class="form-control" placeholder="Search by Name" autocomplete="off">
            </div>
        </form>
        <a style="margin-left: 27pc;" href="home.php" class="navbar-brand "><i class="fa fa-cube"></i><b>Open <span> Feed </span></b></a>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start ml-5">
            <div class="navbar-nav">
                </i>
            </div>
            <div class="navbar-nav ml-auto mr-5">
                <a class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="notification_bell">
                    <i class="fa fa-bell-o">
                        <span class="badged">
                        <?php notification() ?>
                        </span>
                    </i>
                </a>
                <a href="client/final_one.php" class="nav-item nav-link messages">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badged">
                        <?php notification_message() ?>
                        </span>

                </a>
                <div class="nav-item dropdown ml-4">
                    <a href="#" data-toggle="dropdown" class="">
                        <div class="rounded-circle object-fit-cover">
                            <?php $phoo = $_SESSION['p_p']?>
                            
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
        </div>
</nav>

    
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