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
                <center><div style="font-size:20px;
                 font-weight: bold;
                  color: white"><?php if ($_SESSION['role'] == 'admin') {
                             echo 'Logged in as <p style="color: blue;">Admin</p>';

                        } else {
                            echo 'Logged in as: <p style="color: green;">Tech</p>';
                            echo 'User: ' . $_SESSION['username'];
                        }
                        ?></div></center>
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

                <div class="container-fluid">
                    <div class="row dash-row">
                        <div class="col-xl-4">
                            <div class="stats stats-primary">
                                <h3 class="stats-title" style="color:white"> Pending </h3>
                                <div class="stats-content">
                                    <div class="stats-icon">
                                        <i class="fas fa-edit"></i>
                                    </div>
                                    <div class="stats-data">
                                        <div class="stats-number"><?php
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

                                                                    // Display the total number of reports
                                                                    echo count($data);
                                                                    ?>
                                        </div>
                                        <div class="stats-change">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="stats stats-success ">
                                <h3 class="stats-title" style="color:white"> Repaired </h3>
                                <div class="stats-content">
                                    <div class="stats-icon">
                                        <i class="fas fa-wrench"></i>
                                    </div>
                                    <div class="stats-data">
                                        <?php
                                        // Connect to the database
                                        $servername = "localhost";
                                        $username = "root";
                                        $password = "";
                                        $dbname = "lab_management";

                                        $conn = new mysqli($servername, $username, $password, $dbname);
                                        if ($conn->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                        }

                                        // Retrieve the count of "Pulled out" values from the database
                                        $sql = "SELECT COUNT(*) as count FROM peripheral_reports WHERE action = 'Repaired'";
                                        $result = $conn->query($sql);
                                        $count = 0;
                                        if ($result->num_rows > 0) {
                                            $row = $result->fetch_assoc();
                                            $count = $row["count"];
                                        }

                                        // Display the count as the value of the stats-number element
                                        echo '<div class="stats-number">' . $count . '</div>';

                                        // Close the database connection
                                        $conn->close();
                                        ?>
                                        <div class="stats-change">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="stats stats-danger">
                                <h3 class="stats-title" style="color:white"> Pulled Out </h3>
                                <div class="stats-content">
                                    <div class="stats-icon">
                                        <i class="fas fa-box-open"></i>
                                    </div>
                                    <div class="stats-data">
                                        <?php
                                        // Connect to the database
                                        $servername = "localhost";
                                        $username = "root";
                                        $password = "";
                                        $dbname = "lab_management";

                                        $conn = new mysqli($servername, $username, $password, $dbname);
                                        if ($conn->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                        }

                                        // Retrieve the count of "Pulled out" values from the database
                                        $sql = "SELECT COUNT(*) as count FROM peripheral_reports WHERE action = 'Pulled out'";
                                        $result = $conn->query($sql);
                                        $count = 0;
                                        if ($result->num_rows > 0) {
                                            $row = $result->fetch_assoc();
                                            $count = $row["count"];
                                        }

                                        // Display the count as the value of the stats-number element
                                        echo '<div class="stats-number">' . $count . '</div>';

                                        // Close the database connection
                                        $conn->close();
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card spur-card">
                            <div class="card-header">
                                <div class="spur-card-icon">
                                    <i class="fas fa-desktop"></i>
                                </div>
                                <div class="spur-card-title"> Computers </div>
                                <div class="spur-card-menu">
                                    <div class="dropdown show">
                                        <a class="spur-card-menu-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                            <?php require 'adddd.php'; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body spur-card-body-chart" id="computer-list">
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-6">
                        <div class="card spur-card">
                            <div class="card-header">
                                <div class="spur-card-icon">
                                    <i class="fas fa-bell"></i>
                                </div>
                                <div class="spur-card-title"> Notifications </div>
                            </div>
                            <div class="card-body ">
                                <div class="notifications">
                                    <a href="#!" class="notification">
                                        <div class="notification-icon">

                                        </div>
                                        <?php
                                        // API URL
                                        $url = "http://localhost:8080/api/reports";

                                        // Get the JSON data from the API URL
                                        $json_data = file_get_contents($url);

                                        // Convert the JSON data into a PHP array
                                        $reports = json_decode($json_data, true);

                                        // Loop through the reports array and display each report as a notification
                                        foreach ($reports as $report) {
                                            $device = $report['device'];
                                            $timestamp = $report['timestamp'];

                                            echo '<a href="#!" class="notification">';
                                            echo '<div class="notification-icon"><i class="fas fa-inbox"></i></div>';
                                            echo '<div class="notification-text">' . $device . ' - reported an issue</div>';
                                            echo '<span class="notification-time">' . $timestamp . '</span>';
                                            echo '</a>';
                                        }
                                        ?>

                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        </main>
    </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function() {
            // Attach click handler to dropdown items
            $(".dropdown-item").click(function() {
                // Get the lab ID from the data attribute
                var labId = $(this).data("lab-id");

                // Make AJAX request to retrieve the computers for the selected lab
                $.ajax({
                    url: "get_computers.php",
                    method: "POST",
                    data: {
                        lab_id: labId
                    },
                    success: function(response) {
                        // Update the computer list with the response from the server
                        $(".spur-card-body-chart").html(response);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        // Handle errors
                        alert("Error: " + errorThrown);
                    }
                });
            });
        });
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="/Pixel Admin 2/wrappixel.com/demos/admin-templates/pixeladmin/inverse/dist/js/spur.js"></script>







</body>

</html>