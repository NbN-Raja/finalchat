<?php 
include 'db.php';

?>
<!DOCTYPE html>
<html>
  <head>
    <title>User Dashboard</title>
    <!-- Include Bootstrap CSS -->
  </head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

  <body class="bg-aliceblue" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
    <!-- Navigation bar -->
    <?php include 'components/nav.php'; ?>
    
    <div class="container-fluid">
      <div class="row">
        <!-- Sidebar -->
        <?php include 'components/sidenav.php'; ?>

        
        <!-- Main content -->
        <?php include 'components/dashboard.php'; ?>

  </div>
</div>

<!-- Include jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


