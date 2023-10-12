<?php  
session_start();

# check if username & password  submitted
if(isset($_POST['username']) &&
   isset($_POST['password'])){

   # database connection file
 

# server name
$sName = "localhost";
# user name
$uName = "root";
# password
$pass = "";

# database name
$db_name = "chat_app_db";

#creating database connection
try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", 
                    $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  echo "Connection failed : ". $e->getMessage();
}
   
   # get data from POST request and store them in var
   $password = $_POST['password'];
   $username = $_POST['username'];
   
   #simple form Validation
   if(empty($username)){
      # error message
      $em = "Username is required";

      # redirect to 'index.php' and passing error message
      header("Location: ../../client/index.php?error=$em");
   }else if(empty($password)){
      # error message
      $em = "Password is required";

      # redirect to 'index.php' and passing error message
      header("Location: ../../client/index.php?error=$em");
   }else {
      $sql  = "SELECT * FROM 
               users WHERE username=?";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$username]);

      # if the username is exist
      if($stmt->rowCount() === 1){
        # fetching user data
        $user = $stmt->fetch();

        # if both username's are strictly equal
        if ($user['username'] === $username) {
           
           # verifying the encrypted password
          if (password_verify($password, $user['password'])) {

            # successfully logged in
            # creating the SESSION
            $_SESSION['username'] = $user['username'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['p_p'] = $user['p_p'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['c_p'] = $user['c_p'];
            $_SESSION['lastname'] = $user['lastname'];
            $_SESSION['gender'] = $user['gender'];
            $_SESSION['interests'] = $user['interests'];
          
            setcookie('username', $user['username'], time() + 3600); // expires in 1 hour
            
         

            # redirect to 'home.php'
            header("Location: ../../home.php?username=$username");
            

          }else {
            # error message
            $em = "Incorect Username or password";

            # redirect to 'index.php' and passing error message
            header("Location: http://localhost/main/client/index.php?error=$em");
          }
        }else {
          # error message
          $ems = "Incorect Username or password";

          # redirect to 'index.php' and passing error message
          header("Location: http://localhost/main/client/index.php?error=$ems");
        }
      }else {
        # error message
        $ems = "Incorect Username or password";

        # redirect to 'index.php' and passing error message
        header("Location: http://localhost/main/client/index.php?error=$ems");
      }
   }
}else {
  header("Location: ../../client/index.php");
  exit;
}

?>

