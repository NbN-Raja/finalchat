<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1> </h1>

    

    <div class="container">
        <div class="sidenav">
            <?php include 'include/sidenav.php' ?>
        </div>

        <div class="contents">
            <nav>
  <ul>
    <li><a href="../home.php">Home</a></li>
    <li><a href="about.php">About</a></li>
    <li><a href="notifications.php">Notifications</a></li>
    <li><a href="messages.php">Messages</a></li>
    <li class="dropdown">
      <a href="#" class="dropbtn">Profile &#9662;</a>
      <div class="dropdown-content">
        <a href="profile.php">Profile</a>
        <a href="settings.php">Settings</a>
        <a href="logout.php">Logout</a>
      </div>
    </li>
  </ul>
</nav>

<style>
    nav ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  background-color: #f1f1f1;
}

nav li {
  display: inline-block;
}

nav li a {
  display: block;
  padding: 10px 20px;
  text-decoration: none;
  color: #333;
}

nav li a:hover {
  background-color: #ddd;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
}

.dropdown-content a {
  display: block;
  padding: 10px 20px;
  text-decoration: none;
  color: #333;
}

.dropdown:hover .dropdown-content {
  display: block;
}

</style>

            <?php $conn = mysqli_connect('localhost', 'root', '', 'chat_app_db');

            //    $select =  'SELECT community.contents as contents , community.username, users.name as name , users.lastname as lastname, users.p_p as profile 
            //    FROM community 
            //    LEFT JOIN users ON users.username = community.username';
            // $contents =  $row['contents']; '<br>';
            // $name= $row['name'];
            // $lastname= $row['lastname'];
            // $profile= $row['profile'];

            // Select all the contents from the community table
            $sql = "SELECT community.id as cid, community.contents as contents , community.username,community.title as title, users.name as name , users.lastname as lastname, users.p_p as profile 
               FROM community 
               LEFT JOIN users ON users.username = community.username ORDER BY community.id DESC
";
            $result = mysqli_query($conn, $sql);

            // Loop through the results and display each content
            while ($row = mysqli_fetch_assoc($result)) {
                $contents =  $row['contents'];
                '<br>';
                $name = $row['name'];
                $cid = $row['cid'];
                $title = $row['title'];
                $lastname = $row['lastname'];
                $profile = $row['profile'];


            ?>
               <a href="singlepost.php?cid=<?php echo $cid; ?>">
  <div class="blogs"> 
                    <div class="profile">
                        <img src="../client/assets/uploads/<?= $profile ?>" class="w-30 rounded-circle">
                        <h5> <?php echo $name ?> </h5>
                        <h5> <?php echo $lastname ?> </h5>
                    </div>
                    <div class="contents" id="shoee">
                        <h1> <?php echo $title ?> </h1>
                        <p><?php echo $contents ?></p>
                        <?php
                        if (isset($imagePath)) {
                            echo '<img src="' . $imagePath . '" alt="Uploaded Image">';
                        }
                        ?>
                    </div>
                   
                </div>
                </a>
            <?php
            }

            // Close the database connection
            ?>
        </div>

        <!-- Search For Blogs here  -->




        <!-- interests  -->
        <div class="">
            <h3> Suggestions Here </h3>
            <div>
                <input type="search" id="search-input">
            </div>
            <!-- fetch search here  -->
            <div id="search-results-dialog" title="Search Results">
                <div id="search-results"></div>
            </div>
            <?php
            // Start the session

            // Get the user's interests from the database
            $mysqli = new mysqli('localhost', 'root', '', 'chat_app_db');
            $username = $_SESSION['username'];
            $query = "SELECT interests FROM users WHERE username = '$username'";
            $result = $mysqli->query($query);
            $row = $result->fetch_assoc();
            $interest = $row['interests'];

            // Fetch the relevant data from the community table
            $query = "SELECT title, username, contents,timestamp
              FROM community
              WHERE tags = '$interest'";
            $result = $mysqli->query($query);

            // Display the data
            while ($row = $result->fetch_assoc()) {
                $title = $row['title'];
                $username = $row['username'];
                $contents = $row['contents'];
                $timestamp = $row['timestamp'];


                echo '
      <div class="border" style="border-radius: 8px; border: 1px solid #ddd; padding: 10px;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    
    <div>
    <p style="margin: 0; font-size: 18px; font-weight: bold;">' . $title . '</p>;
    <p style="margin: 0; font-size: 14px; color: #666;">Posted by <a href="#" style="color: #333; text-decoration: none;">' . $username . '</a> on'  . $timestamp . '</p>
    </div>
  </div>
  <p style="font-size: 16px; color: #333; line-height: 1.5;">' . substr($contents, 0, 20) . '</p>
  <a href="#" style="display: block; background-color: #333; color: #fff; padding: 10px 20px; text-align: center; border-radius: 8px; text-decoration: none; margin-top: 10px;">Read More</a>
</div>';
            }

            // Close the MySQLi connection
            $mysqli->close();
            ?>




           

            <script>
                $(document).ready(function() {
                    $('#search-results-dialog').dialog({
                        autoOpen: false,
                        modal: true,
                        width: 500
                    });

                    $('#search-input').on('input', function() {
                        var query = $(this).val();
                        $.ajax({
                            url: 'include/search.php',
                            data: {
                                query: query
                            },
                            success: function(result) {
                                $('#search-results').html(result);
                                $('#search-results-dialog').dialog('open');
                            }
                        });
                    });
                });
            </script>


            <!-- Live chat Here  -->
            <div id="chat-container">
                <div id="chat-messages"></div>
                <form id="chat-form">
                    <input type="text" id="chat-message" name="message" placeholder="Type your message...">
                    <input type="hidden" id="chat-message" name="username" value="<?php echo $username ?>" placeholder="Type your message...">
                    <button type="submit">Send</button>
                </form>
            </div>








        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script>
            // Search Feature Here 
            $(document).ready(function() {
                $('#search-input').on('input', function() {
                    var query = $(this).val();
                    $.ajax({
                        url: 'include/search.php',
                        data: {
                            query: query
                        },
                        type: 'POST',

                        success: function(result) {
                            $('#search-results').html(result);
                        }
                    });
                });
            });


            $(document).ready(function() {
                // Retrieve existing chat messages
                setInterval(function() {
                    $.ajax({
                        url: 'include/getmessage.php',
                        type: 'GET',
                        success: function(response) {
                            $('#chat-messages').html(response);
                        }
                    });
                }, 1000);

                // Send new chat messages
                $('#chat-form').submit(function(e) {
                    e.preventDefault();
                    $.ajax({
                        url: 'include/postmessage.php',
                        type: 'POST',
                        data: $(this).serialize(),
                        success: function(response) {
                            $('#chat-message').val('');
                        }
                    });
                });
            });
        </script>



</body>

</html>

<style>
    .container {
        display: flex;
    }

    .contents {
        padding: 15px;
        max-width: 80%;

    }

    .shoee h1{
        font-weight: 800;
    }

    .shoee p{
        font-weight: 200;
    }
    .blogs {
        display: flex;
        background-color: #f2f2f2;
        padding: 2px;
        margin-bottom: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        text-align: center;
        color: #333;
    }

    .blogs {
        display: flex;
        margin-bottom: 20px;
        padding: 10px;
        border: 1px solid #eee;
        text-decoration: none;

    }
    .blogs p{
        text-decoration: none;
    }

    .profile {
        margin-right: 20px;
    }

    .profile img {
        width: 60px;
        height: 60px;
    }

    .contents h1 {
        margin: 0 0 10px;
        font-size: 24px;
    }

    .contents p {
        margin: 0;
        font-size: 16px;
        color: #444;
        line-height: 1.5;
    }

    #chat-container {
        position: fixed;
        bottom: 0;
        right: 0;
        width: 300px;
        height: 400px;
        border: 1px solid #ccc;
        overflow-y: scroll;
    }

    #chat-messages {
        height: 320px;
        padding: 10px;
        overflow: auto;
        background-color: #f6f6f6;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-bottom: 10px;
    }

    #chat-messages p {
        margin: 5px 0;
        font-size: 14px;
    }

    #chat-form {
        display: flex;
        padding: 10px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    #chat-form input[type=text] {
        flex: 1;
        margin-right: 10px;
        padding: 8px;
        border: none;
        border-radius: 4px;
        font-size: 14px;
    }

    #chat-form button[type=submit] {
        padding: 8px 12px;
        background-color: #4CAF50;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
    }

    #chat-form button[type=submit]:hover {
        background-color: #3e8e41;
    }
</style>