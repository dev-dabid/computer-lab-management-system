<?php
// Establish database connection
try {
    $conn = new PDO('mysql:host=localhost;dbname=soe;charset=utf8mb4', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Check if the id parameter is present in the URL
if (isset($_GET['id'])) {
    // Prepare the query
    $stmt = $conn->prepare("DELETE FROM reports WHERE id = :id");
    $stmt->bindParam(':id', $_GET['id']);

    // Execute the query
    if ($stmt->execute()) {
        echo 'Record deleted successfully';
    } else {
        echo 'Error deleting record';
    }
} else {
    echo 'No id specified';
}

// Close the database connection
$conn = null;
?>
