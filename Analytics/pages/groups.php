<?php include '../components/nav.php';
include '../db.php';

$usernamee = $_SESSION['username']
?>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <?php require_once '../components/sidenav.php'; ?>

        <!-- Main content -->
        <div class="col-md-9 pt-2" id="sdash">
            <p> All Your Groups appear here <i> You can easily manage here </i> </p>



            <div class="total-groups">
                <h5>Total Groups</h5>
                <p class="card-text"><?php
                                        // Establishing a database connection
                                        $conn = new PDO("mysql:host=localhost;dbname=chat_app_db", "root", "");

                                        // Query to fetch the count of images with name "Testadmin"
                                        $name = $_SESSION['username']; // Store the session variable in a variable to avoid SQL injection
                                        $sql = "SELECT COUNT(name)  FROM chat_room WHERE name = '$name'";


                                        // Executing the query and fetching the result
                                        $stmt = $conn->query($sql);
                                        $count = $stmt->fetchColumn();


                                        // Outputting the result
                                        echo  $count;

                                        ?></p>
            </div>

            <div class="show-groups">
                <?php
                $sql = "SELECT * FROM chat_room WHERE name = '$name'";
                $result = $con->query($sql);

                // Check if there is a result
                if ($result->num_rows > 0) {
                    // Add a grid container
                    echo '<div class="grid-container">';

                    // Loop through each row in the result
                    while ($row = $result->fetch_assoc()) {
                        $id = $row['id'];
                        $room_name = $row['room_name'];
                        // Display each item in a grid cell
                        echo '<a href="http://localhost/main/groupchat/display.php?user_id=' . $id . '&room_name=' . $room_name . '">';
                        echo '<div class="display shadow">';
                        echo '<h5 style="font-weight: bold;">' . $row['room_name'] . '</h5>';
                        echo '<h6 style="font-size: 14px;">' . 'Last Message' . '</h6>';
                        echo '</div>';
                        echo '</a>';
                        
                    }
                    

                    // Close the grid container
                    echo '</div>';

                } else {
                    echo "No results found.";
                }
                ?>
            </div>

        </div>
    </div>


</div>



<style>
    
    .show-groups .grid-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        grid-gap: 10px;
    }

    .show-groups .display {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: center;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .show-groups .display h5 {
        font-weight: bold;
        font-size: 20px;
        margin-bottom: 5px;
        text-align: left;
        color: #65676b;
    }

    .show-groups .display h6 {
        color: #65676b;
        font-size: 16px;
        margin-bottom: 5px;
        text-align: left;
    }

    .show-groups .display .last-message {
        font-size: 14px;
    }
    .grid-container a{
        text-decoration: none;

    }
</style>