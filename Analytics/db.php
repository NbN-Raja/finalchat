<?php

// Replace these values with your own database credentials
$host = "localhost";
$user = "root";
$password = "";
$database = "chat_app_db";

// Create a new mysqli object to establish a connection
$con = new mysqli($host, $user, $password, $database);

// Check if the connection was successful
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// If the connection was successful, you can perform database operations here

// Close the connection when you're done

?>
