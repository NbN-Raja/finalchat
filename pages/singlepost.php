<link rel="stylesheet" href="../public/home.css">
<?php
session_start();

$name = $_GET['user'];
?>
<?php

if (isset($_GET['success'])) {
  $success = $_GET['success'];
  echo $success;
}
?>
<?php
$conn = new mysqli('localhost', 'root', '', 'chat_app_db');
$query = $conn->query("SELECT * from images where id='$name'");
while ($data = mysqli_fetch_array($query)) {
  $image_id = $data['id'];

  $uplaoded_on = $data['uploaded_on'];
  $something = $data['something'];

?>





  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


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






<!-- Main Container Starts from Here  -->



  <div class="display_post p-2">
    <div class="display_profile mb-2 bg-white">
      <div class="top_profile" style="display:flex">
        <img src="<?php echo  '../client/assets/uploads/' . $_SESSION['p_p'] ?>" width="10" height="20" style="width:3pc; height:3pc; position:relative; left:0px; border-radius:50%; top: 4px;">

        <div class="ml-2">
  <?php
    $username = $_SESSION['username'];
    $lastname = $_SESSION['lastname'];
  ?>
  <span style="font-weight: bold; font-size: 1.2rem;"><?php echo $username ?></span>
  <span style="font-weight: bold; font-size: 1.2rem;"><?php echo $lastname ?></span>
  <br>
</div>

      </div>
      <div class="pt-2" style="width:640px">
        <?php echo $something ?>
      </div>
      <br>
      <?php
$post_file = $data['file_name'];
if ($post_file != '') {
  $file_extension = pathinfo($post_file, PATHINFO_EXTENSION);
  if (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif', 'bmp'])) {
    echo '<img class="post_image" src="../client/assets/post/' . $post_file . '"><br>';
  } elseif (in_array($file_extension, ['mp4', 'webm', 'ogg'])) {
    echo '<video class="post_video" controls width="640" height="480">
            <source src="../client/assets/post/' . $post_file . '" type="video/' . $file_extension . '">
          </video><br>';
  } else {
    echo '<p>' . $post_file . '</p><br>';
  }
} else {
  echo '<p>This post does not have image</p><br>';
}
?>


    </div>

    <!-- Like Comment And Share Button here  -->
    <!-- <div class="d-flex flex-row">
      <?php
      //  $conn = mysqli_connect('localhost', 'root', '', 'chat_app_db');

      //   $sql = "SELECT likes FROM likes WHERE Photo_id = $image_id AND user_id = $user_id";
      //   $result = mysqli_query($conn, $sql);

      //   if (mysqli_num_rows($result) > 0) {
      //   $dataa = mysqli_fetch_assoc($result);
      //   $likes = $dataa['likes'];
      //   echo $likes;
      //   } else {
      //    echo "0";
      //   }

      ?>
      <form action="php/insertlike.php" method="post">
        <input type="hidden" value="<?php echo $data['file_name']; ?>" name="photo_id" />
        <input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" name="user_id" />
        <input type="hidden" name="likes" value="1" />
        <div class="like p-2 cursor">
          <button type="submit" name="submit">
            <i class="fa fa-thumbs-o-up">
            </i>
            <span class="ml-1"> Like </span>
          </button>
        </div>
      </form>
      <div class="like p-2 cursor"><i class="fa fa-commenting"></i><span class="ml-1">Comment</span></div>
      <div class="like p-2 cursor"><i class="fa fa-share"></i><span class="ml-1">Share</span></div>
    </div> -->


    <div class="comment">


      <form action="../client/comment.php" method="POST" class="form" style="overflow: scroll; height: 30pc;overflow-x: hidden; overflow-y: scroll; ">
        <div style="display: flex;     margin-top: 15px;     justify-content: space-evenly;">
          <input type="hidden" name="name" value=<?php echo ($_SESSION["name"]); ?> placeholder="Display Name">
          <input type="hidden" name="profile_pic" value=<?php echo ($_SESSION["p_p"]); ?> placeholder="Display Name">
          <div>
            <img src="../client/assets/uploads/<?= $_SESSION['p_p'] ?>" style="width: 36px; height: 36px; border-radius: 50%;">
          </div>
          <div>
            <input id="comment" type="text" name="comment" placeholder="Enter your Comment" style="height: -webkit-fill-available;">
          </div>
          <!-- id of photo Here Using Php  -->
          <input id="comment" type="hidden" name="photo_id_name" value="<?php echo "" . $data['id'] . ""; ?>" placeholder="Enter your Comment">
          <input type="submit" name="comment_submit" class="btn" style="margin-left:10px">
        </div>
        <!-- -------------------------------------Fetch Comment Here ----------------- -->
        <?php
        $id_name_photo = $data["id"];
        $image_fetch = "SELECT comment.name, users.name, users.p_p FROM comment INNER JOIN users ON comment.name ='' AND   users.name=''";
        $cmnt_rst = $conn->query($image_fetch);
        if ($cmnt_rst->num_rows > 0) {
          while ($row_dataa = $cmnt_rst->fetch_assoc()) {
            $commnt_img = $row_dataa['p_p'];
            echo $commnt_img;
          }
        }
        $sqlllll = "SELECT * FROM comment where photo_id='$id_name_photo'";
        $comnt_rslt = $conn->query($sqlllll);
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
                <img src="../client/assets/uploads/user-default.png" width="15" height="20" style="width:3pc; height:3pc; position:relative; left:0px; border-radius:50%; top: 4px;">
              <?php
              } else {
              ?>
                <img src="<?php echo  '../client/assets/uploads/' . $row_data["profile_pic"]; ?>" width="10" height="20" style="width:3pc; height:3pc; position:relative; left:0px; border-radius:50%; top: 4px;">
                <p class="p"> <?php echo  "" . $row_data["name"] . ""  ?> <br>
                  <a> <?php echo  "" . $row_data["comment"] . ""  ?> </a> 
                 

                <?php  } ?>
            </div>
            <!-- reports posts here  -->
            <!-- HTML form for reporting a post -->
            <br>
        <?php
          }
        }
        ?>
        <!-- comment Here  -->
        
      </form>
      <br> <br>
    </div>
    <div class="report">
  <h1 class="mb-3">Report Post</h1>
  <form method="post" action="">
  <input type="hidden" name="post_id" value="<?php echo $image_id ?>">
  <input type="hidden" name="user_id" value="<?php echo $_SESSION["user_id"]; ?>">
  <div class="form-group">
    <label for="reason">Reason for reporting:</label>
    <input type="text" class="form-control" name="reason" id="reason" required>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Report</button>
</form>

  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#shareModal">
  Get Share Link
</button>

<!-- Modal -->
<div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="shareModalLabel">Share Link</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="input-group">
          <input type="text" class="form-control" id="shareLinkInput" readonly>
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" onclick="copyToClipboard()">Copy</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  function copyToClipboard() {
    const shareLinkInput = document.querySelector('#shareLinkInput');
    const currentPageURL = window.location.href;
    shareLinkInput.value = currentPageURL;
    shareLinkInput.select();
    shareLinkInput.setSelectionRange(0, 99999); /* For mobile devices */
    document.execCommand("copy");
    // Optionally, you can provide some visual feedback to the user after copying the link
    // For example: show a tooltip or display a success message
  }
</script>

</div>




  </div>
  </a>
<?php
}
?>



<?php
// Check if the form has been submitted
if (isset($_POST['submit'])) {
  // Get the post ID and reason for reporting from the form
  $post_id = $_POST['post_id'];
  $reason = $_POST['reason'];
  $user_id = $_POST['user_id'];

  // Insert the report into the database
  $conn = new mysqli('localhost', 'root', '', 'chat_app_db');

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "INSERT INTO report_posts (user_id, post_id, reason) VALUES ('$user_id', '$post_id', '$reason')";
  $result = $conn->query($sql);

  if ($result === true) {
    // Set the success message
    $success = "Post has been reported successfully!";
    echo "<script>alert('" . $success . "')</script>";
  } else {
    // Set an error message
    $failed = "Failed to report!";
    echo "<script>alert('" . $failed . "')</script>";
  }

  $conn->close();
}
?>

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

  .display_post{
    display: flex;
    justify-content:space-around;
  }

 

  .post_image{
  width: 500px;
  height: 400px;
  background-color: #fff;
  border: 1px solid #ddd;
  border-radius: 10px;
  box-shadow: 0 0 10px #ddd;
}


.comment{
  box-shadow: 1px 1px 1px 2px #dbdbca;
}

#comment{
  width: 21pc;
  border-radius: 10px;
  border: 1px solid white;

}

.btn{
  border-radius: 10px;
    background-color: #e0dbdb;
    border: 1px solid white;
}
</style>