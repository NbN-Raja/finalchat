<?php
if(!empty($_SESSION['username'])){
  //redirect to login page
  header('Location: ../server/http/auth.php');
  die;
}else{

}
?>
<!-- check User Access Or Blocked  -->

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
  while($row = $result->fetch_assoc()) {
    // $imageURL = 'uploads/'.$row["p_p"];
    $name= "".$row["name"];
    $lastname= "".$row["lastname"];
    $gender= "".$row["gender"];
    $email= "".$row["email"];
    $is_blocked= "".$row["is_blocked"];
    $report= "".$row["report"];

    if($row["is_blocked"] ==1){
        
        header('location:blocked.php');
   
    }else{
        
    }

    
    if($row["report"] >=5){
        
      header('location:client/reportblocked.php');
 
  }else{
      
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
        <!-- Side Nav Here Starts  -->
        <?php include 'client/landing/side_nav.php' ?>

       

        <!-- End Of Side NAV  -->

        <!-- Main Posting Here Second Column -->
       <?php include 'client/landing/display_post.php' ?>
       
       
    

        <!-- End Of Second Column -->
        
        <!-- Post Here  -->
        <?php include 'client/landing/post.php' ?>
        

       <!--  Contacts Here  -->
       <?php include 'client/landing/contacts.php' ?>

    </div>

    


<style>

  body{
    background-color:#f0f2f5;
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
  .menu, .main, .firstcolumn {
    width: 20%;
  }
  .posting form {
      width:20%;
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