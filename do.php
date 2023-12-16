<?php
if (!empty($_SESSION['username'])) {
  //redirect to login page
  header('Location: ../server/http/auth.php');
  die;
} else {
}
?>


<link rel="shortcut icon" href="client/assets/img/icon/logo.JPG" type="image/x-icon" />
<!-- check User Access Or Blocked  -->
<!--  -->
<?php
session_start();
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chat_app_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT user_id,name, username,lastname, password,email,gender, p_p ,last_seen,is_blocked,report FROM users WHERE user_id= '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    // $imageURL = 'uploads/'.$row["p_p"];
    $name = "" . $row["name"];
    $lastname = "" . $row["lastname"];
    $gender = "" . $row["gender"];
    $email = "" . $row["email"];
    $is_blocked = "" . $row["is_blocked"];
    $report = "" . $row["report"];

    if ($row["is_blocked"] == 1) {

      header('location:client/blocked.php');
    } else {
    }


    if ($row["report"] >= 2) {

      header('location:client/reportblocked.php');
    } else {
    }
  }
} else {
  echo "0 results";
}
$conn->close();
?>


<!-- Navigation Bar Here  -->
<?php include 'client/landing_nav.php' ?>

<!-- End Of Navigation Bar -->

<!--  -->
<!-- Contain Here  -->
<!-- namespace hello; -->
<div class="containerr" style="display:flex; justify-content: space-between;">
  <!------------------------------------------- Side Nav Here Starts---------------------------  -->

  <link rel="stylesheet" href="client/landing/css/index.css">
  <link rel="stylesheet" href="client/landing/css/landing_page.css">
  <script src="client/landing/js/script.js"> </script>

  <div class="firstcolumn">
    <div class=" " style="  margin-left:10px;">
      <li>
        <img src="client/assets/uploads/<?= $user['p_p'] ?>" class="w-30 rounded-circle" style="width:36px; height: 36px; left: 19pc;">
        <b class="caret">
          <?php echo htmlspecialchars($_SESSION["name"]); ?></a>
          <?= $user['lastname'] ?> <br>

        </b>
        <p class="bio">
          <a href="client/bioupdate.php?user=<?= $user['username'] ?>&bio=<?= $user['bio'] ?>" style="color:black">

            <?= $user['bio'] ?>
          </a>
        </p>
      </li>
    </div>
    <div class="profile">
      <li>
        <img src="https://static.xx.fbcdn.net/rsrc.php/v3/yx/r/-XF4FQcre_i.png" width="36" height="36">

        <a href="client/home.php"> Profile </a>
      </li>
      <li>
        <img src="https://static.xx.fbcdn.net/rsrc.php/v3/yq/r/YF1bztyGuX-.png" height="36" width="36"> <a href="client/final_one.php"> Message </a>
      </li>
      <li>
        <img src="https://static.xx.fbcdn.net/rsrc.php/v3/yq/r/YF1bztyGuX-.png" height="36" width="36"> <a href="groupchatt/index.php"> Group Chat </a>
      </li>

      <li>

        <img src="https://static.xx.fbcdn.net/rsrc.php/v3/yC/r/mruGO7HkgS-.png" height="36" width="36">
        <a href="blog/home.php"> Blogs </a>
      </li>
      <li>

        <img src="https://static.xx.fbcdn.net/rsrc.php/v3/yR/r/tInzwsw2pVX.png" style="height: 28px;width: 35px;">
        <a href="client/settings.php"> Covid-19 </a>
      </li>

      <li>

        <img src="https://static.xx.fbcdn.net/rsrc.php/v3/yq/r/kULMG0uFcEQ.png" height="36" width="36">
        <a href="client/settings.php"> weather </a>
      </li>

      <li>
        <footer style="margin-top:9pc;">

          <p>Author: Nabin Raj Chhetri<br>
            <a href="mailto:nabinxettri15@example.com">nabinxettri15@example.com</a>
          </p>
        </footer>

      </li>
    </div>


    <!-- chat lists  -->
    <div class="messageusers" id="messageContainer">

      <!-- User Search here  -->
      <ul id="chatList" style="display:inline-block;">

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

  </div>

  <!-- ---------------------------------------Main Posting Here Second Column----------------------- -->

  <div class="secondcolumn" style="top:90px">
    <br>
    <?php
    // Include the database configuration file
    // Database configuration
    $dbHost     = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName     = "chat_app_db";

    // Create database connection
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    // Check connection
    if ($db->connect_error) {
      die("Connection failed: " . $db->connect_error);
    }

    $query = $db->query("SELECT images.id , images.name,images.file_name,images.something,images.uploaded_on,users.user_id,
		users.name,users.username, users.lastname, users.p_p FROM images
		  LEFT JOIN users ON users.name = images.name Order by images.id DESC");
    while ($data = mysqli_fetch_array($query)) {

    ?>


      <div class="profile_head" style=" background-color: rgb(255 255 255);  border-top-left-radius: 15px;
             border-top-right-radius: 15px;padding: 10px; width: 560px;margin-top: 120px;box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%); ">

        <!-- <img src="<?php echo  'client/assets/uploads/' . $data["p_p"]; ?>" width="2" height="2"
                            style="width:2pc; height:2pc;border-radius:50%">
             <p> <?php echo $data['name'] ?> Upload Post Recently </p> -->


        <div class="" style="display: flex; ">

          <div class="">
            <img src="<?php echo  'client/assets/uploads/' . $data["p_p"]; ?>" width="10" height="20" style="width:3pc; height:3pc; position:relative; left:0px; border-radius:50%; top: 4px;">
          </div>
          <div class="" style="margin-left: 10px; ">
            <b> <a href="client/user_profile.php?user=<?= $data['username'] ?>"><?php echo $data['name']; ?>
                <?php echo $data['lastname']; ?> </a> </b><br>
            <?= last_seen($data['uploaded_on']) ?>
          </div>
        </div>
        <p style="position: relative;top: 15px;"> <?php echo $data['something']; ?> <br> </p>

      </div>
      <?php
      $post_img = $data['file_name'];

      if ($post_img != '') {
        echo  '  <img class="image" src="client/assets/post/' . $data["file_name"] . '"
             height="50" style="width:35pc;object-fit:center; "><br>';
      }
      ?>

      <div class=" comment" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);">
        <div class="bg-white">
          <div class="d-flex flex-row fs-12 justify-content: space-between;">
          
            <form action="php/insertlike.php" method="post">
            <div class="like p-2 cursor">
              <i class="fa fa-thumbs-o-up"> 
              <?php 

$sql = "SELECT likes FROM likes WHERE Photo_id =  {$data['id']} AND user_id = $user_id";
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0) {
    $dataa = mysqli_fetch_assoc($result);
    $likes = $dataa['likes'];
    echo $likes;
} else {
    echo "0";
}

 ?>
              
              


              </i>
              <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
              <input type="hidden" name="Photo_id" value=" <?php echo  $data['id'] ?>">
              <input type="hidden" name="likes" value="1">
              <span class="ml-1">
                <button type="submit" name="submit"> Like
                </button>
              </span>
              </div>
            </form>
            
            <div class="like p-2 cursor"><i class="fa fa-commenting"></i><span class="ml-1">Comment</span></div>
            <div class="like p-2 cursor"><i class="fa fa-share"></i><span class="ml-1">Share</span></div>
          </div>
        </div>
        <div class="comment">


          <form action="client/comment.php" method="POST" class="form" style="overflow: scroll; height: 10pc;overflow-x: hidden; overflow-y: scroll; ">
            <div style="display: flex;     margin-top: 15px;     justify-content: space-evenly;">

              <input type="hidden" name="name" value=<?php echo ($_SESSION["name"]); ?> placeholder="Display Name">
              <input type="hidden" name="profile_pic" value=<?php echo ($_SESSION["p_p"]); ?> placeholder="Display Name">

              <div>
                <img src="client/assets/uploads/<?= $data['p_p'] ?>" style="width: 36px; height: 36px; border-radius: 50%;">
              </div>
              <div>
                <input id="comment" type="text" name="comment" placeholder="Enter your Comment">

              </div>
              <!-- id of photo Here Using Php  -->
              <input id="comment" type="hidden" name="photo_id_name" value="<?php echo "" . $data['id'] . ""; ?>" placeholder="Enter your Comment">



              <input type="submit" name="comment_submit" class="btn" style="margin-left:10px">

            </div>

            <!-- -------------------------------------Fetch Comment Here ----------------- -->
            <?php
            $id_name_photo = $data["id"];

            $image_fetch = "SELECT comment.name, users.name, users.p_p FROM comment INNER JOIN users ON comment.name ='' AND   users.name=''";
            $cmnt_rst = $db->query($image_fetch);

            if ($cmnt_rst->num_rows > 0) {

              while ($row_dataa = $cmnt_rst->fetch_assoc()) {

                $commnt_img = $row_dataa['p_p'];
                echo $commnt_img;
              }
            }



            $sqlllll = "SELECT * FROM comment where photo_id='$id_name_photo'";
            $comnt_rslt = $db->query($sqlllll);


            if ($comnt_rslt->num_rows > 0) {

              while ($row_data = $comnt_rslt->fetch_assoc()) {

                $post_img = $data['file_name'];

                if ($id_name_photo != '') {
                  // echo "id: " . $row_data["id"]. " - Name: " . $row_data["name"]. " " . $row_data["comment"]. $row_data["photo_id"]. "<br>";
                }




            ?>
                <br>
                <div class="showcomment" style="position:relative;">
                  <?php
                  if (!$row_data['profile_pic']) {
                  ?>
                    <img src="client/assets/uploads/user-default.png" width="15" height="20" style="width:3pc; height:3pc; position:relative; left:0px; border-radius:50%; top: 4px;">

                  <?php

                  } else {
                  ?>
                    <img src="<?php echo  'client/assets/uploads/' . $row_data["profile_pic"]; ?>" width="10" height="20" style="width:3pc; height:3pc; position:relative; left:0px; border-radius:50%; top: 4px;">
                    <p class="p"> <?php echo  "" . $row_data["name"] . ""  ?> <br>
                      <a> <?php echo  "" . $row_data["comment"] . ""  ?> </a> <br>
                      <hr>

                    <?php  } ?>

                </div>
                <br>
            <?php
              }
            }
            ?>
            <!-- comment Here  -->
            <br>
          </form>
          <br> <br>
        </div>
      </div>
    <?php
    }
    ?>
  </div>
  <!-- ----------------------------------------------------------Post Here  -->
  <div class="posting">
    <form action="client/posting.php" method="post" enctype="multipart/form-data" class="post">
      <div class="" style="display:flex ;     justify-content: space-around;">
        <p> <b> Image Post </b> </p>
        <a class="openButton" onclick="openForm()"><strong>Text Post</strong></a>

      </div>
      <input type="hidden" name="name" value=<?php echo htmlspecialchars($_SESSION["name"]); ?> placeholder="Display Name">

      <div class="image_post" style="display: flex; ">
        <div class="">
          <img src="client/assets/uploads/<?= $user['p_p'] ?>" class="w-30 rounded-circle" style="width:36px; height: 36px; left: 19pc;" required>
        </div>

        <div class="">

          <input type="text" name="something" id="emoji" placeholder="Whats on Your Mind  <?php echo htmlspecialchars($_SESSION["name"]); ?> ?" required> <br>
        </div>

      </div>
      <hr>
      <div class="image-upload" style="display: flex; justify-content: space-around;">
        <label for="file-input">
          <img src="https://www.freeiconspng.com/uploads/no-image-icon-13.png" width="36" alt="Png Transparent No" />
        </label>
        <input id="file-input" type="file" name="file" required />
        <button type="submit" name="submit" class="myButton"> Post </button>
      </div>
    </form>
  </div>


  <!-- popup form -->

  <div class="formPopup" id="popupForm">
    <form action="client/posting.php" method="post" enctype="multipart/form-data" class="post">
      <p> <b> Text Post </b> </p>


      <input type="hidden" name="name" value=<?php echo htmlspecialchars($_SESSION["name"]); ?> placeholder="Display Name">

      <div class="image_post" style="display: flex; ">
        <div class="">
          <img src="client/assets/uploads/<?= $user['p_p'] ?>" class="w-30 rounded-circle" style="width:36px; height: 36px; left: 19pc;">
        </div>

        <div class="">

          <input type="text" name="something" required placeholder="Whats on Your Mind  <?php echo htmlspecialchars($_SESSION["name"]); ?> ?" required> <br>
        </div>
      </div>
      <hr>
      <div class="image-upload" style="display: flex; justify-content: space-around;">

        <button type="submit" name="submitt" class="myButton"> Post </button>
      </div>
    </form>
    <button type="button" class="btn cancel" id="cancel" onclick="closeForm()">X</button>
    </form>
  </div>

  <script>
    function openForm() {
      document.getElementById("popupForm").style.display = "block";
    }

    function closeForm() {
      document.getElementById("popupForm").style.display = "none";
    }

    // Emoji Picker Here  here 
    $('#emoji').emojioneArea({
      pickerPosition: 'top'
    });
  </script>

  <!------------------------------------------------------ End of Image post here  -->
  <!--  Contacts Here  -->




  <div class="thirdcolumn">
    <div class="lastpost">
      <p id="contact">Suggestions</p>


      <?php
      define('PUBLIC_PATH', dirname(__FILE__) . '/uploads/');


      $conn = new mysqli('localhost', 'root', '', 'chat_app_db');
      $sqll = "SELECT * FROM `users`    ORDER BY RAND() LIMIT 2";
      $result = mysqli_query($conn, $sqll);

      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
      ?>

          <div class="image" style="display: flex;">
            <img class="" src="client/assets/uploads/<?= $row['p_p'] ?>" width="30" height="30" style="border:2px solid white">

            <a href="client/user_profile.php?user=<?= $row['username'] ?>" style="color:black">
              <?php

              echo "<div class='name'>";
              echo "" . $row['name'] . " &nbsp" . $row['lastname'] . "";
              echo "</div> <br>";
              ?>
            </a>
          </div>


      <?php
        }
      }
      ?>
    </div>
    <hr>

    <ul id="chatList" class="chatList">
      <p id="contact">Contacts</p>
      <?php if (!empty($conversations)) { ?>
        <?php

        foreach ($conversations as $conversation) { ?>
          <li>
            <a href="client/final.php?user=<?= $conversation['username'] ?>">
              <div style="display: flex;">
                <img src="client/assets/uploads/<?= $conversation['p_p'] ?>" class="w-10 rounded-circle" style="width: 36px; height: 36px;">
                <p> <?= $conversation['name'] ?><br> </p>
                <p> <?= $conversation['lastname'] ?><br> </p>
              </div>
            </a>
          </li>
        <?php } ?>
      <?php } ?>
    </ul>

  </div>



  <!-- Script Starts Here  -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $('.containerr').click(function() {
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
    .lastpost {
      padding: 12px;
      margin-top: 9px;
    }

    .name {
      font-size: larger;
      font-weight: 500;
      font-family: inherit;
      margin-left: 1pc;
      margin-top: 2px;
    }

    .image img {

      border-radius: 32px;

    }

    .image {
      background-color: rgb(243, 243, 239);
    }

    .thirdcolumn {

      top: 4pc;
    }
  </style>


</div>




<style>
  body {
    background-color: #f0f2f5;
  }

  html {
    scroll-behavior: smooth;
  }


  @media only screen and (max-width:800px) {

    /* For tablets: */
    .containerr {
      width: 80%;
      padding: 0;
    }

    .right {
      width: 100%;
    }
  }

  @media only screen and (max-width:500px) {

    /* For mobile phones: */
    .menu,
    .main,
    .firstcolumn {
      width: 20%;
    }

    .posting form {
      width: 20%;
    }
  }

  @media only screen and (max-width:392px) {

    /* For tablets: */
    .navbar-nav {
      width: 80%;
      padding: 0;
    }

    .right {
      width: 100%;
    }
  }
</style>
<style>
  .firstcolumn {
    width: 10%;
    position: fixed;
    left: 2pc;
    top: 5pc;
    border: 1px solid rgb(238, 232, 232);
    border-radius: 10px;
    height: 30pc;
    width: 20pc;
    color: black;
  }

  .firstcolumn li {
    list-style: none;
    padding: 10px;
    /* font-family: Montserrat, sans-serif; */


  }

  /* message container */
  .messageContainer {
    transform: translate(10px);
    height: 100vh;
    width: 100%;
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
</style>

<style>
  form {
    background-color: white;

  }

  .formPopup {
    display: none;
    position: fixed;
    left: 47%;
    top: 11%;
    transform: translate(-50%, 5%);

    z-index: 2;
    -webkit-transition: 0.5s;

  }

  #cancel {
    position: relative;
    top: -11pc;
    left: 30pc;
    background-color: white;
  }

  .posting {
    box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);
  }
</style>

<style>
  ::-webkit-scrollbar {
    width: 4px;
  }

  /* Track */
  ::-webkit-scrollbar-track {
    background: #f1f1f1;
  }

  /* Handle */
  ::-webkit-scrollbar-thumb {
    background: #888;
  }

  /* Handle on hover */
  ::-webkit-scrollbar-thumb:hover {
    background: #555;
  }

  .post_notification {

  }

  .secondcolumn {

  }
</style>
<style>
  .showcomment {
    display: flex;
    border: 1px solid #f5f2f2;
    background-color: #f0f2f5;
    border-radius: 10px;
    width: 30pc;
    margin-left: 20px;
    padding: 6px;



  }

  .showcomment p {
    font-weight: 500;


  }

  .p {
    margin-left: 20px;
  }

  .p a {
    margin-left: 10px;
    font-weight: 400
  }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js" integrity="sha512-hkvXFLlESjeYENO4CNi69z3A1puvONQV5Uh+G4TUDayZxSLyic5Kba9hhuiNLbHqdnKNMk2PxXKm0v7KDnWkYA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.css" integrity="sha512-vEia6TQGr3FqC6h55/NdU3QSM5XR6HSl5fW71QTKrgeER98LIMGwymBVM867C1XHIkYD9nMTfWK2A0xcodKHNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />