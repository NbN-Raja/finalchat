<?php 

require_once 'session.php';



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css" integrity="sha512-9YHSK59/rjvhtDcY/b+4rdnl0V4LPDWdkKceBl8ZLF5TB6745ml1AfluEU6dFWqwDw9lPvnauxFgpKvJqp7jiQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
<div class="sidebar">
  <div class="profile">
    <img src="../client/assets/uploads/<?= $_SESSION['p_p']?>" class="w-30 rounded-circle" >

    <h2><?php echo $name; '<br>'; echo  $lastname ; ?></h2>
   
  </div>
  <ul>
    <li><i class="fa fa-envelope"></i> <?php echo $_SESSION['email'];  ?></li>
    <li><i class="fas fa-file-alt"></i> <a href="post.php">Post  Blog</a> </li>
    <li><i class="fa fa-file-alt"></i> <a href="home.php">Home  Blog</a> </li>
    <li><i class="fa fa-file-alt"></i> <a href="search.php">Search  Blog</a> </li>
    <!-- Button trigger modal -->


<!-- Modal -->


  </ul>
</div>

</body>
</html>

<style>
    .sidebar {
  background-color: #f1f1f1;
  height: 100%;
  width: 200px;
  position: fixed;
  top: 0;
  left: 0;
}

.profile {
  text-align: center;
  padding: 20px;
}

.profile img {
  border-radius: 50%;
  height: 100px;
  width: 100px;
  object-fit: cover;
}

.profile h2 {
  margin-top: 10px;
  font-size: 1.6em;
}

.profile h3 {
  margin-top: 5px;
  font-size: 1em;
  color: #999;
}

ul {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

li {
  padding: 10px;
  font-size: 0.9em;
  color: #333;
  border-bottom: 1px solid #ddd;
  font-weight: 500;
  font-size: medium;
    color: #605f5f;
}

li:last-child {
  border-bottom: none;
}

i {
  margin-right: 10px;
  font-size: 1.2em;
  color: #666;
}



</style>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
