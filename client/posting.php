<a href="../landing_page.php"> Home </a>

<?php
session_start();
// Include the database configuration file
// Database configuration
$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "chat_app_db";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}


// Upload Php Here 


// Include the database configuration file

$statusMsg = '';

// File upload path
$targetDir = "assets/post/";
$fileName = basename($_FILES["file"]["name"]);

$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    $id=($_POST['id']);
    $name= ucfirst($_POST['name']);
    $comment = ucfirst($_POST['comment']);
    $something =ucfirst ($_POST['something']);
    
   
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database

            
           
            $insert = $db->query("INSERT into images (file_name,name,something,comment, uploaded_on)
			 VALUES ('".$fileName."', '$name', '$something' , '$comment',NOW())");
		
            if($insert){

              header('Location: home.php');
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;



// Text Post Here  name

if(isset($_POST["submitt"]) ){
  $id=($_POST['id']);
  $name= ucfirst($_POST['name']);
  $something =ucfirst ($_POST['something']);

  $insert = $db->query("INSERT into images (name,something, uploaded_on)
  VALUES ('$name', '$something' ,NOW())");

  if ($insert) {
    header("Location: " . $_SERVER["HTTP_REFERER"]);
  }

}




// $query = $db-> query ("UPDATE `images` SET `comment` = '$comment' WHERE `images`.`id` = '$id'");

?>
<?php
// Include the database configuration file
// Database configuration
$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "chat_app_db";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

?>

<html>
<head>
  <title>Fetch image from database in PHP</title>
</head>
<body>

<h2>All Records</h2>

<table border="2">
  <tr>
    <td>Sr.No.</td>
    <td>Name</td>
    <td>Images</td>
  </tr>

<?php


$records = mysqli_query($db,"select * from images ORDER BY file_name  DESC"); // fetch data from database


while($data = mysqli_fetch_array($records))
{
    
?>
  <tr>
    <td><?php echo $data['id']; ?></td>
    <td><?php echo $data['name']; ?></td>
    <td><img src="<?php echo  'assets/post/'.$data["file_name"]; ?>" width="100" height="100"></td>
   
  </tr>	
<?php
}
?>

</table>

<?php mysqli_close($db);  // close connection ?>

</body>
</html>


