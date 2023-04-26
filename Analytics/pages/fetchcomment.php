<?php include '../components/nav.php';
include '../db.php';
include '../../server/helpers/timeAgo.php';

$name = $_SESSION['name'];
// Store the session variable in a variable to avoid SQL injection
$idd = $_GET['id'];

?>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <?php require_once '../components/sidenav.php'; ?>

        <!-- Main content -->
        <div class="col-md-9 pt-2" id="sdash">
            <div class="">
                <h1>Total Comments In Your Posts </h1>
                <?php
                $sql = "SELECT * FROM images WHERE id='$idd'";
                $result = $con->query($sql);

                // Check if there is a result
                if ($result->num_rows > 0) {
                    // Loop through each row in the result
                    while ($row = $result->fetch_assoc()) {
                        // Display the username, caption, and image in a styled format
                        echo "<div class='display'>";
                        echo "<h5>" . $row['name'] . "</h5>";
                        echo "<img src='http://localhost/main/client/assets/post/" . $row['file_name'] . "' alt='" . $row['something'] . "' style='width:60px; height:60px; border-radius:5px'>";


                        $photo_idd = "" . $row['id'] . "";
                        $sql2 = "SELECT COUNT(comment) as count FROM comment WHERE  photo_id='$photo_idd'";
                        $result2 = $con->query($sql2);

                        // Check if there is a result
                        if ($result2->num_rows > 0) {
                            // Fetch the result
                            $row2 = $result2->fetch_assoc();

                            // Display the count of comments
                            echo "<p> <a href='http://localhost/main/Analytics/pages/fetchcomment.php?id=$photo_idd' > comments" . $row2['count'] . " </a></p>";
                            echo "</div>";
                        } else {
                            echo "No results found.";
                            echo "</div>";
                        }
                    }
                } else {
                    echo "No results found.";
                    echo "</div> <br>";
                }



                ?>

                <div class="totalcomments">
                    <p> Your Total Comments from above post  Appear Here: </p>
                    <div class="comments">
                        <?php
                        $sql = "SELECT * FROM `comment` WHERE photo_id='$idd'";
                        $result = $con->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<div class="comment">';
                                echo '<div class="user-info">';
                                echo '<img src="http://localhost/main/client/assets/uploads/' . $row['profile_pic'] . '" alt="' . $row['name'] . ' profile picture">';
                                echo '<div class="username">' . $row['name'] . '</div>';
                                echo '</div>';
                                echo '<div class="comment-text">' . $row['comment'] . '</div>';
                                echo '<div class="comment-text">Comment On: ' . last_seen($row['time']) . '</div>';
                                echo '</div>';
                            }
                        }
                        ?>
                    </div>

                </div>
            </div>

        </div>

    </div>


</div>

<style>
    .display {
        border: 1px solid grey;
        background-color: azure;
        padding: 12px;
        border-right-width: thick;
        width: 12pc;
        display: inline-block;
    }

    .comments {
        display: flex;
        flex-direction: column;
        gap: 20px;
        background-color: aliceblue;
    padding: 9px;
    border-radius: 11px;
    box-shadow: 1px 1px 1px 1px whitesmoke;
    }

    .comment {
        display: flex;
        gap: 10px;
        background-color: #dae6f0;
    padding: 10px;
    border-radius: 11px;
    }
    
    .comment-text{
        font-family: unset;
    font-size: larger;
    align-self: center;
    }

    .user-info {
        display: flex;
        align-items: center;
    }

    .user-info img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }

    .username {
        font-weight: bold;
        margin-left: 10px;
    }

    .comment-text {
        margin-left: 60px;
    }
</style>