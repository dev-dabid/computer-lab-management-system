<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
</head>
<body>
<style>
  /* The Modal (background) */
  .modal {
  max-width: 500px;
  margin: auto;
  padding: 20px;
  border-radius: 5px;
  background-color: #f2f2f2;
}

input[type="text"], input[type="password"] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
}


  /* Close Button */
  .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }

  /* Textboxes */
  .textbox {
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }
</style>



<div id="register-modal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="window.location.href = 'staff.php';">&times;</span>
    <h1>Add Staff</h1>
    <form method="POST" action="register.php">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required><br><br>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required><br><br>

      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required><br><br>

      <label for="technician_id">Technician ID:</label>
      <input type="text" id="technician_id" name="technician_id" required><br><br>

      <input type="submit" value="Register">
    </form>
  </div>
</div>


</body>
</html>
