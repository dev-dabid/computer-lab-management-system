<?php
// Check if a session has already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

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

// Retrieve the username and password from the form
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Query the database for a user with the given username
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch();

// Check if the query returned a user and the password matches the hashed password in the database
if ($user && password_verify($password, $user['password'])) {
    // Authentication successful, store user info in session
    $_SESSION['username'] = $user['username'];
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['role'] = $user['role'];

    // Update the status to "online"
    $stmt = $pdo->prepare("UPDATE users SET status = 'online' WHERE id = ?");
    $stmt->execute([$user['id']]);

    if ($_SESSION['role'] == 'admin') {
        header('Location: admin.php');
    } else {
        header('Location: laboratories.php');
    }

} elseif ($user) {
    // Authentication failed due to incorrect password
    // Show an error message to the user
    echo "Incorrect password";
} else {
    // Authentication failed due to incorrect username
    // Show an error message to the user
    echo "Invalid username or password";
}

// Output the contents of the $_SESSION superglobal for debugging purposes
var_dump($_SESSION);
?>
