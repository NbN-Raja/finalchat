<?php include '../components/nav.php';
include '../db.php';

$usernamee = $_SESSION['username']
?>

<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <?php require_once '../components/sidenav.php'; ?>

    <!-- Main content -->
    <div class="col-md-9 pt-2" id="sdash">


      <div class="row" id="posts">
      <div class="Linkup col-5" style="-webkit-box-flex: 2; -ms-flex: 0 0 41.666667%; flex: 6 0 47.666667%; max-width: 56.666667%;">
          <div class="info-box">
            <div class="">
              <h5>Total Posts</h5>
              <p>
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
              </p>
            </div>

            <div class="showpost">

            <?php
  $sql = "SELECT * FROM images WHERE name='$usernamee' ORDER BY `uploaded_on` DESC";
  $result = $con->query($sql);

  // Check if there is a result
  if ($result->num_rows > 0) {
   
    // Start the grid container
    echo "<div class='grid-container'>";

    // Loop through each row in the result
    while ($row = $result->fetch_assoc()) {
      $pid=$row['id'];
      // Display each item in a grid cell
     
      echo '<div class="shadow display card">';
      // echo "<h5 >" . $row['name'] . "</h5>";
      
      $something = $row['something'];
      $uploaded_on  = $row['uploaded_on'];
      $cutSomething = substr($something, 0, 10);
      $dateObject = new DateTime($uploaded_on);
      ?>
      <div class="info-container">
      <?php
      $dateObject = new DateTime($uploaded_on);
      echo '<p class="info-date">' . htmlspecialchars($dateObject->format('Y-m-d')) . '</p>';
      echo '<p><a class="info-link" href="http://localhost/main/pages/singlepost.php?user=' . $pid . '">' . $cutSomething . '</a></p>';
      ?>
  </div>
  <?php
      $post_file = $row['file_name'];
      if ($post_file != '') {
        $file_extension = pathinfo($post_file, PATHINFO_EXTENSION);
        if (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif', 'bmp'])) {
          echo '<img class="post_image"  src="http://localhost/main/client/assets/post/' . $post_file . '"><br>';
        } elseif (in_array($file_extension, ['mp4', 'webm', 'ogg'])) {
          echo '<video class="post_video" controls >
                  <source src="http://localhost/main/client/assets/post/' . $post_file . '" type="video/' . $file_extension . '">
                </video><br>';
                
        } else {
          echo '<p>' . $post_file . '</p><br>';
        }
      } else {
        echo '<p style="height: 83px;"></p><br>';
      }
    

      echo "</div>";
    }

    // End the grid container
    echo "</div>";
  } else {
    echo "No results found.";
  }
?>


            </div>
          </div>
        </div>

        <div class="communities col-3 col-sm-3">
          <div class="info-box">
            <div class="">
              <h5>Total Community Posts</h5>
              <p>
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
              </p>
            </div>
            <div class="showcommunity">

              <?php
              $sql = "SELECT * FROM community WHERE username='$usernamee'";
              $result = $con->query($sql);

              // Check if there is a result
              if ($result->num_rows > 0) {
                // Loop through each row in the result
                while ($row = $result->fetch_assoc()) {
                  $cid=$row['id'];
                  // Display the username, caption, and image in a styled format
                  echo "<div class='display'>";
                  echo "<h5>  " . '<a style="color:black" href="http://localhost/main/Blog/singlepost.php?cid=' . $cid . '">' . "" . $row['title']  . "</a></h5>";
                  echo "<p>" . $row['tags'] . "</p>";


                  echo "<img src='http://localhost/main/client/assets/uploads/" . $row['p_p'] . "' alt='" . "' style='width:60px; height:60px; border-radius:5px'>";


                  echo "</div>";
                }
              } else {
                echo "No results found.";
              }

              // Close the connection when you're done
              $con->close();

              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<style>

  body{
    background-color: #f3f2ef;
  }
  #posts {
    justify-content: space-around;
  }

  .display {
    padding: 10px;
    margin-bottom: 10px;
    padding: 2px;
    width: 10pc;

  }
</style>

<style>
  .grid-container {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 21px;
  }

  .display {
    background-color: white;
    padding: 12px;
    border-radius: 5px;
  }
  .post_image, .post_video {
    height: 100px;   /* or any other value you prefer */
    width: 100px;   /* or any other value you prefer */
    object-fit: cover;  /* to maintain aspect ratio and cover the entire width/height */
    display: block;     /* to remove any extra spacing around the image/video */
}


  h5{
    color: #65676b;
  }


    .info-container {
        padding: 10px;
        border: 1px solid #e0e0e0;
        border-radius: 10px;
        background-color: #f9f9f9;
        width: max-content;
        margin: 10px 0;
    }

    .info-container p {
        margin: 5px 0;
    }

    .info-link {
        color: black;
        text-decoration: none;
        font-weight: bold;
    }

    .info-link:hover {
        text-decoration: underline;
    }

    .info-date {
        font-size: 0.9em;
        color: #555;
    }
</style>



