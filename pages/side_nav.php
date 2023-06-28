<link rel="stylesheet" href="client/landing/css/index.css">
<link rel="stylesheet" href="client/landing/css/landing_page.css">
<script src="client/landing/js/script.js"> </script>
<div class="messageusers" id="messageContainer">

    <!-- User Search here  -->
    <ul id="chatList" style="top:10px">

        <?php if (!empty($conversations)) { ?>

            <?php
            foreach ($conversations as $conversation) { ?>

            <?php } ?>
        <?php } else { ?>
        <?php } ?>
    </ul>

</div>
<div class=" firstcolumn ">

    <?php $phoo = $_SESSION['p_p'] ?>
    <img src="client/assets/uploads/<?= $phoo ?>" class="w-30 rounded-circle" style="width:64px; height: 64px;"> <br>
    <b class="caret">
        <?php echo htmlspecialchars($_SESSION["name"]); ?></a> <br>
        <?php echo htmlspecialchars($_SESSION["lastname"]); ?></a>
    </b>

    <p class="bio text-center">
        <a style="color:black">
            <?php
            $user_idd = $_SESSION['user_id'];
            $con = new mysqli("localhost", "root", "", "chat_app_db");
            $sql = "SELECT bio from bios WHERE user_id= $user_idd";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $bio = $row['bio'];
                if (!$result) {
                    echo 'Please Add Your Bio';
                } else {
                    echo $bio;
                }
            }
            ?>
        </a>
    </p>
    <hr>
    <!-- <div class="info-box">
        <h4>Total Posts</h4>
        <h4>
            <?php
            // Establishing a database connection
            $conn = new PDO("mysql:host=localhost;dbname=chat_app_db", "root", "");

            // Query to fetch the count of images with name "Testadmin"
            $name = $_SESSION['name']; // Store the session variable in a variable to avoid SQL injection
            $sql = "SELECT COUNT(name) FROM `images` WHERE name='$name'";

            // Executing the query and fetching the result
            $stmt = $conn->query($sql);
            $count = $stmt->fetchColumn();

            // Outputting the result
            echo  $count;
            ?>

        </h4>
    </div>
    <div class="info-box">
        <h4>Total Blogs</h4>
        <h4>
            <?php
            // Establishing a database connection
            $conn = new PDO("mysql:host=localhost;dbname=chat_app_db", "root", "");

            // Query to fetch the count of images with name "Testadmin"
            $username = $_SESSION['username']; // Store the session variable in a variable to avoid SQL injection
            $sql = "SELECT COUNT(username) FROM `community` WHERE username='$username'";

            // Executing the query and fetching the result
            $stmt = $conn->query($sql);
            $count = $stmt->fetchColumn();

            // Outputting the result
            echo  $count;
            ?>
        </h4>

    </div> -->
    <div class="info-box" style="height:120px">
        <a href="http://localhost/main/Analytics/index.php"><b>Analytics </b> </a>
        <hr>

        <div class="container">
            <div class="row">
                <div class="col-md-6">

                    <a href="http://localhost/main/group/group.php"> Groups</a>
                </div>
                <div class="col-md-6">

                    <a href="#">chat</a>
                </div>

                <div class="col-md-6">

                    <a href="http://localhost/main/videocall">Video </a>
                </div>
                <div class="col-md-6">

                    <a href="http://localhost/main/groupchat">Gchats </a>
                </div>
            </div>
        </div>

    </div>
    
    <div class="linkedin-about" style="background-color: #f0f2f5;">
  <a href="#" class="linkedin-link small text-dark">Accessibility</a>
  <a href="#" class="linkedin-link small text-dark">Help Center</a>
  <a href="#" class="linkedin-link small text-dark">Privacy &amp; Terms</a>
  <a href="#" class="linkedin-link small text-dark">Advertising</a>
  <div class="linkedin-app">
    <a href="#" class="small text-dark">Get the LinkUp app</a>
  </div>
  <div class="linkedin-copyright small text-dark">
    LinkUp Corporation &copy; 2023
  </div>
</div>



</div>







<!-- chat lists  -->
<div class="messageusers" id="messageContainer">

    <!-- User Search here  -->
    <ul id="chatList" style="top:10px">

        <?php if (!empty($conversations)) { ?>

            <?php
            foreach ($conversations as $conversation) { ?>

            <?php } ?>
        <?php } else { ?>
        <?php } ?>
    </ul>

</div>

<div class="mycard">

</div>


<!-- Css Link -->
<style>
    .firstcolumn {
        position: sticky;
        top: 50px;
        background-color: white;
        text-align: center;
        border-radius: 10px;
    }

    a {
        text-decoration: none;
    }

    li a {
        list-style: none;
        text-decoration: none;
        color: black;

    }

    li {
        list-style: none;
        text-decoration: none;

        padding: 10px;
        font-family: Montserrat, sans-serif;


    }

    .caret {
        font-weight: 600;

    }

    /* message container */
    .messageContainer {
        transform: translate(10px);
        height: 100vh;
        width: 100%;
        top: 10px;
    }

    #cancel-btn {
        position: relative;

    }

    li img {}

    .bio {
        font-size: 15px;
        ;
        text-shadow: 1px 0px 20px #9e6f6f;
        margin: 10px 9px 10px;
        text-align: justify;
        /* box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); */
    }

    .info-box {
        background-color: white;
        border-radius: 5px;
        box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.1);
        padding: 10px;
        margin: 10px;
        width: 150px;
        height: 100px;
        display: inline-block;
        text-align: center;
    }

    .info-box h3 {
        font-size: 16px;
        margin-top: 0;
    }

    .info-box p {
        font-size: 24px;
        font-weight: bold;
        margin: 0;
    }

    .container a {
        color: black;
        font-weight: 500
    }

    .messageContainer{

    }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $('.main').click(function() {
        $('#chatList').hide(); //hide modal
    })



    $(document).ready(function() {

        // Search
        $("#searchText").on("input", function() {
            var searchText = $(this).val();
            if (searchText == "") return;
            $.post('server/ajax/search.php', {
                    key: searchText
                },
                function(data, status) {
                    $("#chatList").html(data);
                });
        });

        // Search using the button
        $("#serachBtn").on("click", function() {
            var searchText = $("#searchText").val();
            if (searchText == "") return;
            $.post('server/ajax/search.php', {
                    key: searchText
                },
                function(data, status) {
                    $("#chatList").html(data);
                });
        });


        /** 
        auto update last seen 
        for logged in user
        **/
        let lastSeenUpdate = function() {
            $.get("app/ajax/update_last_seen.php");
        }
        lastSeenUpdate();
        /** 
        auto update last seen 
        every 10 sec
        **/
        setInterval(lastSeenUpdate, 10000);

    });

    console.log("hello")
</script>

<style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat');



    /* body {
    background-color: #28223f;
    font-family: Montserrat, sans-serif;

    display: flex;
    align-items: center;
    justify-content: center;

    min-height: 100vh;
    margin: 0;
}

h3 {
    margin: 10px 0;
}

h6 {
    margin: 5px 0;
    text-transform: uppercase;
}

p {
    font-size: 14px;
    line-height: 21px;
} */
</style>