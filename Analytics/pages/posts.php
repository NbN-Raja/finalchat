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
                      // Loop through each row in the result
                      while ($row = $result->fetch_assoc()) {
                          // Display the username, caption, and image in a styled format
                          echo "<div class='display'>";
                          echo "<h5>" . $row['name'] . "</h5>";
                          echo "<p>" . $row['something'] . "</p>";
                          echo "<img src='http://localhost/main/client/assets/post/" . $row['file_name'] . "' alt='" . $row['something'] . "' style='width:60px; height:60px; border-radius:5px'>";
                          echo "</div>";

                          
                      }
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

  .Linkup{

    box-shadow: 1px 1px 1px 1px whitesmoke;
  }
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