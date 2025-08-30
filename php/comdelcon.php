<?php


session_start();

// Check if the session variables are set
if (isset($_SESSION['username']) && isset($_SESSION['user_id'])) {
  // User is logged in, display personalized content or allow access to protected resources
} else {
  // User is not logged in, redirect to login page or show a message
  header('Location: login.php');
  exit();
}

$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'lab_management';

// create mysqli connection object
$conn = new mysqli($host, $user, $pass, $db);

// check for errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
