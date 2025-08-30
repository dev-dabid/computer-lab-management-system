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
        header('Location: login-page.php');
        exit();
    }
    ?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600|Open+Sans:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="/Pixel Admin 2/wrappixel.com/demos/admin-templates/pixeladmin/inverse/dist/css/spur.css">



    <link href="../plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="../../../../../cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />

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


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
                <a href="admin.php" class="dash-nav-item">
                    <i class="fas fa-home"></i> Dashboard </a>
                <div class="dash-nav-dropdown">
                    <a href="#!" class="dash-nav-item dash-nav-dropdown-toggle">
                        <i class="fas fa-sign-language"></i> Manage Device </a>
                    <div class="dash-nav-dropdown-menu">
                        <a href="adminlab.php" class="dash-nav-dropdown-item">Laboratories</a>
                        <a href="adminrep.php" class="dash-nav-dropdown-item">Reports</a>
                        <a href="adminstat.php" class="dash-nav-dropdown-item">Status</a>
                    </div>
                </div>

                <div class="dash-nav-dropdown">
                    <a href="#!" class="dash-nav-item dash-nav-dropdown-toggle">
                        <i class="fas fa-user-friends"></i> Accounts </a>
                    <div class="dash-nav-dropdown-menu">
                        <a href="staff.php" class="dash-nav-dropdown-item">Staff</a>
                        <a href="adminlogs.php" class="dash-nav-dropdown-item">Logs</a>
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
                                    echo 'Logged in as <p style="color: red;">Admin</p>';
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
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Data Table</h3>
                            <p class="text-muted m-b-30">Data table example</p>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Location</th>
                                            <th>Peripheral Type</th>
                                            <th>Brand</th>
                                            <th>Model</th>
                                            <th>Serial No.</th>
                                            <th>Specify</th>
                                            <th>User</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php

                                        $url = 'http://localhost:8080/api/reports';


                                        $ch = curl_init($url);
                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                        $response = curl_exec($ch);
                                        curl_close($ch);

                                        $data = json_decode($response, true);


                                        if (!$data) {
                                            echo 'Error fetching data from API.';
                                            exit();
                                        }


                                        try {
                                            $conn = new PDO('mysql:host=localhost;dbname=lab_management;charset=utf8mb4', 'root', '');
                                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        } catch (PDOException $e) {
                                            die("Connection failed: " . $e->getMessage());
                                        }


                                        $peripheralsQuery = "SELECT p.peripheral_type, p.brand, p.model, p.serial_number, c.label AS computer_label, l.name AS lab_label FROM peripherals p JOIN computers c ON p.computer_id = c.id JOIN laboratories l ON c.laboratory_id = l.id";
                                        $stmt = $conn->prepare($peripheralsQuery);
                                        $stmt->execute();
                                        $peripherals = $stmt->fetchAll(PDO::FETCH_ASSOC);


                                        $url = "http://localhost:8080/api/reports";
                                        $data = json_decode(file_get_contents($url), true);




                                        foreach ($peripherals as $peripheral) {



                                            foreach ($data as $item) {

                                                if ($item['hostname'] == $peripheral['serial_number']) {


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



                                                if ($item['device'] == $peripheral['peripheral_type']) {


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


                                        $conn = null;



                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

            </main>

            <script>    

                $(document).ready(function() {
                    setInterval(function() {
                        $.ajax({
                            url: 'http://localhost:8080/api/reports',
                            dataType: 'json',
                            success: function(data) {
                                updateTable(data);
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                console.log('Error fetching data from API: ' + errorThrown);
                            }
                        });
                    }, 3000); 

                    var peripherals = <?php echo json_encode($peripherals); ?>;

                    function updateTable(data) {
                        var tableRows = '';
        
                        $.each(data, function(index, item) {
                            $.each(peripherals, function(index, peripheral) {
                                if (item.hostname == peripheral.serial_number || item.device == peripheral.peripheral_type) {
                                    tableRows += '<tr>';
                                    tableRows += '<td>' + item.id + '</td>';
                                    tableRows += '<td>' + peripheral.lab_label + '/' + peripheral.computer_label + '</td>';
                                    tableRows += '<td>' + peripheral.peripheral_type + '</td>';
                                    tableRows += '<td>' + peripheral.brand + '</td>';
                                    tableRows += '<td>' + peripheral.model + '</td>';
                                    tableRows += '<td>' + peripheral.serial_number + '</td>';
                                    tableRows += '<td>' + item.specify + '</td>';
                                    tableRows += '<td>' + item.username + '</td>';
                                    tableRows += '<td>' + item.timestamp + '</td>';
                                    tableRows += '<td><button class="repair-btn" data-id="' + peripheral.serial_number + '">Repaired</button><button class="pull-out-btn" data-id="' + peripheral.serial_number + '">Pulled out</button></td>';
                                    tableRows += '</tr>';
                                }
                            });
                        });
                        $('#myTable tbody').html(tableRows);
                    }
                });
            </script>

            <script>
                $(document).ready(function() {
                   
                    $('table#myTable').on('click', 'button.repair-btn, button.pull-out-btn', function() {
                    
                        var row = $(this).closest('tr');

                        var id = row.find('td:eq(0)').text();
                        var location = row.find('td:eq(1)').text();
                        var peripheralType = row.find('td:eq(2)').text();
                        var brand = row.find('td:eq(3)').text();
                        var model = row.find('td:eq(4)').text();
                        var serialNumber = row.find('td:eq(5)').text();
                        var specify = row.find('td:eq(6)').text();
                        var user = row.find('td:eq(7)').text();
                        var date = row.find('td:eq(8)').text();
                        var action = $(this).text();
                        var userAction = <?php echo json_encode($_SESSION['username']); ?>;

                 
                        $.ajax({
                            type: 'POST',
                            url: 'save_report.php',
                            data: {

                                id: id,
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

        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="/Pixel Admin 2/wrappixel.com/demos/admin-templates/pixeladmin/inverse/dist/js/spur.js"></script>

    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <script src="../plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="../../../../../cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="../../../../../cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="../../../../../cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="../../../../../cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="../../../../../cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="../../../../../cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="../../../../../cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
            $(document).ready(function() {
                var table = $('#example').DataTable({
                    "columnDefs": [{
                        "visible": false,
                        "targets": 2
                    }],
                    "order": [
                        [2, 'asc']
                    ],
                    "displayLength": 25,
                    "drawCallback": function(settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;

                        api.column(2, {
                            page: 'current'
                        }).data().each(function(group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before(
                                    '<tr class="group"><td colspan="5">' + group + '</td></tr>'
                                );

                                last = group;
                            }
                        });
                    }
                });

                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function() {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    } else {
                        table.order([2, 'asc']).draw();
                    }
                });
            });
        });
        $('#example23').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    </script>





</body>

</html>