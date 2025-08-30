<?php

// Get the data sent via AJAX
$id = $_POST['id'];
$location = $_POST['location'];
$peripheralType = $_POST['peripheral_type'];
$brand = $_POST['brand'];
$model = $_POST['model'];
$serialNumber = $_POST['serial_number'];
$specify = $_POST['specify'];
$user = $_POST['user'];
$action = $_POST['action'];
$userAction = $_POST['user_action'];

// Establish database connection
try {
    $conn = new PDO('mysql:host=localhost;dbname=lab_management;charset=utf8mb4', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Insert the data into the peripheral_reports table
$insertQuery = "INSERT INTO peripheral_reports (id, location, peripheral_type, brand, model, serial_number, specify, user, date, action, user_action) VALUES (:id, :location, :peripheral_type, :brand, :model, :serial_number, :specify, :user, :date, :action, :user_action)";

// Prepare the query
$stmt = $conn->prepare($insertQuery);

// Bind the parameters
$stmt->bindParam(':id', $id);
$stmt->bindParam(':location', $location);
$stmt->bindParam(':peripheral_type', $peripheralType);
$stmt->bindParam(':brand', $brand);
$stmt->bindParam(':model', $model);
$stmt->bindParam(':serial_number', $serialNumber);
$stmt->bindParam(':specify', $specify);
$stmt->bindParam(':user', $user);
$stmt->bindParam(':date', $date);
$stmt->bindParam(':action', $action);
$stmt->bindParam(':user_action', $userAction);

// Set the parameter values
$id = $_POST['id'];
$location = $_POST['location'];
$peripheralType = $_POST['peripheral_type'];
$brand = $_POST['brand'];
$model = $_POST['model'];
$serialNumber = $_POST['serial_number'];
$specify = $_POST['specify'];
$user = $_POST['user'];
$date = $_POST['date'];
$action = $_POST['action'];
$userAction = $_POST['user_action'];

// Execute the query
if ($stmt->execute()) {
    // Update the disabled column to 1 for the corresponding row
    $updateQuery = "UPDATE peripheral_reports SET disabled = 1 WHERE id = :id AND location = :location AND peripheral_type = :peripheral_type AND brand = :brand AND model = :model AND serial_number = :serial_number AND specify = :specify AND user = :user AND date = :date";
    $updateStmt = $conn->prepare($updateQuery);
    
    $updateStmt->bindParam(':id', $id);
    $updateStmt->bindParam(':location', $location);
    $updateStmt->bindParam(':peripheral_type', $peripheralType);
    $updateStmt->bindParam(':brand', $brand);
    $updateStmt->bindParam(':model', $model);
    $updateStmt->bindParam(':serial_number', $serialNumber);
    $updateStmt->bindParam(':specify', $specify);
    $updateStmt->bindParam(':user', $user);
    $updateStmt->bindParam(':date', $date);
    
    // Set the parameter values
    $id = $_POST['id'];
    $location = $_POST['location'];
    $peripheralType = $_POST['peripheral_type'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $serialNumber = $_POST['serial_number'];
    $specify = $_POST['specify'];
    $user = $_POST['user'];
    $date = $_POST['date'];
    
    // Execute the update query
    $updateStmt->execute();
    
    $id = $_POST['id'];
    
    $url = "http://localhost:8080/api/reports/{$id}";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    // Send the request
    $response = curl_exec($ch);
    curl_close($ch);
    
    // Check if the delete request was successful
    if ($response === false) {
    echo 'Error deleting data';
    } else {
    echo 'Data saved and deleted successfully';

      
    // Reload the table
    echo '<script>location.reload();</script>';
    }
}
    // Close the database connection
    $conn = null;


