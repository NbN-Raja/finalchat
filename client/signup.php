<?php 
  session_start();

  if (!isset($_SESSION['username'])) {

?>

<?php




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
			<form method="post"  name="contactForm" action="../server/http/signup.php"  onsubmit="return validateForm()"   enctype="multipart/form-data">
				<h2>Register</h2>
				<p class="hint-text">Create your account. It's free and only takes a minute.</p>
				<?php if (isset($_GET['error'])) { ?>
				<div class="alert alert-danger" role="alert">
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
					<div class="row">
						
						<div class="col"><input type="name" class="form-control" name="name" placeholder="First Name"

						 > <div class="error" id="nameErr"></div></div>
						<div class="col"><input type="text" class="form-control" name="lastname" placeholder="Last Name"
						> <div class="error" id="lastnameErr"></div></div>
					</div>
				</div>

				

				<div class="form-group"> 
					<input type="email" class="form-control" name="email" placeholder="Email" >
					<div class="error" id="emailErr"></div>

				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="username" placeholder="username"  >
					<div class="error" id="usernameErr"></div>
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="password" placeholder="New Password" id="psw"
						>
						<div class="error" id="passwordErr"></div>
				</div>
				<!-- <div class="form-group" id="">
					<p>Profile </p>
					<label for="file-input">
						<img src="https://www.freeiconspng.com/uploads/no-image-icon-13.png" width="36" alt="Png Transparent No" />
				    </label>
				 <input id="file-input" type="file" name="pp" />
				</div> -->

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
				<div class="error" id="genderErr"></div>
				</div>



				<div class="form-group">
					<label class="form-check-label"><input type="checkbox" required="required"> I accept the <a
							href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-lg btn-block">Register Now</button>
				</div>
				<div class="text">Already have an account? <a href="index.php">Login</a></div>
			</form>
			
		</div>
	</div>
</body>



<!-- validation Info Here  -->
<div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>

</html>
<?php
  }else{
  	header("Location: home.php");
   	exit;
  }
 ?>



























<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>




<!-- form All Validate hERE  -->
<script>
// Defining a function to display error message
function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}

// Defining a function to validate form 
function validateForm() {
    // Retrieving the values of form elements 
    var name = document.contactForm.name.value;
    var lastname = document.contactForm.lastname.value;
	var email = document.contactForm.email.value;
    var username = document.contactForm.username.value;
    var gender = document.contactForm.gender.value;
    var password = document.contactForm.password.value;
    
    
    
	// Defining error variables with a default value
    var nameErr = emailErr = lastnameErr = passwordErr = genderErr =  usernameErr=true;
    
    // Validate name
    if(name == "") {
        printError("nameErr", "Please enter your name");
    } else {
        var regex = /^[a-zA-Z\s]+$/;                
        if(regex.test(name) === false) {
            printError("nameErr", "Please enter a valid name");
        } else {
            printError("nameErr", "");
            nameErr = false;
        }
    }

	// lastname
    if(lastname == "") {
        printError("lastnameErr", "Please enter your L.name");
    } else {
        var regex = /^[a-zA-Z\s]+$/;                
        if(regex.test(lastname) === false) {
            printError("lastnameErr", "Please enter a valid name");
        } else {
            printError("lastnameErr", "");
            lastnameErr = false;
        }
    }
    
    // Validate email address
    if(email == "") {
        printError("emailErr", "Please enter your email address");
    } else {
        // Regular expression for basic email validation
        var regex = /^\S+@\S+\.\S+$/;
        if(regex.test(email) === false) {
            printError("emailErr", "Please enter a valid email address");
        } else{
            printError("emailErr", "");
            emailErr = false;
        }
    }
    
    // Validate mobile number
    if(password == "") {
        printError("passwordErr", "Please enter your mobile number");
    } else {
        var regex = /^[a-zA-Z\s]+$/;                
        if(regex.test(passsword) === false) {
            printError("passwordErr", "Please enter a valid 10 digit mobile number");
        } else{
            printError("passwordErr", "");
            passwordErr = false;
        }
    }


    // Validate mobile number
    if(username == "") {
        printError("usernameErr", "Please enter your mobile number");
    } else {
        var regex = /^[1-9]\d{9}$/;
        if(regex.test(username) === false) {
            printError("usernameErr", "Please enter a valid 10 digit mobile number");
        } else{
            printError("usernameErr", "");
            usernameErr = false;
        }
    }
    
   
    
    
    
    // Prevent the form from being submitted if there are any errors
    if((nameErr || emailErr || mobileErr || countryErr || genderErr) == true) {
       return false;
    } else {
        // Creating a string from input data for preview
        var dataPreview = "You've entered the following details: \n" +
                          "Full Name: " + name + "\n" +
                          "Email Address: " + email + "\n" +
                          "Mobile Number: " + mobile + "\n" +
                          "Country: " + country + "\n" +
                          "Gender: " + gender + "\n";
        if(hobbies.length) {
            dataPreview += "Hobbies: " + hobbies.join(", ");
        }
        // Display input data in a dialog box before submitting the form
        alert(dataPreview);
    }
};
</script>







<style>

/* validation here  */
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
  width: 18pc;
  left: 73pc;
    bottom: 39pc;
}

#message p {
  padding: 10px 35px;
  font-size: 15px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}opcache_compile_file

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}



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
		color: #0d6efd;
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

	.text{
		color:black;
	}

	.text-center a{
		color:red
	}


	.error {
    color: red;
    font-size: 90%;
}
</style>