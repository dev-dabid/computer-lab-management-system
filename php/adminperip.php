<!doctype html>
<html lang="en">

<head>

<?php
error_reporting(0);

session_start();

if (isset($_SESSION['username']) && isset($_SESSION['user_id'])) {
} else {
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

            <main class="dash-content">

                <style>
                    .peripheral-card {
                        border-radius: 10px;
                        box-shadow: 5px 4px 20px rgba(0, 0, 0, 0.1);
                        padding: 20px;
                        margin-top: 30px;
                        margin-bottom: 20px;
                        display: flex;
                        align-items: center;
                        background-color: #ffffff;
                        max-width: 500px;
                    }

                    .peripheral-card h3 {
                        font-size: 24px;
                        margin-top: 0;
                        margin-bottom: 10px;
                        color: #333333;
                    }

                    .peripheral-card p {
                        font-size: 16px;
                        margin: 0;
                        margin-left: 50px;
                        color: #666666;
                    }

                    .peripheral-card img {
                        max-width: 100px;
                        max-height: 100px;
                        object-fit: contain;
                    }

                    .h3peri {
                        margin-left: 50px;
                    }

                    .formi form {
                        border: 1px solid #ccc;
                        padding: 20px;
                        margin-bottom: 20px;
                    }

                    .formi label {
                        display: block;
                        margin-bottom: 10px;
                    }

                    .formi input[type="text"],
                    .formi textarea {
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

                    .peripherals-container {
                        display: flex;
                        flex-direction: row;
                        padding-top: 20px;
                        display: flex;
                        flex-wrap: wrap;
                        gap: 20px;
                        margin-top: 20px;
                        border: 1px solid #ccc;
                        padding: 20px;
                    }

                    .peripheral-card {
                        position: relative;
                    }

                    .peripheral-card button[name="delete"] {
                        position: absolute;
                        top: -10px;
                        right: -10px;
                        width: 30px;
                        height: 30px;
                        border: none;
                        border-radius: 50%;
                        background-color: red;
                        color: white;
                        font-size: 18px;
                        font-weight: bold;
                        cursor: pointer;
                    }

                    .peripheral-card button[name="delete"]:hover {
                        background-color: darkred;
                    }
                </style>

                <button alt="default" data-toggle="modal" data-target="#responsive-modal">Add new peripheral</button>
                <?php
                require 'delete-peripheral.php';
            
                $labId = $_GET['lab_id'];
                $computerId = $_GET['computer_id'];

          
                $stmt = $pdo->prepare("SELECT * FROM peripherals WHERE computer_id = ?");
                $stmt->execute([$computerId]);
                $peripherals = $stmt->fetchAll();
                ?>

                <?php if (count($peripherals) > 0) : ?>
                    <h3>Peripherals in this computer:</h3>
                    <div class="peripherals-container">
                        <?php foreach ($peripherals as $peripheral) : ?>
                            <div class="peripheral-card">
                                <?php if ($peripheral['logo']) : ?>
                                    <img src="uploads/<?= $peripheral['logo'] ?>" alt="Peripheral logo">
                                <?php endif; ?>
                                <div>
                                    <h3 class="h3peri"><?= $peripheral['peripheral_type'] ?></h3>
                                    <p><strong>Brand:</strong> <?= $peripheral['brand'] ?></p>
                                    <p><strong>Model:</strong> <?= $peripheral['model'] ?></p>
                                    <p><strong>Serial Number:</strong> <?= $peripheral['serial_number'] ?></p>
                                    <form method="POST" action="delete-peripheral.php">
                                        <input type="hidden" name="lab_id" value="<?= $labId ?>">
                                        <input type="hidden" name="computer_id" value="<?= $computerId ?>">
                                        <input type="hidden" name="peripheral_id" value="<?= $peripheral['id'] ?>">
                                        <button type="submit" name="delete" value="Delete">x</button>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else : ?>
                    <p>No peripherals found in this computer.</p>
                <?php endif; ?>


                <!-- /.row -->
                <!-- .row -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="white-box">

                            <!-- sample modal content -->
                            <!-- /.modal -->
                            <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <?php
                                            require 'add-peripheral.php';
                                    
                                            $selectedLabel = '';
                                            foreach ($computers as $computer) {
                                                if ($computer['id'] == $computerId) {
                                                    $selectedLabel = $computer['label'];
                                                    break;
                                                }
                                            }
                                            ?>
                                            <h4><?php echo $selectedLabel; ?></h4>


                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">

                                            <?php require 'admin-add-peripheral.php'; ?>

                                            <form method="POST" enctype="multipart/form-data">
                                                <input type="hidden" name="lab_id" value="<?php echo $labId; ?>">
                                                <input type="hidden" name="computer-id" value="<?php echo $computerId; ?>">
                                                <div class="form-group">
                                                    <label for="peripheral-type">Peripheral Type</label>
                                                    <input type="text" class="form-control" id="peripheral-type" name="peripheral-type" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="brand">Brand</label>
                                                    <input type="text" class="form-control" id="brand" name="brand" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="model">Model</label>
                                                    <input type="text" class="form-control" id="model" name="model" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="serial-number">Serial Number</label>
                                                    <input type="text" class="form-control" id="serial-number" name="serial-number" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="logo">Logo</label>
                                                    <input type="file" class="form-control-file" id="logo" name="logo">
                                                </div>
                                                <button type="submit" class="btn btn-primary" name="add-peripheral-btn">Add Peripheral</button>
                                            </form>


                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                       
                        const closeBtn = document.getElementById('cancel-btn');

                 
                        closeBtn.addEventListener('click', function() {
                      
                            const inputElements = document.querySelectorAll('form input, form textarea');

                      
                            for (let i = 0; i < inputElements.length; i++) {
                                inputElements[i].value = '';
                            }
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