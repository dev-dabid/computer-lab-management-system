<!doctype html>
<html lang="en">

<head>

    <?php
    session_start();

    // Check if the session variables are set
    if (isset($_SESSION['username']) && isset($_SESSION['user_id'])) {
        // User is logged in, display personalized content or allow access to protected resources
    } else {
        // User is not logged in, redirect to login page or show a message
        header('Location: login.php');
        exit();
    }
    ?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600|Open+Sans:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="/Pixel Admin 2/wrappixel.com/demos/admin-templates/pixeladmin/inverse/dist/css/spur.css">


    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">

    <title>Computer Management</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .action-btn {
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .action-btn.repaired {
            background-color: #4CAF50;
            color: white;
        }

        .action-btn.pulled-out {
            background-color: #f44336;
            color: white;
        }
    </style>


</head>

<body>
    <div class="dash">
        <div class="dash-nav dash-nav-dark">
            <header>
                <a href="#!" class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </a>
                <a href="javascript:ChangeTOContent1();" class="spur-logo"><i class=""></i> <span>Lab</span></a>
            </header>
            <nav class="dash-nav-list">
                <a href="home.php" class="dash-nav-item">
                    <i class="fas fa-home"></i> Dashboard </a>
                <div class="dash-nav-dropdown">
                    <a href="#!" class="dash-nav-item dash-nav-dropdown-toggle">
                        <i class="fas fa-sign-language"></i> Manage Device </a>
                    <div class="dash-nav-dropdown-menu">
                        <a href="laboratories.php" class="dash-nav-dropdown-item">Laboratories</a>
                        <a href="reports.php" class="dash-nav-dropdown-item">Reports</a>
                        <a href="status.php" class="dash-nav-dropdown-item">Status</a>
                    </div>
                </div>

                <div class="dash-nav-dropdown">
                    <a href="#!" class="dash-nav-item dash-nav-dropdown-toggle">
                        <i class="fas fa-user-friends"></i> Accounts </a>
                    <div class="dash-nav-dropdown-menu">
                        <a href="logs.php" class="dash-nav-dropdown-item">Logs</a>
                    </div>
                </div>

                <!--<div class="dash-nav-dropdown ">
                    <a href="#!" class="dash-nav-item dash-nav-dropdown-toggle">
                        <i class="fas fa-cube"></i> Components </a>
                    <div class="dash-nav-dropdown-menu">
                        <a href="cards.html" class="dash-nav-dropdown-item">Cards</a>
                        <a href="forms.html" class="dash-nav-dropdown-item">Forms</a>
                        <div class="dash-nav-dropdown ">
                            <a href="#" class="dash-nav-dropdown-item dash-nav-dropdown-toggle">Icons</a>
                            <div class="dash-nav-dropdown-menu">
                                <a href="icons.html" class="dash-nav-dropdown-item">Solid Icons</a>
                                <a href="icons.html#regular-icons" class="dash-nav-dropdown-item">Regular Icons</a>
                                <a href="icons.html#brand-icons" class="dash-nav-dropdown-item">Brand Icons</a>
                            </div>
                        </div>
                        <a href="stats.html" class="dash-nav-dropdown-item">Stats</a>
                        <a href="tables.html" class="dash-nav-dropdown-item">Tables</a>
                        <a href="typography.html" class="dash-nav-dropdown-item">Typography</a>
                        <a href="userinterface.html" class="dash-nav-dropdown-item">User Interface</a>
                    </div>
                </div>-->

                <!--<div class="dash-nav-dropdown">
                    <a href="#!" class="dash-nav-item dash-nav-dropdown-toggle">
                        <i class="fas fa-file"></i> Layouts </a>
                    <div class="dash-nav-dropdown-menu">
                        <a href="blank.html" class="dash-nav-dropdown-item">Blank</a>
                        <a href="content.html" class="dash-nav-dropdown-item">Content</a>
                        <a href="login.html" class="dash-nav-dropdown-item">Log in</a>
                        <a href="signup.html" class="dash-nav-dropdown-item">Sign up</a>
                    </div>
                </div>-->

                <!-- <div class="dash-nav-dropdown">
                    <a href="#!" class="dash-nav-item dash-nav-dropdown-toggle">
                        <i class="fas fa-info"></i> About </a>
                    <div class="dash-nav-dropdown-menu">
                        <a href="https://github.com/HackerThemes/spur-template" target="_blank" class="dash-nav-dropdown-item">GitHub</a>
                        <a href="http://hackerthemes.com" target="_blank" class="dash-nav-dropdown-item">HackerThemes</a>
                    </div>
                </div>-->
                <br><br><br><br>
                <center>
                    <div style="font-size:20px;
                 font-weight: bold;
                  color: white"><?php if ($_SESSION['role'] == 'admin') {
                                    echo 'Logged in as <p style="color: blue;">Admin</p>';
                                } else {
                                    echo 'Logged in as: <p style="color: green;">Tech</p>';
                                    echo 'User: ' . $_SESSION['username'];
                                }
                                ?></div>
                </center>
            </nav>
        </div>
        <div class="dash-app">
            <header class="dash-toolbar">
                <a href="#!" class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </a>
                <a href="#!" class="searchbox-toggle">
                    <i class="fas fa-search"></i>
                </a>
                <form class="searchbox" action="#!">
                    <a href="#!" class="searchbox-toggle"> <i class="fas fa-arrow-left"></i> </a>
                    <button type="submit" class="searchbox-submit"> <i class="fas fa-search"></i> </button>
                    <input type="text" class="searchbox-input" placeholder="type to search">
                </form>
                <div class="tools">
                    <a href="" target="_blank" class="tools-item">
                        <i class=""></i>
                    </a>
                    <a href="#!" class="tools-item">
                        <i class="fas fa-bell"></i>
                        <i class="tools-item-count">4</i>
                    </a>
                    <div class="dropdown tools-item">
                        <a href="#" class="" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item" href="#!">Profile</a>
                            <form action="logout.php" method="post">
                                <input class="dropdown-item" type="submit" name="logout" value="Logout">
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <main class="dash-content">

                <table id="report-table">
                    <thead>

                    </thead>
                    <tbody>
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

                        // Establish database connection
                        try {
                            $conn = new PDO('mysql:host=localhost;dbname=lab_management;charset=utf8mb4', 'root', '');
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        } catch (PDOException $e) {
                            die("Connection failed: " . $e->getMessage());
                        }

                        // Get list of peripherals from the database
                        // Get list of peripherals from the database
                        // Get list of peripherals from the database
                        $peripheralsQuery = "SELECT p.peripheral_type, p.brand, p.model, p.serial_number, c.label AS computer_label, l.name AS lab_label FROM peripherals p JOIN computers c ON p.computer_id = c.id JOIN laboratories l ON c.laboratory_id = l.id";
                        $stmt = $conn->prepare($peripheralsQuery);
                        $stmt->execute();
                        $peripherals = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        // Get data from API
                        $url = "http://localhost:8080/api/reports";
                        $data = json_decode(file_get_contents($url), true);

                        // Display table with matching data
                        echo '<table id="report-table">';
                        echo '<thead>';
                        echo '<tr>';
                        echo '<th>ID</th>';
                        echo '<th>Location</th>';
                        echo '<th>Peripheral Type</th>';
                        echo '<th>Brand</th>';
                        echo '<th>Model</th>';
                        echo '<th>Serial No.</th>';
                        echo '<th>Specify</th>';
                        echo '<th>User</th>';
                        echo '<th>Date</th>';
                        echo '<th>Action</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';

                        foreach ($peripherals as $peripheral) {
                            // Check if the "disabled" key exists in the peripheral array
                            $disabled = isset($peripheral['disabled']) ? $peripheral['disabled'] : '';

                            foreach ($data as $item) {
                                // Check if the serial number of the computer matches the hostname in the API
                                if ($item['hostname'] == $peripheral['serial_number']) {
                                    // Display the location of the computer and laboratory
                                    echo '<tr' . ($disabled ? ' class="disabled"' : '') . '>';
                                    echo '<td>' . $item['id'] . '</td>';
                                    echo '<td>' . $peripheral['lab_label'] . '/' . $peripheral['computer_label'] . '</td>';
                                    echo '<td>' . $peripheral['peripheral_type'] . '</td>';
                                    echo '<td>' . $peripheral['brand'] . '</td>';
                                    echo '<td>' . $peripheral['model'] . '</td>';
                                    echo '<td>' . $peripheral['serial_number'] . '</td>';
                                    echo '<td>' . $item['specify'] . '</td>';
                                    echo '<td>' . $item['username'] . '</td>';
                                    echo '<td>' . $item['timestamp'] . '</td>';
                                    echo '<td><button class="repair-btn" data-id="' . $peripheral['serial_number'] . '">Repaired</button><button class="pull-out-btn" data-id="' . $peripheral['serial_number'] . '">Pulled out</button></td>';
                                    echo '</tr>';
                                }

                                
                                // Check if the peripheral type matches the device in the API
                                if ($item['device'] == $peripheral['peripheral_type']) {
                                    // Display the details of the peripheral
                                    echo '<tr' . ($disabled ? ' class="disabled"' : '') . '>';
                                    echo '<td>' . $item['id'] . '</td>';
                                    echo '<td>' . $peripheral['lab_label'] . '/' . $peripheral['computer_label'] . '</td>';
                                    echo '<td>' . $peripheral['peripheral_type'] . '</td>';
                                    echo '<td>' . $peripheral['brand'] . '</td>';
                                    echo '<td>' . $peripheral['model'] . '</td>';
                                    echo '<td>' . $peripheral['serial_number'] . '</td>';
                                    echo '<td>' . $item['specify'] . '</td>';
                                    echo '<td>' . $item['username'] . '</td>';
                                    echo '<td>' . $item['timestamp'] . '</td>';
                                    echo '<td><button class="repair-btn" data-id="' . $peripheral['serial_number'] . '" data-report-id="' . $item['id'] . '">Repaired</button><button class="pull-out-btn" data-id="' . $peripheral['serial_number'] . '" data-report-id="' . $item['id'] . '">Pulled out</button></td>';
                                    echo '</tr>';
                                }
                            }
                        }


                        echo '</tbody>';
                        echo '</table>';

                        // Close database connection
                        $conn = null;


                        ?>



                    </tbody>
                </table>


                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

                <script>
                    // Define a function to update the table with new data from the API
                    function updateTable() {
                        // Fetch data from the API using AJAX
                        $.ajax({
                            url: 'http://localhost:8080/api/reports',
                            success: function(data) {
                                // Parse the JSON response into an array of objects
                                var reports = JSON.parse(data);

                                // Update the table HTML with the new data
                                var tableHTML = '';
                                reports.forEach(function(report) {
                                    tableHTML += '<tr>';
                                    tableHTML += '<td>' + report.location + '</td>';
                                    tableHTML += '<td>' + report.peripheral_type + '</td>';
                                    tableHTML += '<td>' + report.brand + '</td>';
                                    tableHTML += '<td>' + report.model + '</td>';
                                    tableHTML += '<td>' + report.serial_number + '</td>';
                                    tableHTML += '<td>' + report.specify + '</td>';
                                    tableHTML += '<td>' + report.user + '</td>';
                                    tableHTML += '<td>' + report.date + '</td>';
                                    tableHTML += '<td><button class="repair-btn" data-id="' + report.serial_number + '">Repaired</button><button class="pull-out-btn" data-id="' + report.serial_number + '">Pulled out</button></td>';
                                    tableHTML += '</tr>';
                                });
                                $('#report-table tbody').html(tableHTML);
                            }
                        });
                    }

                    // Call the updateTable function to update the table on page load
                    updateTable();

                    // Call the updateTable function every 5 seconds to automatically refresh the table with new data
                    setInterval(updateTable, 5000);
                </script>

                <script>
                    $(document).ready(function() {
                        // Listen for click events on the repair-btn and pull-out-btn
                        $('table#report-table').on('click', 'button.repair-btn, button.pull-out-btn', function() {
                            // Get the data from the row where the button was clicked
                            var row = $(this).closest('tr');
                            var location = row.find('td:eq(0)').text();
                            var peripheralType = row.find('td:eq(1)').text();
                            var brand = row.find('td:eq(2)').text();
                            var model = row.find('td:eq(3)').text();
                            var serialNumber = row.find('td:eq(4)').text();
                            var specify = row.find('td:eq(5)').text();
                            var user = row.find('td:eq(6)').text();
                            var date = row.find('td:eq(7)').text();
                            var action = $(this).text();
                            var userAction = <?php echo json_encode($_SESSION['username']); ?>;

                            // Send the data to the PHP script for insertion into the database
                            $.ajax({
                                type: 'POST',
                                url: 'save_report.php',
                                data: {
                                    location: location,
                                    peripheral_type: peripheralType,
                                    brand: brand,
                                    model: model,
                                    serial_number: serialNumber,
                                    specify: specify,
                                    user: user,
                                    date: date,
                                    action: action,
                                    user_action: userAction
                                },
                                success: function(data) {
                                    alert('Data saved successfully.');
                                },
                                error: function() {
                                    alert('Error saving data.');
                                }
                            });
                        });
                    });
                </script>


            </main>
        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="/Pixel Admin 2/wrappixel.com/demos/admin-templates/pixeladmin/inverse/dist/js/spur.js"></script>







</body>

</html>