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

    <!-- color CSS -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">

    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Footable CSS -->
    <link href="../plugins/bower_components/footable/css/footable.core.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
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


                <br><br><br><br>
                <center><div style="font-size:20px;
                 font-weight: bold;
                  color: white"><?php if ($_SESSION['role'] == 'admin') {
                             echo 'Logged in as <p style="color: red;">Admin</p>';

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


                <!-- .row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Add & Remove Rows</h3>
                            <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle" data-page-size="7">
                                <thead>
                                    <tr>
                                        <th data-sort-initial="true" data-toggle="true">Username</th>
                                        <th>Password</th>
                                        <th data-hide="phone, tablet">Name</th>
                                        <th data-hide="phone, tablet">Technician ID</th>
                                        <th data-hide="phone, tablet">Status</th>
                                        <th data-sort-ignore="true" class="min-width">Delete</th>
                                    </tr>
                                </thead>
                                <div class="form-inline padding-bottom-15">
                                    <div class="col-sm-6">
                                        <button id="register-btn" class="btn btn-outline btn-primary btn-sm" onclick="window.location.href = 'register-form.php';">
                                            Add New Row
                                        </button>

                                        <small>New row will be added in last page.</small>
                                    </div>
                                    <div class="col-sm-6 text-right m-b-20">
                                        <input id="demo-input-search2" type="text" placeholder="Search" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                <tbody>
                                    <?php
                                    $servername = "localhost";
                                    $username = "root";
                                    $password = "";
                                    $dbname = "lab_management";

                                    // Create connection
                                    $conn = new mysqli($servername, $username, $password, $dbname);

                                    // Check connection
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }

                                    $sql = "SELECT * FROM users";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // Output data of each row
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row["username"] . "</td>";
                                            echo "<td>" . $row["password"] . "</td>";
                                            echo "<td>" . $row["name"] . "</td>";
                                            echo "<td>" . $row["technician_id"] . "</td>";
                                            echo "<td>";
                                            if ($row["status"] == "online") {
                                                echo "Active";
                                            } else {
                                                echo "Inactive";
                                            }
                                            echo "</td>";
                                            echo "<td><a href='delete-user.php?id=" . $row["id"] . "'>Delete</a></td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='6'>No records found.</td></tr>";
                                    }

                                    $conn->close();
                                    ?>

                                </tbody>
                            </table>

                            <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <div class="text-right">
                                            <ul class="pagination">
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <script>
                    const registerBtn = document.getElementById("register-btn");
                    const registerModal = document.getElementById("register-modal");
                    const closeBtn = document.querySelector(".close");

                    registerBtn.addEventListener("click", () => {
                        registerModal.toggleAttribute("hidden");
                    });

                    closeBtn.addEventListener("click", () => {
                        registerModal.toggleAttribute("hidden");
                    });
                </script>

            </main>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="/Pixel Admin 2/wrappixel.com/demos/admin-templates/pixeladmin/inverse/dist/js/spur.js"></script>
    <!-- Footable -->
    <script src="../plugins/bower_components/footable/js/footable.all.min.js"></script>
    <script src="../plugins/bower_components/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <!--FooTable init-->
    <script src="js/footable-init.js"></script>







</body>

</html>