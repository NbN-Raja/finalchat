<?php include '../components/nav.php';
include '../db.php';

$name = $_SESSION['name']; // Store the session variable in a variable to avoid SQL injection
?>

<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <?php require_once '../components/sidenav.php'; ?>

    <!-- Main content -->
    <div class="col-md-9 pt-2" id="sdash">
      <div class="">
        <h1>Total Comments In Your Posts </h1>
        <?php
        $sql = "SELECT * FROM images WHERE name='$name'";
        $result = $con->query($sql);

        // Check if there is a result
        if ($result->num_rows > 0) {
          // Loop through each row in the result
          while ($row = $result->fetch_assoc()) {
            // Display the username, caption, and image in a styled format
            echo "<div class='display'>";
            echo "<div class='flex-container' >";
            echo "<h5>" . $row['name'] . "</h5>";
            echo "<p>" . $row['uploaded_on'] . "</p>";
            echo "</div>";
            $something = $row['something'];
            $cutSomething = substr($something, 0, 10);
            echo "<p>" . $cutSomething . "</p>";

            $post_file = $row['file_name'];
            if ($post_file != '') {
              $file_extension = pathinfo($post_file, PATHINFO_EXTENSION);
              if (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif', 'bmp'])) {
                echo '<img class="post_image" width="90" height="90" src="http://localhost/main/client/assets/post/' . $post_file . '"><br>';
              } elseif (in_array($file_extension, ['mp4', 'webm', 'ogg'])) {
                echo '<video class="post_video" controls width="90" height="90">
            <source src="http://localhost/main/client/assets/post/' . $post_file . '" type="video/' . $file_extension . '">
          </video><br>';
              } else {
                echo '<p>' . $post_file . '</p><br>';
              }
            } else {
              echo '<p style="    height: 83px;">  </p><br>';
            }



            $photo_idd = "" . $row['id'] . "";
            $sql2 = "SELECT COUNT(comment) as count FROM comment WHERE  photo_id='$photo_idd'";
            $result2 = $con->query($sql2);

            // Check if there is a result
            if ($result2->num_rows > 0) {
              // Fetch the result
              $row2 = $result2->fetch_assoc();

              // Display the count of comments
              echo "<p> <a href='http://localhost/main/Analytics/pages/fetchcomment.php?id=$photo_idd' > comments" . $row2['count'] . " </a></p>";
              echo "</div>";
            } else {
              echo "No results found.";
              echo "</div>";
            }
          }
        } else {
          echo "No results found.";
          echo "</div> <br>";
        }



        ?>

        <div class="totalcomments">
          <p> Your Total Comments Are </p>
        </div>
      </div>

    </div>
  </div>
</div>

<style>
  .display {
    border: 1px solid grey;
    background-color: azure;
    box-shadow: inset 0px 0px 2px 1px #f3f3f2;
    padding: 12px;
    border-right-width: thick;
    width: 12pc;
    display: inline-block;
    padding:10px
  }

  .post_image {
    display: block;
    margin-bottom: 10px;
  }

  .post_video {
    display: block;
    margin-bottom: 10px;
  }
</style>