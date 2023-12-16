<?php



// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Get the post ID and reason for reporting from the form
    $post_id = $_POST['post_id'];
    $reason = $_POST['reason'];
    $user_id = $_POST['user_id'];

    // Insert the report into the database
    $conn = new mysqli('localhost', 'root', '', 'chat_app_db');
   
    $sql = "INSERT INTO report_posts (user_id, post_id, reason) VALUES ('$user_id', '$post_id', '$reason')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Set the success message
        $_SESSION['success'] = "Post has been reported successfully!";

        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        // Set an error message
        $_SESSION['error'] = "Error: " . mysqli_error($conn);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}

// Display the success or error message if set
if (isset($_SESSION['success'])) {
    echo "<div class='success-message'>" . $_SESSION['success'] . "</div>";
    unset($_SESSION['success']);
}

if (isset($_SESSION['error'])) {
    echo "<div class='error-message'>" . $_SESSION['error'] . "</div>";
    unset($_SESSION['error']);
}
?>
<!--  -->