<?php

 require_once 'labdata.php';
// Fetch the laboratories from the database
$sql = "SELECT * FROM laboratories";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="laboratory-container">';
    echo "<a href='admincom.php?lab_id=" . $row['id'] . "'>";
    echo "<div class='laboratory'>";
    echo "<img src='uploads/" . $row['logo'] . "' alt='Logo'>";
    echo "<h3>" . $row['name'] . "</h3>";
    echo "<p>" . "Location: " . $row['location'] . "</p>";
    echo "<p>" . "Description: " . $row['description'] . "</p>";
    echo "</div>";
    echo "</a>";
    echo "<div class='delete-lab-btn' data-lab-id='" . $row['id'] . "' style='display:none;'>Delete</div>";
    echo '</div>';
  }
}


// Add the confirmation dialog HTML at the end of the page
echo '<div id="delete-lab-confirmation-dialog" style="display:none;">';
echo '<p>Are you sure you want to delete this laboratory?</p>';
echo '<button id="delete-lab-yes-btn">Yes</button>';
echo '<button id="delete-lab-no-btn">No</button>';
echo '</div>';
