<?php
session_start();
require 'connectiondel.php';

if (isset($_POST['delete_lab']) AND ($_SESSION['role'] == 'admin')) {
    $labId = filter_input(INPUT_POST, 'lab_id', FILTER_SANITIZE_NUMBER_INT);
    $result = deleteLabAndComputers($labId);
    if ($result === true) {
        header('Location: adminlab.php');
        exit;
    } else {
        echo "<script>alert('$result'); window.location.href = 'laboratories.php';</script>";
        exit;
    }
}

function deleteLabAndComputers($lab_id)
{
    global $conn;

    // Get the laboratory name and database name
    $sql = "SELECT name, db_name FROM laboratories WHERE id = $lab_id";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $lab_name = $row['name'];
        $db_name = $row['db_name'];
    } else {
        return "Failed to fetch laboratory.";
    }

    // Delete the peripherals associated with the computers in the laboratory
    $sql = "DELETE FROM peripherals WHERE computer_id IN (SELECT id FROM computers WHERE laboratory_id = $lab_id)";
    if (!mysqli_query($conn, $sql)) {
        return "Failed to delete peripherals: " . mysqli_error($conn);
    }

    // Delete the computers associated with the laboratory
    $sql = "DELETE FROM computers WHERE laboratory_id = $lab_id";
    if (!mysqli_query($conn, $sql)) {
        return "Failed to delete computers: " . mysqli_error($conn);
    }

    // Drop the laboratory database
    $sql = "DROP DATABASE IF EXISTS $db_name";
    if (!mysqli_query($conn, $sql)) {
        return "Failed to drop database: " . mysqli_error($conn);
    }

    // Remove the laboratory record from the laboratories table
    $sql = "DELETE FROM laboratories WHERE id = $lab_id";
    if (!mysqli_query($conn, $sql)) {
        return "Failed to delete laboratory: " . mysqli_error($conn);
    }

    // Delete the laboratory logo file
    $logo_path = "uploads/" . $lab_name . ".*";
    array_map('unlink', glob($logo_path));

    return true;
}
