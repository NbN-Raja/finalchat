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
          
            setcookie('username', $user['username'], time() + 3600); // expires in 1 hour
            
            // $url = "http://localhost:3000/api/getalluserdetail?username=$username";
            // $options = array(
            //     CURLOPT_RETURNTRANSFER => true,
            // );
            // $curl = curl_init($url);
            // curl_setopt_array($curl, $options);
            // $data = curl_exec($curl);
            // curl_close($curl);
         

            # redirect to 'home.php'
            header("Location: ../../landing_page.php?username=$username");
            // header("Location: final_one.php");
            # redirect to 'home.php'
            // header("Location: ../../../api/auth.php?param1=value1&param2=value2");
            header('Content-Type: application/json');
            echo json_encode([
              'success' => true,
              'data' => $username
            ]);

          }else {
            # error message
            $em = "Incorect Username or password";

            # redirect to 'index.php' and passing error message
            header("Location: ../../client/index.php?error=$em");
          }
        }else {
          # error message
          $em = "Incorect Username or password";

          # redirect to 'index.php' and passing error message
          header("Location: ../../client/index.php?error=$em");
        }
      }
   }
}else {
  header("Location: ../../client/index.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<p> Incorrect Username Or Pasword </p>
<a href="../../client/index.php"> Go back </a>


<script>
function storeSessionValue() {
  var username = '<?php echo $_SESSION['username']; ?>';
  localStorage.setItem('username', username);
}
</script>
</body>
</html>