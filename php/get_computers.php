<style>
    .card {
  border: 1px solid #ddd;
  box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.1);
}

.card-img-top {
  height: 150px;
  object-fit: cover;
  background-color: #f5f5f5;
}

.card-body {
  text-align: center;
}

.card-title {
  margin-top: 10px;
  margin-bottom: 0;
  font-size: 18px;
  font-weight: 600;
}

.card-text {
  font-size: 8px;
  color: #666;
}

.dot {
    position: absolute;
    top: 10px;
    right: 10px;
    width: 10px;
    height: 10px;
    border-radius: 50%;
}
.dot-green {
    background-color: green !important;
}

.dot-gray {
    background-color: gray;
}

</style>

<?php
// Establish database connection
try {
    $conn = new PDO('mysql:host=localhost;dbname=lab_management;charset=utf8mb4', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Retrieve lab ID from POST data
$labId = isset($_POST['lab_id']) ? intval($_POST['lab_id']) : null;

// Validate lab ID
if (!isset($labId)) {
    die("Error: Laboratory ID not specified");
}

// Retrieve laboratory with the given ID
$labQuery = "SELECT id, name FROM laboratories WHERE id = ?";
$stmt = $conn->prepare($labQuery);
$stmt->execute([$labId]);
$lab = $stmt->fetch();

// Check if laboratory was found
if (!$lab || !is_array($lab)) {
    die("Error: Laboratory not found");
}

// Retrieve computers in the laboratory
$computerQuery = "SELECT * FROM computers WHERE laboratory_id = ?";
$stmt = $conn->prepare($computerQuery);
$stmt->execute([$labId]);
$computers = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Retrieve list of logged-in users from API
$apiUrl = 'http://localhost:8081/api/logged-in-users/logged_in_users';
$loggedInUsers = @json_decode(@file_get_contents($apiUrl), true);
if (!$loggedInUsers) {
    // Handle error
    echo 'Error retrieving logged-in users.';
    exit;
}

// Build associative array with latest login time for each hostname
$latestLogins = [];
foreach ($loggedInUsers as $loggedInUser) {
    if (!isset($latestLogins[$loggedInUser['hostname']]) ||
        strtotime($loggedInUser['loginTime']) > strtotime($latestLogins[$loggedInUser['hostname']]['loginTime'])) {
        $latestLogins[$loggedInUser['hostname']] = $loggedInUser;
    }
   
}

// Generate HTML for computer list
$template = <<<EOT
<div class="col-lg-4 col-md-6 col-sm-6">
    <div class="card p-20">
        <div class="dot dot-%s"></div>
        <img class="card-img-top" src="desktop.png" alt="Computer Image">
        <div class="card-body">
            <h4 class="card-title">%s</h4>
            <p class="card-text">%s</p>
        </div>
    </div>
</div>
EOT;

$computerList = '';
foreach ($computers as $computer) {
    $dotColor = 'gray';
    if (isset($latestLogins[$computer['serial_number']]) && $latestLogins[$computer['serial_number']]['loginStatus']) {
        $dotColor = 'green';
    }
    $serialNumber = htmlspecialchars($computer['serial_number']);
    $label = htmlspecialchars($computer['label']);
    $computerList .= sprintf($template, $dotColor, $label, $serialNumber);
 
}
$conn = null;



// Close the database connection


// Send the computer list back to the client

echo "<h4>Computers in Laboratory: " . $lab["name"] . "</h4>";
echo "<div class='row'>" . $computerList . "</div>";
?>
