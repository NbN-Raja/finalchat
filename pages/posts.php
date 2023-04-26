<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

<?php include 'uploadpost.php' ?>


<?php

$conn = new mysqli('localhost', 'root', '', 'chat_app_db');
$query = $conn->query("SELECT images.id, images.name,images.file_name,images.something,images.uploaded_on,users.user_id,
		  users.name,users.username, users.lastname, users.p_p FROM images
		  LEFT JOIN users ON users.name = images.name Order by images.id DESC");
while ($data = mysqli_fetch_array($query)) {
  $image_id = $data['id'];
  $user_id = $data['user_id'];
  $profile_pic = $data['p_p'];
  $username = $data['username'];
  $name = $data['name'];
  $lastname = $data['lastname'];
  $uplaoded_on = $data['uploaded_on'];
  $something = $data['something'];

?>

  <div class="display_post p-2">
    <div class="display_profile mb-2 bg-white">

      <div class="top_profile" style="display:flex">
        <img src="<?php echo  'client/assets/uploads/' . $profile_pic; ?>" width="10" height="20" style="width:3pc; height:3pc; position:relative; left:0px; border-radius:50%; top: 4px;">

        <div class=" ml-2">
          <b class="font-weight-bold"> <a href="client/user_profile.php?user=<?= $data['username'] ?>" style="color:black">

              <?php echo $name ?>
              <?php echo $lastname ?>
              <br>
              <?php echo last_seen($uplaoded_on) ?>
          </b> </a>
        </div>
        <div class="ml-auto">
          <a href="pages/singlepost.php?user=<?= $data['id'] ?>  ">
            <svg fill="currentColor" viewBox="0 0 20 20" width="1em" height="1em" class="x1lliihq x1k90msu x2h7rmj x1qfuztq xcza8v6 x1qx5ct2 xw4jnvo">
              <g fill-rule="evenodd" transform="translate(-446 -350)">
                <path d="M458 360a2 2 0 1 1-4 0 2 2 0 0 1 4 0m6 0a2 2 0 1 1-4 0 2 2 0 0 1 4 0m-12 0a2 2 0 1 1-4 0 2 2 0 0 1 4 0"></path>
              </g>
            </svg>
          </a>

        </div>

      </div>
      <div class="pt-2">
        <?php echo $something ?>

      </div>
      <br>
      <?php
$file_name = $data['file_name'];
if ($file_name != '') {
  $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
  if (in_array($file_ext, array('jpg', 'jpeg', 'png', 'gif'))) {
      // Display image file
      echo '<img class="post_image" src="client/assets/post/' . $file_name . '"><br>';
  } else if ($file_ext == 'mp4') {
      // Display video file
      
      if ($file_name != '') {
          echo '<video class="post_video" controls style="    width: -webkit-fill-available;">
                    <source src="client/assets/post/' . $file_name . '" type="video/mp4" >
                </video><br>';
      }
  } else {
      // Unsupported file format
      echo 'Unsupported file format: ' . $file_ext;
  }
}
?>





    </div>
    <hr>
    <!-- Like Comment And Share Button here  -->
    <div class="d-flex flex-row" style="    justify-content: space-between;">
      <!-- Start of Like Button Here  -->



      <form action="php/insertlike.php" method="post">
        <input type="hidden" value="<?php echo $image_id; ?>" name="Photo_id" />
        <input type="hidden" value="<?php echo $data['user_id']; ?>" name="user_id" />
        <input type="hidden" name="likes" value="1" />
        <div class="like p-2 cursor">
          <button type="submit" name="submit" style="border:none">
            <i class="fa fa-thumbs-o-up">
            </i>
            <span class="ml-1">
              <?php
              $conn = mysqli_connect('localhost', 'root', '', 'chat_app_db');

              $sql = "SELECT likes FROM likes WHERE Photo_id = $image_id AND user_id = $user_id";
              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                $dataa = mysqli_fetch_assoc($result);
                $likes = $dataa['likes'];
                echo $likes;
              } else {
                echo "0";
              }
              $userrid = $data['user_id'];
              ?> </span>
          </button>
        </div>
      </form>
      <!-- End of Like Php Here  -->
      <div class="like p-2 cursor"><i class="fa fa-commenting"></i><span class="ml-1">
          <a href="pages/singlepost.php?user=<?= $data['id'] ?>  ">
            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'chat_app_db');

            $sql = "SELECT COUNT(comment) as comment from comment WHERE Photo_id = $image_id ";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
              $dataa = mysqli_fetch_assoc($result);
              $comment = $dataa['comment'];
              echo $comment;
            } else {
              echo "0";
            }
            $userrid = $data['user_id'];
            ?>

            Comment </a></span></div>
      <div class="like p-2 cursor"><i class="fa fa-share"></i><span class="ml-1">Share</span></div>
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
            <input id="comment" type="text" name="comment" placeholder="Enter your Comment" style="height: -webkit-fill-available;" autocomplete="off">


            <script>
              var comments = ["Wow, great post!", "Awesome content!", "Love it!"];

              var commentField = document.getElementById("comment");
              commentField.addEventListener("click", function() {
                var popup = document.createElement("div");
                popup.style.position = "absolute";
                popup.style.top = (commentField.offsetTop + commentField.offsetHeight) + "px";
                popup.style.left = commentField.offsetLeft + "px";
                popup.style.width = commentField.offsetWidth + "px";
                popup.style.backgroundColor = "#fff";
                popup.style.border = "1px solid #ccc";
                popup.style.padding = "10px";
                popup.style.boxShadow = "0px 2px 5px #ccc";

                for (var i = 0; i < comments.length; i++) {
                  var comment = document.createElement("div");
                  comment.innerText = comments[i];
                  comment.style.padding = "5px";
                  comment.style.cursor = "pointer";
                  comment.addEventListener("click", function() {
                    commentField.value = this.innerText;
                    popup.style.display = "none";
                  });
                  popup.appendChild(comment);
                }

                document.body.appendChild(popup);

                document.body.addEventListener("click", function(e) {
                  if (!popup.contains(e.target) && e.target != commentField) {
                    popup.style.display = "none";
                  }
                });
              })
            </script>

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
        } else {
          ?>
          <hr>
          <div class="showcomment" style="position:relative;">

            <img src="client/assets/uploads/user-default.png" width="10" height="20" style="width:3pc; height:3pc; position:relative; left:0px; border-radius:50%; top: 4px;">
            <p class="p" style="color:green"> <?php echo  'Admin';  ?> <br>
              <a> Please Enter Your First Comment </a> <br>
          </div>

        <?php
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

          .comment input[type="text"] {
            width: 25pc;
            margin-top: 4pc;
            height: 28px;
            margin: 0 auto;
            border: none;
            border: solid 1px #ccc;
            border-radius: 10px;
            margin-top: 6px;
          }

          .posting {
            box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);
            background-color: rgb(255 255 255);
            border-radius: 8px;
            border: 1px solid #f0e9e9;
            /* position: relative; */
            position: sticky;
            left: 28pc;
            width: 35pc;
            box-shadow: 0px 0px 0px 0 rgb(0 0 0 / 20%), 1px -1px 3px 0 rgb(0 0 0 / 19%);

          }

          
        </style>

        <!-- comment Here  -->


        <br>
      </form>
      <br> <br>
    </div>


  </div>
  </a>
<?php
}
?>


