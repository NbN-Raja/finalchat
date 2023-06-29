<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<div class="col-md-9 pt-2" id="sdash">
  <p class="fold-style-bold"> DashBoard </p>
  <div class="row p-2">
    <!-- Total Posts -->
    <div class="col-md-4 pb-3">
      <div class="card">
        <div class="card-body d-flex align-items-center">
          <i class="fas fa-file-alt fa-3x mr-3"></i>
          <div>
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
              echo $count;
              ?>
            </p>
          </div>
        </div>
      </div>
    </div>


    <div class="col-md-4 pb-3">
      <div class="card">
        <div class="card-body d-flex align-items-center">
          <i class="fas fa-comments fa-3x mr-3"></i>
          <div>
            <h5 class="card-title">Total Comment</h5>
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
    </div>
    <div class="col-md-4 pb-3">
      <div class="card">
        <div class="card-body d-flex align-items-center">
          <i class="fas fa-thumbs-up fa-3x mr-3"></i>
          <div>
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
    <div class="col-md-4 pb-3">
      <div class="card">
        <div class="card-body d-flex align-items-center">
          <i class="fas fa-file-alt fa-3x mr-3"></i>
          <div>
            <h5 class="card-title">Total Community Posts</h5>
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
    </div>


    <div class="col-md-4 pb-3">
      <div class="card">
        <div class="card-body d-flex align-items-center">
         <i class="fa-sharp fa-regular fa-comments fa-fade fa-3x mr-3" style="color: #a7aaae;"></i>
          <div>
            <h5 class="card-title">Total Groups Chats </h5>
            <p class="card-text">
              <?php
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
              ?>
            </p>
          </div>
        </div>
      </div>
    </div>


    <div class="col-md-4 pb-3">
      <div class="card">
        <div class="card-body d-flex align-items-center">
        <i class="fa-sharp fa-regular fa-comments  fa-3x mr-3" style="color: #a7aaae;"></i>
           <div>
            <h5 class="card-title">Total Groups </h5>
            <i class="fa-thin fa-user-group-simple fa-fade"></i>
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
    </div>




    


  </div>

<style>
  p{
    font-size: revert;
    font-weight: 700;
    color: #65676b;
  }
</style>



  <!-- barchart starts here  -->

  <div class="barchart">
    <div class="text">
      <h1>Bar chart </h1>
    </div>

    <div class="dislaychart">
      <?php

      include 'graph.php';

      ?>

      <style>
        card-body i {
          font-size: -webkit-xxx-large;
        }
      </style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/v4-shims.min.css" integrity="sha512-4yDn1AmIfvyydlRqsIga3JribpHu5HdkIFTBZjJPcz01tcsd8B9UwObwZCGez1ZOyUNnxjNQNcZEElhkguF76Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />