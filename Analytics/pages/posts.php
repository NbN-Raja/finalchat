<?php include '../components/nav.php';
include '../db.php';

$usernamee= $_SESSION['username']
?>

<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <?php require_once '../components/sidenav.php'; ?>

    <!-- Main content -->
    <div class="col-md-9 pt-2" id="sdash">
      <p> All Your Posts appear here <i> You can easily manage here </i> </p>
      

      <div class="row" id="posts">
        <div class="Linkup col-4 col-sm-4">
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
$sql = "SELECT * FROM images WHERE name='$usernamee'";
$result = $con->query($sql);

// Check if there is a result
if ($result->num_rows > 0) {
  // Start the grid container
  echo "<div class='grid-container'>";

  // Loop through each row in the result
  while ($row = $result->fetch_assoc()) {
    // Display each item in a grid cell
    echo "<div class='display'>";
    echo "<h5>" . $row['name'] . "</h5>";
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
                          // Display the username, caption, and image in a styled format
                          echo "<div class='display'>";
                          echo "<h5>" . $row['title'] . "</h5>";
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

 
  #posts {
    justify-content: space-around;
  }
  .display{
    border: 1px solid white;
     padding: 10px;
      margin-bottom: 10px;
      box-shadow: 1px 1px 1px 1px white;
      padding: 2px;

  }
</style>

<style>
  .grid-container {
    display: grid;
    grid-template-columns: repeat(3, 1fr); /* Adjust the number of columns as needed */
    grid-gap: 20px; /* Adjust the gap between grid cells as needed */
  }

  .display {
    border: 1px solid grey;
    background-color: azure;
    padding: 12px;
    border-radius: 5px;
  }
</style>
