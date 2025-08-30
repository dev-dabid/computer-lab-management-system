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

  <link href="css/animate.css" rel="stylesheet">



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

        <!DOCTYPE html>
        <html lang="en">

        <head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Document</title>



        </head>

        <body>

          <div class="my-form-container">
            <style>
              .my-form-container .hidden {
                display: none;
              }

              /* Style for the form */
              .my-form-container form {
                border: 1px solid #ccc;
                padding: 20px;
                margin-bottom: 20px;
              }

              .my-form-container form label {
                display: block;
                margin-bottom: 10px;
              }

              .my-form-container form input[type="text"],
              .my-form-container form textarea {
                width: 100%;
                padding: 10px;
                margin-bottom: 20px;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
              }

              .my-form-container form input[type="file"] {
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

              /* Style for the list of laboratories */
              .my-form-container .laboratories {
                display: flex;
                flex-direction: row;
                align-items: center;
                flex-wrap: wrap;


              }

              .my-form-container .laboratory {
                border: 1px solid #ccc;
                border-radius: 10px;
                padding: 10px;
                margin: 10px;
                width: 270px;
              }

              .my-form-container .laboratory img {
                width: 100%;
                height: 300px;
                object-fit: cover;
                max-height: 200px;
              }

              .my-form-container .laboratory h2 {
                margin-top: 0;
                font-size: 36px;
                font-weight: bold;
                color: #333;
                margin-bottom: 30px;
                text-shadow: 1px 1px 2px #ccc;
              }

              .my-form-container .laboratory p {
                margin-bottom: 0;
                font-size: 18px;
                color: #666;
                line-height: 1.5;
                text-shadow: 1px 1px 2px #ccc;
              }

              .my-form-container .laboratory p span {
                font-weight: bold;
                color: #007bff;
              }

              .lab-group {
                border: 1px solid #ccc;
                padding: 10px;
                padding-left: 60px;
                padding-right: 20px;
                position: relative;
              }

              .lab-group h2 {
                margin-top: 0;
                padding-left: 10px;
              }

              .add-button {
                top: 5px;
                right: 5px;
                font-size: 14px;
                padding: 5px 10px;
                background-color: #007bff;
                color: #fff;
                border: none;
                border-radius: 3px;
                cursor: pointer;
                transition: background-color 0.3s ease;
                /* add a transition to the background-color property */
              }

              .add-button:hover {
                background-color: #0066cc;
                /* change the background-color on hover */
              }

              .add-button:active {
                transform: scale(0.9);
                /* scale the button down when it's clicked */
                transition: transform 0.1s ease;
                /* add a transition to the transform property */
              }


              .delete-button {
                top: 5px;
                right: 5px;
                font-size: 14px;
                padding: 5px 10px;
                background-color: #DC143C;
                color: #fff;
                border: none;
                border-radius: 3px;
                cursor: pointer;
                transition: background-color 0.3s ease;
                /* add a transition to the background-color property */
              }

              .delete-button:hover {
                background-color: #b30021;
                /* change the background-color on hover */
              }

              .delete-button:active {
                transform: scale(0.9);
                /* scale the button down when it's clicked */
                transition: transform 0.1s ease;
                /* add a transition to the transform property */
              }



              .lab-list {
                margin-top: 10px;
              }


              .laboratory-container {
                position: relative;
              }

              .delete-lab-btn {
                position: absolute;
                top: 10px;
                right: 10px;
                background-color: red;
                color: white;
                padding: 5px;
                cursor: pointer;
              }

              .laboratory.highlight {
                background-color: yellow;
              }
            </style>


            <!-- Your HTML code for the form and list of laboratories goes here -->


          </div>





          <main>

            <div class="my-form-container">
              <h2>Computer Laboratories</h2>
              <button class="add-button" id="add-laboratory-btn" data-toggle="modal" data-target="#responsive-modal">Add laboratory</button>
              <button class="delete-button" id="toggle-delete-btns">Delete laboratory</button>

              <div class="lab-group">


                <div class="lab-list">
                  <div class="laboratories">

                    <?php require 'lab.show.php' ?>


                  </div>

                </div>
              </div>



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
                            <h4 class="modal-title">My Lab</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                          </div>
                          <div class="modal-body">
                            <form action="laboratories.php" method="post" enctype="multipart/form-data">
                              <h2>Create a new laboratory</h2>
                              <label for="name">Name</label>
                              <input type="text" id="name" name="name" required>

                              <label for="location">Location</label>
                              <input type="text" id="location" name="location" required>

                              <label for="description">Description</label>
                              <textarea id="description" name="description" required></textarea>

                              <label for="logo">Logo</label>
                              <input type="file" id="logo" name="logo" accept="image/*" required>

                              <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal" id="cancel-btn">Cancel</button>
                                <button type="submit" class="btn btn-danger waves-effect waves-light">Create Laboratory</button>
                              </div>


                            </form>



                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>

          </main>

          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
          <script>
            $(document).ready(function() {
              $('#toggle-delete-btns').click(function() {
                $('.delete-lab-btn').toggle();
                if ($(this).text() == 'Delete laboratory') {
                  $(this).text('Cancel delete');
                } else {
                  $(this).text('Delete laboratory');
                }
              });
            });
          </script>

          <script>
            // Get all the delete buttons and add a click handler to them
            const deleteButtons = document.querySelectorAll('.delete-lab-btn');
            deleteButtons.forEach((button) => {
              button.addEventListener('click', (event) => {
                // Highlight the laboratory
                const labContainer = event.target.parentElement;
                const labs = document.querySelectorAll('.laboratory');
                labs.forEach((lab) => {
                  lab.classList.remove('highlight');
                });
                labContainer.querySelector('.laboratory').classList.add('highlight');

                // Show the confirmation dialog
                const dialog = document.querySelector('#delete-lab-confirmation-dialog');
                dialog.style.display = 'block';

                // Save the laboratory ID in the confirmation dialog
                const labId = event.target.getAttribute('data-lab-id');
                dialog.setAttribute('data-lab-id', labId);
              });
            });

            // Add click handlers to the confirmation dialog buttons
            const yesButton = document.querySelector('#delete-lab-yes-btn');
            const noButton = document.querySelector('#delete-lab-no-btn');
            yesButton.addEventListener('click', () => {
              const dialog = document.querySelector('#delete-lab-confirmation-dialog');
              const labId = dialog.getAttribute('data-lab-id');
              const form = document.createElement('form');
              form.method = 'post';
              form.action = 'delete-laboratory.php';
              const input = document.createElement('input');
              input.type = 'hidden';
              input.name = 'delete_lab';
              input.value = 1;
              const input2 = document.createElement('input');
              input2.type = 'hidden';
              input2.name = 'lab_id';
              input2.value = labId;
              form.appendChild(input);
              form.appendChild(input2);
              document.body.appendChild(form);
              form.submit();
            });
            noButton.addEventListener('click', () => {
              const dialog = document.querySelector('#delete-lab-confirmation-dialog');
              dialog.style.display = 'none';
              const labs = document.querySelectorAll('.laboratory');
              labs.forEach((lab) => {
                lab.classList.remove('highlight');
              });
            });
          </script>

          <script>
            // Select the close button element by its ID
            const closeBtn = document.getElementById('cancel-btn');

            // Add a click event listener to the close button
            closeBtn.addEventListener('click', function() {
              // Select all the input and textarea elements in the form
              const inputElements = document.querySelectorAll('form input, form textarea');

              // Loop through all the input and textarea elements and clear their values
              for (let i = 0; i < inputElements.length; i++) {
                inputElements[i].value = '';
              }
            });
          </script>

          <script>
            const addLaboratoryForm = document.querySelector('.add-laboratory-form');
            const addLaboratoryBtn = document.querySelector('#add-laboratory-btn');
            const cancelBtn = document.querySelector('#cancel-btn');

            // Hide the add laboratory form initially
            addLaboratoryForm.classList.add('hidden');

            // Show the add laboratory form when the Add Laboratory button is clicked
            addLaboratoryBtn.addEventListener('click', () => {
              addLaboratoryForm.classList.remove('hidden');
            });

            // Hide the add laboratory form when the Cancel button is clicked
            cancelBtn.addEventListener('click', () => {
              addLaboratoryForm.classList.add('hidden');
            });
          </script>

          <script>
            // Select the form and the list of laboratories
            const form = document.querySelector('form');
            const laboratoriesList = document.querySelector('.laboratories');

            // Listen for form submission
            form.addEventListener('submit', event => {
              // Prevent the default form submission behavior
              event.preventDefault();
              console.log('Form submitted!');
              // Get the form data
              const name = form.elements.name.value;
              const location = form.elements.location.value;
              const description = form.elements.description.value;
              const logo = form.elements.logo.files[0];

              // Create a new laboratory object with the form data
              const laboratory = {
                name,
                location,
                description,
                logoUrl: URL.createObjectURL(logo)
              };

              // Add the new laboratory to the list
              addLaboratoryToList(laboratory);

              // Reset the form
              form.reset();
            });


            function addLaboratoryToList(laboratory) {
              // Create a new laboratory element
              const labElement = document.createElement('div');
              labElement.classList.add('laboratory');

              // Add the laboratory image
              const imgElement = document.createElement('img');
              imgElement.src = laboratory.logoUrl;
              imgElement.alt = `${laboratory.name} Logo`;
              labElement.appendChild(imgElement);

              // Add the laboratory name
              const nameElement = document.createElement('h2');
              nameElement.textContent = laboratory.name;
              labElement.appendChild(nameElement);

              // Add the laboratory location
              const locationElement = document.createElement('p');
              locationElement.textContent = `Location: ${laboratory.location}`;
              labElement.appendChild(locationElement);

              // Add the laboratory description
              const descriptionElement = document.createElement('p');
              descriptionElement.textContent = `Description: ${laboratory.description}`;
              labElement.appendChild(descriptionElement);

              // Add the laboratory element to the list
              laboratoriesList.appendChild(labElement);

              // Hide the add laboratory form
              addLaboratoryForm.classList.add('hidden');

              // Reset the form
              form.reset();
            }
          </script>



        </body>

        </html>

      </main>
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  <script src="/Pixel Admin 2/wrappixel.com/demos/admin-templates/pixeladmin/inverse/dist/js/spur.js"></script>





</body>

</html>