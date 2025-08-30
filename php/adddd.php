<?php

// Initialize variables
$conn = null;

// Establish database connection
try {
    $conn = new PDO('mysql:host=localhost;dbname=lab_management;charset=utf8mb4', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Fetch all laboratories
$labQuery = "SELECT * FROM laboratories";
$stmt = $conn->prepare($labQuery);
$stmt->execute();
$labs = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Loop through laboratories and display them as dropdown items
foreach ($labs as $lab) {
    echo '<a class="dropdown-item" href="#" data-lab-id="' . $lab['id'] . '">' . $lab['name'] . '</a>';
}


// Close database connection
$conn = null;
