<?php 
  session_start();

  if (!isset($_SESSION['username'])) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/logo.png">
</head>

<body>
    <div class="container" style="display:flex">
        <div class="image">
            <img src="assets/img/login.png" >
            
        </div>
        <div class="login" >
            <form method="post" action="../server/http/auth.php">
                <div class="login_header">
                    <img src="assets/img/logo.png" class="w-25">
                    <h1> Login </h1>
                </div>
                <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-warning" role="alert">
                    <?php echo htmlspecialchars($_GET['error']);?>
                </div>
                <?php } ?>

                <?php if (isset($_GET['success'])) { ?>
                <div class="alert alert-success" role="alert">
                  <p>   <?php echo htmlspecialchars($_GET['success']);?> </p>
                </div>
                <?php } ?>


                <div>
                    <label class="form-label">
                        </label>
                    <input type="text" class="form-control" name="username" placeholder="Username">
                </div>

                <div>
                    <label class="form-label">
                        </label>
                    <input type="password" class="form-control" name="password" placeholder="password">
                </div> <br>

                <button type="submit" class="btn btn-primary">
                    LOGIN</button>
                    <div class="register">
                    <p> New To Account ? <a href="signup.php"> Register </a> </p>
                    </div>
            </form>
       
    </div>
</body>

</html>
<?php
  }else{
  	header("Location: home.php");
   	exit;
  }
 ?>


</html>

<style>
body {
    background: #fff;
}

.login_header{
	text-align:center;
}
.container{
	display:flex;
	position: relative;
	top:10pc;
	justify-content: space-around;
}

.login{
	position:relative; 
	border:1px solid white;
	width:25pc;
	padding:30px;
	background-color:white;
    box-shadow: 2px 2px 2px 3px #dfd9d9;
    border-radius:5px;
    height:28pc;
}
.btn{
	width:21pc;
}
.register{
    margin-top:10px;
}

.register a{
    text-decoration:none;
}
</style>