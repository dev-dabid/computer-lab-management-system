<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind the SQL statement
$stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
$stmt->bind_param("i", $id);

// Set the parameter and execute
$id = $_GET["id"];
$stmt->execute();

echo "User deleted successfully!";
echo "<script>window.location.href = 'staff.php';</script>";
$stmt->close();
$conn->close();
?>
