<?php
// IMPORTANT:
// Replace 'YOUR_PASSWORD_HERE' with the correct password for your MySQL 'root' user.
// If you are using a default XAMPP or WAMP installation and have not set a password,
// try leaving the password field as an empty string like this:
// $password = '';
//
// If you have a password, ensure it is entered exactly as it is configured in phpMyAdmin.
$password = ''; 

// Attempt to establish a connection to the MySQL database.
// The `or die(...)` part will stop the script and print an error if the connection fails.
$con = mysqli_connect('localhost', 'root', $password, 'quiz_db');

// Check if the connection was successful.
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

?>
