<?php
// Start the session
session_start();

// Set up a PDO connection to the database
$host = 'localhost';
$dbname = 'lab_management';
$username = 'root';
$password = '';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password, $options);
} catch (PDOException $e) {
    die("Error connecting to database: " . $e->getMessage());
}

// Update the user's status to "offline"
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
$stmt = $pdo->prepare("UPDATE users SET status = 'offline' WHERE id = ?");
$stmt->execute([$user_id]);

// Unset all of the session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect the user to the login page
header('Location: login-page.php');
exit();
?>
