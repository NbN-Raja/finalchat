<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1> Start Writing Your Blogs </h1>
<div class="container">

    <div class="profile">     <?php include 'include/sidenav.php' ?>
</div>
    <div class="contents">
    <nav>
  <ul>
    <li><a href="../home.php">Home</a></li>
    <li><a href="about.php">About</a></li>
    <li><a href="notifications.php">Notifications</a></li>
    <li><a href="messages.php">Messages</a></li>
    <li class="dropdown">
      <a href="#" class="dropbtn">Profile &#9662;</a>
      <div class="dropdown-content">
        <a href="profile.php">Profile</a>
        <a href="settings.php">Settings</a>
        <a href="logout.php">Logout</a>
      </div>
    </li>
  </ul>
</nav>

<style>
    nav ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  background-color: #f1f1f1;
}

nav li {
  display: inline-block;
}

nav li a {
  display: block;
  padding: 10px 20px;
  text-decoration: none;
  color: #333;
}

nav li a:hover {
  background-color: #ddd;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
}

.dropdown-content a {
  display: block;
  padding: 10px 20px;
  text-decoration: none;
  color: #333;
}

.dropdown:hover .dropdown-content {
  display: block;
}

</style>
    <?php include 'pages/post.php' ?>
</div>
</div>

</body>
</html>

<style>

    .container{
        display: flex;
    }
</style>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
