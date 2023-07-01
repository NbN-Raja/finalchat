<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<div class="col-md-3" id="snav">
  <ul class="nav flex-column p-2">
    <li class="nav-item">
      <a class="nav-link active font-weight-bold" href="http://localhost/main/Analytics/index.php">
        <i class="fas fa-chart-bar"></i> Dashboard
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="http://localhost/main/Analytics/pages/posts.php">
        <i class="fas fa-file-alt"></i> Posts
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="http://localhost/main/Analytics/pages/comment.php">
        <i class="fas fa-comments"></i> Comments
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="http://localhost/main/Analytics/pages/groups.php">
        <i class="fas fa-users"></i> Group Chats
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="http://localhost/main/group/group.php">
        <i class="fas fa-users"></i> Groups
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="fas fa-cog"></i> Settings
      </a>
    </li>
  </ul>
</div>

<style>
  #snav {
    border-radius: 10px;
    font-size: 20px;
    background-color: white;
    box-shadow: 1px 1px 5px 3px whitesmoke;
    padding: 10px;
    margin-bottom: 20px;
  }

  #snav ul li {
    margin-bottom: 10px;
  }

  #snav ul li a {
    color: #333;
    display: flex;
    align-items: center;
    text-decoration: none;
  }

  #snav ul li a:hover {
    color: #0069d9;
  }

  #snav ul li a i {
    margin-right: 10px;
  }
</style>
