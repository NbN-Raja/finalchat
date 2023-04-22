<?php


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
            <?php $conn = mysqli_connect('localhost', 'root', '', 'chat_app_db');

            //    $select =  'SELECT community.contents as contents , community.username, users.name as name , users.lastname as lastname, users.p_p as profile 
            //    FROM community 
            //    LEFT JOIN users ON users.username = community.username';
            // $contents =  $row['contents']; '<br>';
            // $name= $row['name'];
            // $lastname= $row['lastname'];
            // $profile= $row['profile'];

            // Select all the contents from the community table
            $sql = "SELECT community.contents as contents , community.username,community.title as title, users.name as name , users.lastname as lastname, users.p_p as profile 
               FROM community 
               LEFT JOIN users ON users.username = community.username ORDER BY community.id DESC
";
            $result = mysqli_query($conn, $sql);

            // Loop through the results and display each content
            while ($row = mysqli_fetch_assoc($result)) {
                $contents =  $row['contents'];
                '<br>';
                $name = $row['name'];
                $title = $row['title'];
                $lastname = $row['lastname'];
                $profile = $row['profile'];


            ?>
                <div class="blogs">
                    <div class="profile">
                        <img src="../client/assets/uploads/<?= $profile ?>" class="w-30 rounded-circle">
                        <h5> <?php echo $name ?> </h5>
                        <h5> <?php echo $lastname ?> </h5>
                    </div>
                    <div class="contents">
                        <h1> <?php echo $title ?> </h1>
                        <p> <?php echo $contents ?>
                    </div>
                </div>

            <?php
            }

            // Close the database connection
            mysqli_close($conn); ?>
        </div>

        <!-- Search For Blogs here  -->
        <form id="search-form" action="">
            <input type="text" name="tags" id="search-input">
        </form>

        <!-- fetch search here  -->
        <div id="search-results-dialog" title="Search Results">
            <div id="search-results"></div>
        </div>

        <!-- interests  -->
        <div class=""> Suggestions Here 
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
    $query = "SELECT title, username, contents
              FROM community
              WHERE tags = '$interest'";
    $result = $mysqli->query($query);

    // Display the data
    while ($row = $result->fetch_assoc()) {
        $title = $row['title'];
        $username = $row['username'];
        $contents = $row['contents'];

        echo '<div class="border" style="border-radius:1px solid black"> 
                  <h2>' . $title . '</h2>
                  <p> ' . $username . '</p>
              </div>';
    }

    // Close the MySQLi connection
    $mysqli->close();
?>



<div class="">
    whats up
    <?php echo $interest; ?>
</div>


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
    }

    #chat-form {
        display: flex;
        padding: 10px;
    }

    #chat-message {
        flex: 1;
        margin-right: 10px;
    }
</style>