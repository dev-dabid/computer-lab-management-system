<?php
 session_start();



$pdo = new PDO("mysql:host=localhost;dbname=lab_management", "root", "");

if (isset($_POST['delete']) && isset($_POST['peripheral_id'])) {
    $peripheralId = $_POST['peripheral_id'];
    $labId = $_POST['lab_id'];
    $computerId = $_POST['computer_id'];

    // Delete the peripheral from the database
    $stmt = $pdo->prepare("DELETE FROM peripherals WHERE id = ?");
    $stmt->execute([$peripheralId]);

    // Track the user activity
    $activityType = 'delete_peripheral';
    $activityDetails = 'User ' . $_SESSION['username'] . ' deleted a peripheral with ID ' . $peripheralId . ' from computer with ID ' . $computerId;
    $activityQuery = "INSERT INTO user_activity (user_id, activity_type, activity_details) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($activityQuery);
    $stmt->execute([$_SESSION['user_id'], $activityType, $activityDetails]);

    // Redirect to the computer details page with a success message
    $queryString = http_build_query([
        'lab_id' => $labId,
        'computer_id' => $computerId,
        'peripheral_deleted' => true,
    ]);
    if ($_SESSION['role'] == 'admin') {
        echo "<script>window.location.href = 'adminperip.php?lab_id=" . $labId . "&computer_id=" . $computerId . "';</script>";
    } else {
        echo "<script>window.location.href = 'computer-details.php?lab_id=" . $labId . "&computer_id=" . $computerId . "';</script>";
    }
    exit;
}
