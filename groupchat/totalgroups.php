<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<?php include '../client/nav_header.php' ?>
<link rel="stylesheet" href="../client/assets/css/landing_page.css">

<body>
  <nav class="navbar navbar-expand-sm navbar-light fixed-top ">
    <a href="../home.php" class="navbar-brand mr-3"><i class="fa fa-cube"></i><b>Link Up</b></a>
    <form class="navbar-form form-inline mr-4" style="margin-right:30px;">
      <div class="input-group search-box">
        <input type="text" id="searchText" class="form-control" placeholder="Search by Name">
        <span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
      </div>
    </form>
    <!-- Collection of nav links, forms, and other content for toggling -->
    <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start ml-5">
      <div class="navbar-nav">
        <a href="#" class="nav-item nav-link active"> Link Up</a>
        </i>
      </div>
      <div class="navbar-nav ml-auto mr-5">
        <a href="profile.php" class="nav-item nav-link notifications"><i class="fa fa-bell-o"></i><span class="badge"></span></a>
        <a href="final_one.php" class="nav-item nav-link messages"><i class="fa fa-envelope-o"></i><span class="badge"></span></a></a>
        <div class="nav-item dropdown">
          <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action">

            <img src="../client/assets/uploads/<?= $_SESSION['p_p'] ?>" class="w-30 rounded-circle" height="36" width="36">
            <?php echo htmlspecialchars($_SESSION["username"]); ?><b class="caret"></b></a>
          <div class="dropdown-menu">
            <a href="client/home.php" class="dropdown-item"><i class="fa fa-user-o"></i> Profile</a></a>

            <a href="client/settings.php" class="dropdown-item"><i class="fa fa-sliders"></i> Settings</a></a>
            <div class="dropdown-divider"></div>
            <a href="client/logout.php" class="dropdown-item"><i class="material-icons">&#xE8AC;</i> Logout</a></a>
          </div>
        </div>
      </div>
    </div>
  </nav>



  <?php
  $name = $_SESSION['name'];
  echo $name;
  $conn = new mysqli('localhost', 'root', '', 'chat_app_db');
  if (isset($_POST['submit'])) {
    $room_name = $_POST['room_name'];
    $name =  $_POST['name'];;

    $sql = "INSERT INTO `chat_room` ( `name`,`room_name`) VALUES ( '$name', '$room_name')";
    // $_SESSION['room_name'] = $chat_name;
    $result = mysqli_query($conn, $sql);
    if ($result) {
      echo "yo";
    } else {
      echo "Error";
    }
    // echo $_SESSION['room_name'] ;
    // if($result){
    //   header('location:search_post.php');
    // }
    // $_SESSION['room'] = '$chat_name';
  }
  
  ?>


  

  <style>
   
    

    /* Rest of the CSS styles remain the same */
  </style>

  <div class="flex">

  <?php include 'sidenav.php'; ?>

    <div class="groups">
      
      
 

      <div>
        <h1> Your Total Groups</h1>
      </div>
      <?php
      $sql = "SELECT * FROM chat_room";

      // $sql="SELECT * FROM groupchat INNER JOIN users ON users.name = '$name' AND groupchat.name ='$name' Where chat_room = $chat;";
      // $sqll ="SELECT * FROM groupchat INNER JOIN users ON users.name = 'Noblesse' AND groupchat.name ='Noblesse' ";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
          $id = $row['id'];
          $room_name = $row['room_name'];

          echo "<div class='message'>
      
        <div class='box'>
          <a href='display.php?user_id=$id&room_name=$room_name'>
            <strong>" . $row["room_name"] . "</strong>: 
          </a>";
          echo "<p> ID:" . $row["id"] . "</> <br><a href='#' class='delete-link' data-id='$id'>Delete </a> </p>";

          echo "  </div>";


          $iddd = $row['id'];
          $sqll = "SELECT name, MAX(chats) AS msg FROM `groupchat` WHERE chat_room = '$iddd' AND name = '$name'";
          $resultt = $conn->query($sqll);

          if ($resultt->num_rows > 0) {
            // Output data of each row
            while ($rows = $resultt->fetch_assoc()) {
              echo "<a class='gm'>" . $rows["msg"] . "</a>";
              echo "</div>";
            }
          }
        }
      }
      ?>


    </div>



   

    <div class="section">
      <h2>Search Groups</h2>
      <input type="text" placeholder="Enter group name">
      <button class="search-button">Search</button>
      <hr>
      <h2>Create New Group</h2>

      <form action="index.php" method="post">
        <div class="create-form">
          <input type="text" class="form-control" name="room_name" placeholder="Enter group name">
          <input type="hidden" class="form-control" name="name" value="<?php echo $name; ?>">
          <button type="submit" name="submit" class="create-button">Create</button>
        </div>
      </form>
      
    </div>
  </div>


  </div>




  <style>
    body {
      background-color: #ededed;
    }

    .flex {
      display: flex;
    margin-top: 4pc;
    justify-content: center;
    align-items: flex-start;
    }

    .room {
      max-width: 27pc;
      position: relative;
      padding: 10px;
      border: 1px solid black;
      background-color: white;
      border-radius: 10px;
      height: 11pc;
      flex-grow: 1;
    }

    .groups {
      overflow: auto;
      height: 40pc;
      position: relative;
      width: 35%;
      margin-right: 10px;
    }

    .groups h1 {
      position: sticky;
      top: 0;
    }
  </style>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- <p> total chats rooms </p> -->
  <?php

  if (isset($_post['searchh'])) {

    $room_name = $_POST['room_name'];

    // $search ="SELECT * FROM `groupchat` where room_name= '$room_name' AND chat_room = '$chat_roomm'";
    $search = "SELECT * FROM `chat_room` where chat_room = 5;";

    $result = mysqli_query($conn, $search);

    if ($result) {
      echo "<h1> dsfjhds </h1>";
      header('location:display.php');
    } else {
      echo "no result";
    }
  }


  ?>


  <!-- display chat here
<?php


include 'config.php';




$sql = "SELECT * FROM `chat_room` where room_name= '$room_name'";
// $sql="SELECT * FROM groupchat INNER JOIN users ON users.name = '$name' AND groupchat.name ='$name' Where chat_room = $chat;";
// $sqll ="SELECT * FROM groupchat INNER JOIN users ON users.name = 'Noblesse' AND groupchat.name ='Noblesse' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while ($row = $result->fetch_assoc()) {
    // echo $p = "<img src='../client/assets/img/group.png' style='width:20px;height:20px;'>";
    // $p_p = " <h3 class='group_name'> " . $row["room_name"] . "</h3> 
    // <a href='index.php' style='position: relative;
    // left: 67pc; background-color:red; color:white; text-decoration:none; padding:2px; border-radius:3px;
    // top: 10px;'> Leave Room </a> <br><br>";

    // echo $p_p;
    // echo "" .$row['id']."<br>";
    // echo "" .$row['room_name']."";
    $chat_roomm = "" . $row['id'] . "";
  }
}
?>

<!-- submit Hello World To Group message  -->
  <?php


  // if(isset($_POST['submit'])){
  //   $chat_room= $_POST['chat_room'];
  //   $chats =  $_POST['chats'];

  // $sqll = "INSERT INTO groupchat ( 'chats','chat_room') VALUES ( '$chats', '$chat_room')";
  // // $_SESSION['room_name'] = $chat_name;

  // $result =mysqli_query($conn,$sqll);

  // // echo $_SESSION['room_name'] ;
  // // if($result){
  // //   header('location:search_post.php');
  // // }

  // // $_SESSION['room'] = '$chat_name';

  // if ($result) {
  // 
  ?>






  <style>
    .container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }

    .section {
      margin: 10px;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #f9f9f9;
    }

    .section h2 {
      margin-top: 0;
    }

    .group-list {
      margin-top: 10px;
    }

    .group {
      display: flex;
      align-items: center;
      margin-bottom: 5px;
    }

    .group a {
      margin-right: 10px;
      color: #007bff;
      text-decoration: none;
    }

    .group a:hover {
      text-decoration: underline;
    }

    .delete-link {
      color: red;
      text-decoration: none;
    }

    .delete-link:hover {
      text-decoration: underline;
    }

    .join-link {
      color: #28a745;
      text-decoration: none;
    }

    .join-link:hover {
      text-decoration: underline;
    }

    .search-form,
    .create-form {
      display: flex;
      align-items: center;
      margin-top: 10px;
    }

    .search-form input,
    .create-form input {
      flex-grow: 1;
      padding: 5px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    .search-button,
    .create-button {
      margin-left: 10px;
      padding: 5px 10px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }

    .search-button:hover,
    .create-button:hover {
      background-color: #0056b3;
    }
  </style>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 <style>
p{
  background-color: aliceblue;
    padding: 15px;
    border-radius: 11px;
    display: list-item;
}

strong{
  font-size:30px;
}

.box{
  display: flex;
  justify-content: space-between;
}



</style>

<style>
  .message {
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 10px;
    background-color: #f9f9f9;
    border-radius: 5px;
  }

  .message p {
    margin: 0;
    font-size: 16px;
  }

  .message a {
    color: black;
    text-decoration: none;
  }

  .message a:hover {
    text-decoration: underline;
  }

  .message a.delete {
    color: red;
    margin-left: 10px;
  }

  .gm{
    position: relative;
    bottom:30px;
    color: black;
  }
</style>

 
 
 
 
 
 
 
 