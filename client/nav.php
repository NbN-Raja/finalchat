
<!DOCTYPE html>
<html lang="en">
<?php include 'nav_header.php' ?>
<link rel="stylesheet" href="assets/css/landing_page.css">
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
			<a href="#" class="nav-item nav-link active">Home</a>
		</div>
		<div class="navbar-nav ml-auto mr-5">
			<a href="profile.php" class="nav-item nav-link notifications"><i class="fa fa-bell-o"></i><span class="badge">1</span></a>
			<a href="final_one.php" class="nav-item nav-link messages"><i class="fa fa-envelope-o"></i><span class="badge">1</span></a></a>
			<div class="nav-item dropdown">
				<a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action">
        
            <img src="assets/uploads/<?=$user['p_p']?>"class="w-30 rounded-circle" height="36" width="36">
            <?php echo htmlspecialchars($_SESSION["name"]); ?><b class="caret"></b></a>
				<div class="dropdown-menu">
					<a href="home.php" class="dropdown-item"><i class="fa fa-user-o"></i> Profile</a></a>
					
					<a href="settings.php" class="dropdown-item"><i class="fa fa-sliders"></i> Settings</a></a>
					<div class="dropdown-divider"></div>
					<a href="logout.php" class="dropdown-item"><i class="material-icons">&#xE8AC;</i> Logout</a></a>
				</div>
			</div>
		</div>
	</div>
</nav>