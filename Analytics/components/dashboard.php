
<div class="col-md-9 pt-2" id="sdash">
    <p class="fold-style-bold"> DashBoard </p>
          <div class="row p-2">
            <!-- Total Posts -->
            <div class="col-md-4">
              <div class="card">
                <div class="card-body ">
                  <h5 class="card-title">Total Posts</h5>
                  <p class="card-text">
                  <?php
              // Establishing a database connection
              $conn = new PDO("mysql:host=localhost;dbname=chat_app_db", "root", "");

              // Query to fetch the count of images with name "Testadmin"
              $name = $_SESSION['name']; // Store the session variable in a variable to avoid SQL injection
              $userid = $_SESSION['user_id']; // Store the session variable in a variable to avoid SQL injection
              $sql = "SELECT COUNT(name) FROM `images` WHERE name='$name'";

              // Executing the query and fetching the result
              $stmt = $conn->query($sql);
              $count = $stmt->fetchColumn();
              

              // Outputting the result
              echo  $count;
              ?>
                  </p>
                </div>
              </div>
            </div>
            
            <!-- Total Comments -->
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Total Comments</h5>
                  <p class="card-text">
                  <?php
              // Establishing a database connection
              $conn = new PDO("mysql:host=localhost;dbname=chat_app_db", "root", "");

              // Query to fetch the count of images with name "Testadmin"
              $name = $_SESSION['name']; // Store the session variable in a variable to avoid SQL injection
              $sql = "SELECT COUNT(comment) FROM `comment` WHERE name='$name'";

              // Executing the query and fetching the result
              $stmt = $conn->query($sql);
              $count = $stmt->fetchColumn();
              

              // Outputting the result
              echo  $count;
              ?>
                  </p>
                </div>
              </div>
            </div>
            
            <!-- Total Likes -->
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Total Likes</h5>
                  <p class="card-text">
                  <?php
              // Establishing a database connection
              $conn = new PDO("mysql:host=localhost;dbname=chat_app_db", "root", "");

              // Query to fetch the count of images with name "Testadmin"
              $name = $_SESSION['name']; // Store the session variable in a variable to avoid SQL injection
              $sql = "SELECT COUNT(likes) FROM `likes` WHERE user_id='$userid'";
             

              // Executing the query and fetching the result
              $stmt = $conn->query($sql);
              $count = $stmt->fetchColumn();
              

              // Outputting the result
              echo  $count;
              ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
          
          <div class="row p-2">
            <!-- Total Shares -->
            <div class="col-md-4">
              <div class="card">
                        <!-- Total Followers -->
        
            <div class="card-body">
              <h5 class="card-title">Total community posts</h5>
              <p class="card-text">
              <?php
              // Establishing a database connection
              $conn = new PDO("mysql:host=localhost;dbname=chat_app_db", "root", "");

              // Query to fetch the count of images with name "Testadmin"
              $name = $_SESSION['name']; // Store the session variable in a variable to avoid SQL injection
              $sql = "SELECT COUNT(username)  FROM `community` where username='$name'";
             

              // Executing the query and fetching the result
              $stmt = $conn->query($sql);
              $count = $stmt->fetchColumn();
              

              // Outputting the result
              echo  $count;
              ?>
              </p>
            </div>
          </div>
        </div>
        
        <!-- Total Following -->
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Total Your Groups</h5>
              <p class="card-text">
              <?php
              // Establishing a database connection
              $conn = new PDO("mysql:host=localhost;dbname=chat_app_db", "root", "");

              // Query to fetch the count of images with name "Testadmin"
              $name = $_SESSION['name']; // Store the session variable in a variable to avoid SQL injection
              $sql = "SELECT COUNT(admin_id)  FROM `groups` where admin_id='$userid'";
             

              // Executing the query and fetching the result
              $stmt = $conn->query($sql);
              $count = $stmt->fetchColumn();
              

              // Outputting the result
              echo  $count;
              ?>
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Total Group chats</h5>
              <p class="card-text"><?php
              // Establishing a database connection
              $conn = new PDO("mysql:host=localhost;dbname=chat_app_db", "root", "");

              // Query to fetch the count of images with name "Testadmin"
              $name = $_SESSION['username']; // Store the session variable in a variable to avoid SQL injection
              $sql = "SELECT COUNT(name)  FROM chat_room WHERE name = '$name'";
             

              // Executing the query and fetching the result
              $stmt = $conn->query($sql);
              $count = $stmt->fetchColumn();
              

              // Outputting the result
              echo  $count;
              echo  $name;
              ?></p>
            </div>
          </div>
        </div>
      </div>



      <!-- barchart starts here  -->

      <div class="barchart">
        <div class="text">
          <h1>Bar chart </h1>
        </div>

        <div class="dislaychart">
 <?php 

 include 'graph.php';

 ?>

