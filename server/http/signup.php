<?php  

# check if username, password, name submitted
if(isset($_POST['username']) &&
   isset($_POST['password']) &&
   isset($_POST['name'])&&
   isset($_POST['email'])&&
   isset($_POST['gender'])&&
   isset($_POST['lastname'])){

   # database connection file
   include '../db.conn.php';
   
   # get data from POST request and store them in var
   $name =ucfirst ($_POST['name']);
   $password = ($_POST['password']);
   $username = ($_POST['username']);
   $lastname = ucfirst($_POST['lastname']);
   $email = ucfirst($_POST['email']);
   $gender = ucfirst($_POST['gender']);

   # making URL data format
   $data = 'name='.$name.'&username='.$username. '&lastname='.$lastname.
    '&password='.$password. '&email='.$email. '&gender=' .$gender;

   #simple form Validation
   if (empty($name)) {
   	  # error message
   	  $em = "Name is required";

   	  # redirect to 'signup.php' and passing error message
   	  header("Location: ../../client/signup.php?error=$em");
   	  exit;
   }else if(empty($username)){
      # error message
   	  $em = "Username is required";

   	  /*
    	redirect to 'signup.php' and 
    	passing error message and data
      */
   	  header("Location: ../../client/signup.php?error=$em&$data");
   	  exit;
   }else if(empty($password)){
   	  # error message
   	  $em = "Password is required";

   	  /*
    	redirect to 'signup.php' and 
    	passing error message and data
      */
   	  header("Location: ../../client/signup.php?error=$em&$data");
   	  exit;
   }else {
   	  # checking the database if the username is taken
   	  $sql = "SELECT username, email FROM users WHERE username=? OR email=?";
$stmt = $conn->prepare($sql);
$stmt->execute([$username, $email]);

if($stmt->rowCount() > 0){
    $existingData = $stmt->fetch();
    
    if ($existingData["username"] === $username) {
        $em = "The username ($username) already exists.";
    } else {
        $em = "The email ($email) is already registered.";
    }

    header("Location: ../../client/signup.php?error=$em");
    exit;

      }else {
      	# Profile Picture Uploading
      	if (isset($_FILES['pp'])) {
      		# get data and store them in var
      		$img_name  = $_FILES['pp']['name'];
      		$tmp_name  = $_FILES['pp']['tmp_name'];
      		$error  = $_FILES['pp']['error'];

      		# if there is not error occurred while uploading
      		if($error === 0){
               
               # get image extension store it in var
      		   $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);

               /** 
				convert the image extension into lower case 
				and store it in var 
				**/
				$img_ex_lc = strtolower($img_ex);

				/** 
				crating array that stores allowed
				to upload image extension.
				**/
				$allowed_exs = array("jpg", "jpeg", "png");

				/** 
				check if the the image extension 
				is present in $allowed_exs array
				**/
				if (in_array($img_ex_lc, $allowed_exs)) {
					/** 
					 renaming the image with user's username
					 like: username.$img_ex_lc
					**/
					$new_img_name = $username. '.'.$img_ex_lc;

					# crating upload path on root directory
					$img_upload_path = '../../client/assets/uploads/'.$new_img_name;

					# move uploaded image to ./upload folder
                    move_uploaded_file($tmp_name, $img_upload_path);
				}else {
					$em = "You can't upload files of this type";
			      	header("Location: ../../client/signup.php?error=$em&$data");
			   	    exit;
				}

      		}
      	}

      	// password hashing
      	$password = password_hash($password, PASSWORD_DEFAULT);

      	# if the user upload Profile Picture
      	if (isset($new_img_name)) {

      		# inserting data into database
            $sql = "INSERT INTO users
                    (name, username,lastname,  password,email,gender, p_p)
                    VALUES (?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$name, $username,$lastname, $password,$email,$gender, $new_img_name]);
      	}else {
            # inserting data into database
            $sql = "INSERT INTO users
                    (name, username,lastname, password,email,gender)
                    VALUES (?,?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$name, $username,$lastname, $password,$email,$gender]);
      	}

      	# success message
      	$sm = "Account created successfully";

      	# redirect to 'index.php' and passing success message
      	header("Location: ../../client/index.php?success=$sm");
     	exit;
      }

   }
}else {
	header("Location: ../../client/signup.php");
   	exit;
}