<?php
function notificationn()
{
    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'chat_app_db');

    // Query the database for the notification count
    $sql = "SELECT COUNT(status) as status from `images` ";
    $result = mysqli_query($conn, $sql);

    // Get the notification count
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $count = $row['status'];
    } else {
        $count = 0;
    }

    // Return the notification count as JSON
    header('Content-Type: application/json');
    echo json_encode(['count' => $count]);
}
?>

<script>
function updateNotification() {
    // Make an AJAX request to notification.php
    $.ajax({
        url: 'notification.php',
        dataType: 'json',
        success: function(data) {
            // Update the notification count
            $('#notification-count').text(data.count);
        },
        complete: function() {
            // Schedule the next update in 5 seconds
            setTimeout(updateNotification, 5000);
        }
    });
}

// Schedule the first update in 5 seconds
setTimeout(updateNotification, 5000);
</script>

<!-- Display the notification count -->
<div id="notification-count"><?php $count ?></div>