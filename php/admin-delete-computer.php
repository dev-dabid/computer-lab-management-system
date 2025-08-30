<?php
// Include database connection code
include_once 'comdelcon.php';

if(isset($_POST['computer_id'])) {
    $computerId = $_POST['computer_id'];

    // Get the lab id from the database using the computer id
    $sql = "SELECT laboratory_id FROM computers WHERE id = $computerId";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $labId = $row['laboratory_id'];

        // Delete the related peripherals from the database
        $sql = "DELETE FROM peripherals WHERE computer_id = $computerId";
        if (mysqli_query($conn, $sql)) {
            // Delete the computer from the database
            $sql = "DELETE FROM computers WHERE id = $computerId";
            if (mysqli_query($conn, $sql)) {
                // Track user activity for computer deletion
                $activityType = 'delete_computer';
                $activityDetails = 'User ' . $_SESSION['username'] . ' deleted a computer with id ' . $computerId;
                $activityQuery = "INSERT INTO user_activity (user_id, activity_type, activity_details) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($activityQuery);
                $stmt->execute([$_SESSION['user_id'], $activityType, $activityDetails]);

                echo "Computer deleted successfully";
            } else {
                echo "Error deleting computer: " . mysqli_error($conn);
            }
        } else {
            echo "Error deleting peripherals: " . mysqli_error($conn);
        }

        // Reload the page to update the computer list
        header("Location: admincom.php?lab_id=$labId");
    } else {
        header("Location: admincom.php?lab_id=$labId");
    }
}
