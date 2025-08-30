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

    <link rel="stylesheet" href="/Pixel Admin 2/wrappixel.com/demos/admin-templates/pixeladmin/inverse/fontawesome-free-6.4.0-web/css/all.min.css">
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


            <?php require_once 'addcomputer.php' ?>

            <div class="computer-style">
                <style>
                    /* Style for the form */
                    .formcomp form {
                        border: 1px solid #ccc;
                        padding: 20px;
                        margin-bottom: 20px;
                    }

                    .formcomp label {
                        display: block;
                        margin-bottom: 10px;
                    }

                    .formcomp input[type="text"],
                    .formcomp textarea {
                        width: 100%;
                        padding: 10px;
                        margin-bottom: 20px;
                        border: 1px solid #ccc;
                        border-radius: 4px;
                        box-sizing: border-box;
                    }

                    form input[type="file"] {
                        margin-bottom: 20px;
                    }

                    .my-form-container form button {
                        background-color: #4CAF50;
                        color: white;
                        padding: 10px 20px;
                        border: none;
                        border-radius: 4px;
                        cursor: pointer;
                    }

                    .my-form-container form button:hover {
                        background-color: #45a049;
                    }

                    .computer-style .computers-container {
                        display: flex;
                        flex-wrap: wrap;
                        flex-direction: row;
                        justify-content: center;
                        gap: 30px;
                        padding: 20px;
                        border: 1px solid #ccc;
                        border-radius: 10px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
                    }

                    .computer-style .computer-card {
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                        justify-content: center;
                        width: 250px;
                        height: 300px;
                        padding: 20px;
                        background-color: #f2f2f2;
                        border-radius: 10px;
                        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
                        text-align: center;
                    }

                    .computer-style .computer-card img {
                        max-width: 80%;
                        max-height: 50%;
                        margin-bottom: 20px;
                    }

                    .computer-style .computer-card h3 {
                        margin-bottom: 10px;
                    }

                    .computer-style .computer-card p {
                        font-size: 14px;
                        line-height: 1.5;
                        margin-bottom: 20px;
                    }

                    .computer-style .computer-card-actions {
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                        width: 100%;
                        padding: 5px 10px;
                        background-color: #f2f2f2;
                        border-top-left-radius: 10px;
                        border-top-right-radius: 10px;
                    }

                    .computer-style .computer-card-actions button {
                        background-color: transparent;
                        border: none;
                        cursor: pointer;
                        font-size: 18px;
                        outline: none;
                    }

                    .computer-style .computer-card-actions button:hover {
                        transform: scale(1.1);
                    }

                    .add-button {
                        top: 20px;
                        width: 50px;
                        height: 50px;
                        background-color: #3498db;
                        border: none;
                        border-radius: 50%;
                        color: white;
                        font-size: 25px;
                        cursor: pointer;

                    }

                    .add-button i {
                        margin-top: 3px;
                    }

                    .delete-button {
                        top: 20px;
                        width: 50px;
                        height: 50px;
                        background-color: #FF5733;
                        border: none;
                        border-radius: 50%;
                        color: white;
                        font-size: 25px;
                        cursor: pointer;
                    }

                    .delete-button i {
                        margin-top: 3px;
                    }
                </style>

                <!-- HTML code for add computer form and computers container -->
            </div>

            <?php require_once 'labdata.php' ?>

            <main class="dash-content">
                <h2>Computers in this lab:</h2>
                <div class="computer-style">
                    <button class="add-button" data-toggle="modal" data-target="#responsive-modal"><i class="fa-solid fa-circle-plus"></i></button>
                    <button class="delete-button"><i class="fas fa-minus-circle"></i></button>

                    <div class="computers-container">


                        <?php
                        // ...
                        // existing code for adding a new computer goes here
                        // ...

                        // Code for displaying all computers in the lab
                        // code for displaying all computers in the lab
                        $sql = "SELECT * FROM computers WHERE laboratory_id = $labId";
                        $result = mysqli_query($conn, $sql);
                        
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<a href='adminperip.php?computer_id=" . $row["id"] . "&lab_id=" . $labId . "'>";
                                echo "<div class='computer-card'>";
                                if ($row["logo"]) {
                                    echo "<img src='uploads/" . $row["logo"] . "'>";
                                }
                                echo "<h3>" . $row["label"] . "</h3>";
                                echo "<p>" . $row["description"] . "</p>";
                                echo "<p>Serial number: " . $row["serial_number"] . "</p>";
                                echo "<form method='POST' action='admin-delete-computer.php'>";
                                echo "<input type='hidden' name='computer_id' value='" . $row["id"] . "'>";
                                echo "<button type='submit' name='delete_computer'>Delete</button>";
                                echo "</form>";
                                echo "</div>";
                                echo "</a>";
                            }
                        } else {
                            echo "<p>No computers found in this lab.</p>";
                        }
                        ?>
                        


                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="white-box">

                            <!-- sample modal content -->
                            <!-- /.modal -->
                            <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">My Computer</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                                        </div>
                                        <div class="modal-body">
                                            <form class="formcomp" action="admincom.php?lab_id=<?php echo $labId; ?>" method="post" enctype="multipart/form-data">
                                                <h2>Create a new laboratory</h2>
                                                <input type="hidden" name="lab_id" value="<?php echo $labId; ?>">

                                                <label for="label">Computer label</label>
                                                <input type="text" id="label" name="label" required>

                                                <label for="description">Description</label>
                                                <textarea id="description" name="description" required></textarea>

                                                <label for="serial_number">Serial number</label>
                                                <input type="text" id="serial_number" name="serial_number" required>

                                                <label for="logo">Logo</label>
                                                <input type="file" id="logo" name="logo">

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-danger waves-effect waves-light" name="add_computer">Add computer</button>
                                                </div>
                                            </form>



                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script>
                        $(document).ready(function() {
                            // Listen for clicks on delete buttons
                            $('.delete-btn').on('click', function() {
                                // Get the computer id from the data attribute
                                var computerId = $(this).data('computer-id');

                                // Send an AJAX request to delete the computer
                                $.ajax({
                                    type: 'POST',
                                    url: 'admin-delete-computer.php',
                                    data: {
                                        computer_id: computerId
                                    },
                                    success: function(response) {
                                        alert(response);
                                        // Reload the page to update the computer list
                                        location.reload();
                                    },
                                    error: function() {
                                        alert('Error deleting computer');
                                    }
                                });
                            });
                        });
                    </script>

                    <script>
                        // Add event listener to all delete buttons
                        const deleteButtons = document.querySelectorAll('.delete-button');
                        deleteButtons.forEach(button => {
                            button.addEventListener('click', event => {
                                const computerId = event.target.dataset.computerId;
                                const confirmDelete = event.target.parentNode.querySelector('.confirm-delete');
                                const confirmButton = confirmDelete.querySelector('.confirm-button');
                                const cancelButton = confirmDelete.querySelector('.cancel-button');

                                // Hide delete button and show confirm delete message
                                event.target.style.display = 'none';
                                confirmDelete.style.display = 'block';

                                // Add event listener to confirm button
                                confirmButton.addEventListener('click', () => {
                                    window.location.href = `delete-computer.php?computer_id=${computerId}`;
                                });

                                // Add event listener to cancel button
                                cancelButton.addEventListener('click', () => {
                                    // Show delete button and hide confirm delete message
                                    event.target.style.display = 'inline-block';
                                    confirmDelete.style.display = 'none';
                                });
                            });
                        });
                    </script>


                    <script>
                        const addComputerBtn = document.getElementById("add-computer-btn");
                        const addComputerForm = document.querySelector(".add-computer-form");
                        const cancelComputerBtn = document.getElementById("cancel-computer-btn");

                        addComputerBtn.addEventListener("click", () => {
                            addComputerForm.classList.remove("hidden");
                        });

                        cancelComputerBtn.addEventListener("click", () => {
                            addComputerForm.classList.add("hidden");
                        });
                    </script>

            </main>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="/Pixel Admin 2/wrappixel.com/demos/admin-templates/pixeladmin/inverse/dist/js/spur.js"></script>





</body>

</html>