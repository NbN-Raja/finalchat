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
                          echo "<h5>" . $row['name'] . "</h5>";
                          echo "<img src='http://localhost/main/client/assets/post/" . $row['file_name'] . "' alt='" . $row['something'] . "' style='width:60px; height:60px; border-radius:5px'>";


                          $photo_idd ="" . $row['id'] ."" ;
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
.display{
    border: 1px solid grey;
    background-color: azure;
    padding: 12px;
    border-right-width: thick;
    width: 12pc;
    display: inline-block;
}

</style>

