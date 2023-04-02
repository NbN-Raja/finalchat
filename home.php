<?php
session_start();
if (empty($_SESSION['username'])) {
    //redirect to login page
    header('Location: ./server/http/auth.php');
    die;
} else {
}


require_once 'components/nav.php';
require_once 'components/date.php';
require_once 'components/blocked.php';


$username = $_SESSION['username'];
if (isset($_SESSION['username'])) {
    # database connection file
    include 'server/db.conn.php';
    include 'server/helpers/user.php';
    include 'server/helpers/conversations.php';
    include 'server/helpers/last_chat.php';
    include 'server/helpers/chat.php';
    # Getting User data data
    $user = getUser($_SESSION['username'], $conn);
    # Getting User conversations
    $conversations = getConversation($user['user_id'], $conn);

?>
<?php } ?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="public/home.css"> -->

</head>

<body>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merienda+One">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" rel="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>



    </html>
    <!-- Java Script Here -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="js/ajax.js"></script>
    <!-- End Of Javascript Here  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</html>

<!-- Navigation Bar Here  -->
<?php include 'pages/nav.php' ?>


<div class="main">
    <div class="profile ">
        <?php include 'pages/side_nav.php' ?>
    </div>

    <div class="posts">
        <?php include 'pages/posts.php' ?>
        Hello

    </div>

    <div class="contacts">
        <?php include 'pages/contacts.php' ?>

    </div>

    
</div>

<style>
    * {
        margin: 0px;
        padding: 0px;
    }

    body {
        background-color: aliceblue;
    }

    .navbar {
        background-color: white;
    }
    #notification_bell{
    font-size: 0.9rem;
    font-weight: 600;
    background-color: #fdfdfd;
    margin: 1px;
    padding: 0px;
    margin-left: -16px;
    margin-top: 9px;
    margin-right: 35px;
    border: 1px solid white;
    }

     .badged{
        color: #fff;
    background: #f44336;
    font-size: 11px;
    border-radius: 20px;
    position: absolute;
    min-width: 10px;
    padding: 4px 6px 0;
    min-height: 18px;
    top: 5px;
    }

    .main{
        display:flex;
        margin-top: 4pc;
        justify-content: space-around;

    }

    .post_image{
        object-fit: cover;
    width: -webkit-fill-available;
    height: auto;
   
    }

    .display_post{
        background-color: white;
        margin-bottom: 1pc;
        border-radius: 10px;
    }
    .posts{
        max-width: 38pc;
        margin-left: 30px;
    }
     
    .thirdcolumn{
        position: sticky;
        top: 50px;
    }
    .profile{
        width:14pc
    }
    
    


    
    
</style>

