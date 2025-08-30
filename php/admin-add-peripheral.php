<?php
ob_start();
// Initialize variables
$labId = isset($_GET['lab_id']) ? intval($_GET['lab_id']) : null;
$conn = null;

// Establish database connection
try {
    $conn = new PDO('mysql:host=localhost;dbname=lab_management;charset=utf8mb4', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Get list of computers in the current laboratory
$computersQuery = "SELECT id, label FROM computers WHERE laboratory_id = ?";
$stmt = $conn->prepare($computersQuery);
$stmt->execute([$labId]);
$computers = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Process form submission
if (isset($_POST['add-peripheral-btn'])) {
    $peripheralType = filter_input(INPUT_POST, 'peripheral-type', FILTER_SANITIZE_STRING);
    $brand = filter_input(INPUT_POST, 'brand', FILTER_SANITIZE_STRING);
    $model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING);
    $serialNumber = filter_input(INPUT_POST, 'serial-number', FILTER_SANITIZE_STRING);
    $computerId = filter_input(INPUT_POST, 'computer-id', FILTER_SANITIZE_NUMBER_INT);

    // Handle logo upload
    $logo = null;
    if (isset($_FILES['logo'])) {
        $logoFile = $_FILES['logo'];
        if ($logoFile['error'] == UPLOAD_ERR_OK) {
            $tmpName = $logoFile['tmp_name'];
            $name = basename($logoFile['name']);
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            $allowedExt = array('jpg', 'jpeg', 'png', 'gif');
            if (in_array(strtolower($ext), $allowedExt)) {
                $logo = uniqid() . '.' . $ext;
                $dest = 'uploads/' . $logo;
                if (move_uploaded_file($tmpName, $dest)) {
                    // File was uploaded successfully
                } else {
                    $logo = null;
                }
            }
        }
    }

    // Prepare and execute statement to add peripheral
    $peripheralQuery = "INSERT INTO peripherals (computer_id, peripheral_type, brand, model, serial_number, logo) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($peripheralQuery);
    $result = $stmt->execute([$computerId, $peripheralType, $brand, $model, $serialNumber, $logo]);
    $labId = $_POST['lab_id'];
   

    // Track user activity for adding a peripheral
    $activityType = 'add_peripheral';
    $activityDetails = 'User ' . $_SESSION['username'] . ' added a ' . $peripheralType . ' peripheral to computer with id ' . $computerId;
    $activityQuery = "INSERT INTO user_activity (user_id, activity_type, activity_details) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($activityQuery);
    $stmt->execute([$_SESSION['user_id'], $activityType, $activityDetails]);

    if ($result) {
        echo "<script>window.location.href = 'adminperip.php?lab_id=" . $labId . "&computer_id=" . $computerId . "';</script>";

        exit;
    } else {
        die("Error: " . $stmt->errorInfo()[2]);
    }
}
// Close database connection
$conn = null;
