<?php
// Set the API endpoint URL
$url = 'http://localhost:8080/api/reports';

// Fetch data from the API using cURL
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Decode the response JSON into an associative array
$data = json_decode($response, true);

// Check if there was an error fetching the data
if (!$data) {
  echo 'Error fetching data from API.';
  exit();
}

// Output the data as an HTML table
echo '<table>';
echo '<thead>';
echo '<tr>';
echo '<th>Device</th>';
echo '<th>Specify</th>';
echo '<th>Username</th>';
echo '<th>Hostname</th>';
echo '<th>Timestamp</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
foreach ($data as $row) {
  echo '<tr>';
  echo '<td>' . $row['device'] . '</td>';
  echo '<td>' . $row['specify'] . '</td>';
  echo '<td>' . $row['username'] . '</td>';
  echo '<td>' . $row['hostname'] . '</td>';
  echo '<td>' . $row['timestamp'] . '</td>';
  echo '</tr>';
}
echo '</tbody>';
echo '</table>';
?>
