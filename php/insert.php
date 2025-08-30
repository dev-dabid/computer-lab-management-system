<?php
// Establish database connection
$mysqli = new mysqli('localhost', 'root', '', 'lab_management');
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}



// Check if an AJAX request was sent
if (isset($_POST['location']) && isset($_POST['peripheralType']) && isset($_POST['brand']) && isset($_POST['model']) && isset($_POST['serialNo']) && isset($_POST['action'])) {
    $location = $_POST['location'];
    $peripheralType = $_POST['peripheralType'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $serialNo = $_POST['serialNo'];
    $action = $_POST['action'];

    // Insert a new row into the peripheral_report table with the relevant data
    $insertQuery = "INSERT INTO peripheral_report (location, peripheral_type, brand, model, serial_no, action) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($insertQuery);
    $stmt->bind_param('ssssss', $location, $peripheralType, $brand, $model, $serialNo, $action);
    $stmt->execute();
    if ($stmt->error) {
        printf("Error: %s.\n", $stmt->error);
    }
    $stmt->close();



    // Return a response indicating the insertion was successful
    echo json_encode(['success' => true]);
    exit;
}
