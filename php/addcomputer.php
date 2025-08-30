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

// Create trigger to insert default lab_id
$triggerName = 'insert_default_lab_id';
$triggerQuery = "CREATE TRIGGER IF NOT EXISTS insert_default_lab_id 
            BEFORE INSERT ON computers 
            FOR EACH ROW 
            BEGIN 
              IF NEW.laboratory_id IS NULL THEN 
                SET NEW.laboratory_id = (SELECT id FROM laboratories ORDER BY id LIMIT 1); 
              END IF; 
            END;
            ";
try {
    $conn->exec($triggerQuery);
} catch (PDOException $e) {
    die("Trigger creation failed: " . $e->getMessage());
}

/* PHP for adding computer to a laboratory */
if (isset($_POST['add_computer'])) {
    $label = filter_input(INPUT_POST, 'label', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $serial_number = filter_input(INPUT_POST, 'serial_number', FILTER_SANITIZE_STRING);

    // Validate lab ID
    if (!isset($labId)) {
        die("Error: Laboratory ID not specified");
    }
    $labQuery = "SELECT id FROM laboratories WHERE id = ?";
    $stmt = $conn->prepare($labQuery);
    $stmt->execute([$labId]);
    if ($stmt->rowCount() == 0) {
        die("Error: Invalid laboratory ID");
    }

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

    $serial_number = filter_input(INPUT_POST, 'serial_number', FILTER_SANITIZE_STRING);

    // Prepare and execute statement to add computer
    $computerQuery = "INSERT INTO computers (laboratory_id, label, description, logo, serial_number) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($computerQuery);
    $result = $stmt->execute([$labId, $label, $description, $logo, $serial_number]);

    if ($result) {

        $activityType = 'create_computer';
        $activityDetails = 'User ' . $_SESSION['username'] . ' created a computer with label ' . $label;
        $activityQuery = "INSERT INTO user_activity (user_id, activity_type, activity_details) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($activityQuery);
        $stmt->execute([$_SESSION['user_id'], $activityType, $activityDetails]);
       
       
        if ($_SESSION['role'] == 'admin') {
            echo "<script>window.location.href = 'admincom.php?lab_id=" . $labId . "';</script>";
        } else {
            echo "<script>window.location.href = 'computers.php?lab_id=" . $labId . "';</script>";
        }

        exit;
    } else {
        die("Error: " . $stmt->errorInfo()[2]);
    }
}


// Close database connection
$conn = null;
ob_end_flush();
