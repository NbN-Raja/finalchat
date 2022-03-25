<?php 
  session_start();

  if (!isset($_SESSION['username'])) {

?>




<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
	<title>Bootstrap Simple Registration Form</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>

<body>
	<div class="container">
		<div class="image">
			<h1> Signup Here </h1>
		</div>
		<div class="signup-form">
			<form method="post" action="../server/http/signup.php" enctype="multipart/form-data">
				<h2>Register</h2>
				<p class="hint-text">Create your account. It's free and only takes a minute.</p>
				<div class="form-group">
					<div class="row">
						<div class="col"><input type="text" class="form-control" name="name" placeholder="First Name"
								required="required"></div>
						<div class="col"><input type="text" class="form-control" name="lastname" placeholder="Last Name"
								required="required"></div>
					</div>
				</div>

				<?php if (isset($_GET['error'])) { ?>
				<div class="alert alert-warning" role="alert">
					<?php echo htmlspecialchars($_GET['error']);?>
				</div>
				<?php } 
              
              if (isset($_GET['name'])) {
              	$name = $_GET['name'];
              }else $name = '';

              if (isset($_GET['username'])) {
              	$username = $_GET['username'];
              }else $username = '';
			?>

				<div class="form-group">
					<input type="email" class="form-control" name="email" placeholder="Email" required="required">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="username" placeholder="username" required="required">
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="password" placeholder="New Password"
						required="required">
				</div>
				<div class="form-group" id="">
					<p>Profile </p>
					<label for="file-input">
						<img src="https://www.freeiconspng.com/uploads/no-image-icon-13.png" width="36" alt="Png Transparent No" />
				    </label>
				 <input id="file-input" type="file" name="pp" />
				</div>

				<div class="form-group">
					<p>Gender </p>
					<div class="gender">
					
					<div style=" display: inline-block;">
						<input type="radio" name="gender" value="male"> Male
					</div>
					<div style=" display: inline-block;">
						<input type="radio" name="gender" value="female"> Female
					</div>
					<div style=" display: inline-block;">
						<input type="radio" name="gender" value="unknown"> Others
					</div>
				</div>
				</div>



				<div class="form-group">
					<label class="form-check-label"><input type="checkbox" required="required"> I accept the <a
							href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-success btn-lg btn-block">Register Now</button>
				</div>
			</form>
			<div class="text-center">Already have an account? <a href="#">Sign in</a></div>
		</div>
	</div>
</body>

</html>
<?php
  }else{
  	header("Location: home.php");
   	exit;
  }
 ?>

<style>
	body {
		color: #fff;
		background: #fff;
		font-family: 'Roboto', sans-serif;
	}

	.container {
		display: flex;
	}

	.image {
		position: relative;
		top: 15pc;
		font-size: 2.5rem;
		color: rgb(40 167 69);
	}

	image-upload>input {
    display: none;
  }

	.image h1{
		font-size: larger;
    font-family: system-ui;
    font-weight: 500;
	}

	.form-control {
		height: 40px;
		box-shadow: none;
		color: #cdd1d3;

	}

	.form-control:focus {
		border-color: #dcdddc;
	}

	.form-control,
	.btn {
		border-radius: 3px;
	}

	/* gender  */
	.gender div{
		border: 1px solid rgb(231, 231, 231);
    color: rgb(104, 100, 100);
    background-color: #fff;
    padding-left: 13px;
    padding-right: 51px;
    height: 32px;
    border-radius: 5px;
	}
	.gender {
		
		display: inline-block;
		padding: 2px;
		
	}

	.gender input{
		margin-top: 8px;
	}
	.signup-form {
		width: 450px;
		margin: 0 auto;
		padding: 30px 0;
		font-size: 15px;
		
	}

	.signup-form h2 {
		color: #636363;
		margin: 0 0 15px;
		position: relative;
		text-align: center;
	}

	.signup-form h2:before,
	.signup-form h2:after {
		content: "";
		height: 2px;
		width: 30%;
		background: #d4d4d4;
		position: absolute;
		top: 50%;
		z-index: 2;
	}

	.signup-form h2:before {
		left: 0;
	}

	.signup-form h2:after {
		right: 0;
	}

	.signup-form .hint-text {
		color: #999;
		margin-bottom: 30px;
		text-align: center;
	}

	.signup-form form {
		color: #999;
		border-radius: 3px;
		margin-bottom: 15px;
		background: #f2f3f7;
		box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
		padding: 30px;
	}

	.signup-form .form-group {
		margin-bottom: 20px;
	}

	.signup-form input[type="checkbox"] {
		margin-top: 3px;
	}

	.signup-form .btn {
		font-size: 16px;
		font-weight: bold;
		min-width: 140px;
		outline: none !important;
	}

	.signup-form .row div:first-child {
		padding-right: 10px;
	}

	.signup-form .row div:last-child {
		padding-left: 10px;
	}

	.signup-form a {
		color: #fff;
		text-decoration: underline;
	}

	.signup-form a:hover {
		text-decoration: none;
	}

	.signup-form form a {
		color: #5c81e6;
		text-decoration: none;
	}

	.signup-form form a:hover {
		text-decoration: underline;
	}

	

	/* CSSS UPLOAD FILE  */

	input[type=file]::file-selector-button {
		border: 2px solid #acacaf;
		padding: .2em .4em;
		border-radius: .2em;
		background-color: #ababac;
		transition: 1s;
	}

	input[type=file]::file-selector-button:hover {
		background-color: #959797;
		border: 2px solid #898b8b;
	}
</style>