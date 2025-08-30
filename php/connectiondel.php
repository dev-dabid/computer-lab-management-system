<?php
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
