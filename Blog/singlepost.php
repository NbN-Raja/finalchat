<?php
// Retrieve the value of $cid from the URL
$cid = $_GET['cid'];

// Perform the desired selection using $cid
// Example: Fetch data from a database based on $cid
// ...

// Display the selected content
// Example: Echo the selected content

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

    <h1> Start Writing Your Blogs </h1>


    <div class="container">
        <div class="sidenav">
            <?php include 'include/sidenav.php' ?>
        </div>

        <div class="contents">

            <?php
            $query = "SELECT community.id AS cid,community.tags as tags,community.timestamp as timestamp, community.contents AS contents, community.username, community.title AS title, users.name AS name, users.lastname AS lastname, users.p_p AS profile
            FROM community
            LEFT JOIN users ON users.username = community.username
            WHERE  id = $cid
            ORDER BY community.id DESC ";
            $dbConnection = mysqli_connect("localhost", "root", "", "chat_app_db");
            $result = mysqli_query($dbConnection, $query);


            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // Access the selected columns of each row
                    $name = $row['name'];
                    $cid = $row['cid'];
                    $title = $row['title'];
                    $lastname = $row['lastname'];
                    $profile = $row['profile'];
                    $timestamp = $row['timestamp'];
                    $tags = $row['tags'];
                    $contents = $row['contents'];

                    // Process the selected data as needed
                    // ...
            ?>
                    <div class="blogs">
                        <div class="profile">
                            <img src="../client/assets/uploads/<?= $profile ?>" class="w-30 rounded-circle">
                            <h5> <?php echo $name ?> </h5>
                            <h5> <?php echo $lastname ?> </h5>
                            <h5> <?php echo $timestamp ?> </h5>
                        </div>
                        <div class="contents">
                            <h1> <?php echo $title ?> </h1>
                            <p><?php echo $contents ?></p>
                            <p><?php echo $tags ?></p>
                            <?php
                            if (isset($imagePath)) {
                                echo '<img src="' . $imagePath . '" alt="Uploaded Image">';
                            }
                            ?>
                        </div>

                    </div>


            <?php
                }
            } else {
                // Handle query execution error
                // ...
            }

            ?>

        </div>

        <!-- Search For Blogs here  -->




        <!-- interests  -->
        <div class="">
            <h1> Suggestions Here </h1>
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
  <h2 style="font-size: 24px; margin-bottom: 10px;">Suggested Post</h2>
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    
    <div>
      <p style="margin: 0; font-size: 18px; font-weight: bold;">Post Title</p>
      <p style="margin: 0; font-size: 14px; color: #666;">Posted by <a href="#" style="color: #333; text-decoration: none;">' . $username . '</a> on'  . $timestamp . '</p>
    </div>
  </div>
  <a href="#" style="display: block; background-color: #333; color: #fff; padding: 10px 20px; text-align: center; border-radius: 8px; text-decoration: none; margin-top: 10px;">Read More</a>
</div>';
            }

            // Close the MySQLi connection
            $mysqli->close();
            ?>




            <div>
                <input type="search" id="search-input">
            </div>
            <!-- fetch search here  -->
            <div id="search-results-dialog" title="Search Results">
                <div id="search-results"></div>


            </div>

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

    .blogs {
        display: flex;
        background-color: aliceblue;
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