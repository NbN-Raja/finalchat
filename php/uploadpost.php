

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
$targetDir = "../client/assets/post/";
$fileName = basename($_FILES["file"]["name"]);

$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    $name= ucfirst($_POST['name']);
    $something =ucfirst ($_POST['something']);
    
   
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf','mp4');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $db->query("INSERT into images (file_name,name,something, uploaded_on)
			 VALUES ('".$fileName."', '$name', '$something' ,NOW())");
		
            if($insert){

                header("Location: " . $_SERVER["HTTP_REFERER"]);
                // $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an ah error error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $name= ucfirst($_POST['name']);
    $something =ucfirst ($_POST['something']);
    $insert = $db->query("INSERT into images (name, something, uploaded_on) VALUES ('$name', '$something', NOW())");
    if(!$insert){
        $statusMsg = "Failed to insert record into database.";
    }else{
        header("Location: " . $_SERVER["HTTP_REFERER"]);

    }
    
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








