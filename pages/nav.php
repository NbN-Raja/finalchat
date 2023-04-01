<nav class="navbar navbar-expand-sm  fixed-top ">
    <!-- <img src="client/assets/img/icon/logo.png"> -->
    <form class="relative" style="left:50px">
        <div class="input-group search-box" style="left: 39px; width: 14pc;">
            <input type="search" id="searchText" class="form-control" placeholder="Search by Name" autocomplete="off">
        </div>
    </form>
    <!-- chat lists  -->
    
    <a style="margin-left: 27pc;" href="home.php" class="navbar-brand "><i class="fa fa-cube"></i><b>Open <span> Feed </span></b></a>
    <!-- Collection of nav links, forms, and other content for toggling -->
    <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start ml-5">
        <div class="navbar-nav">
            </i>
        </div>
        <div class="navbar-nav ml-auto ">


            <div class="" style="position:relative; right:33px; display:flex">
                <a class="ml-10" href="client/home.php">
                    <img src="https://static.xx.fbcdn.net/rsrc.php/v3/yx/r/-XF4FQcre_i.png" width="36" height="36">

                </a>


                <a href="client/settings.php" class="ml-3">
                    <img src="https://static.xx.fbcdn.net/rsrc.php/v3/yC/r/mruGO7HkgS-.png" height="36" width="36">
                    <i class="bi bi-bell-fill"></i>
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
                </svg> <span class="badged">
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