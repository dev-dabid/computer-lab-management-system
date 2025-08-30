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
$stmt = $conn->prepare("INSERT INTO users (username, password, name, technician_id) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $username, $hashed_password, $name, $technician_id);

// Set the parameters and execute
$username = $_POST["username"];
$password = $_POST["password"];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$name = $_POST["name"];
$technician_id = $_POST["technician_id"];
$stmt->execute();

echo "Registration successful!";

echo "<script>window.location.href = 'staff.php';</script>";

$stmt->close();
$conn->close();
?>
