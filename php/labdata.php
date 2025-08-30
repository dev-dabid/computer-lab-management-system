<?php

// Database credentials
$host = "localhost";
$username = "root";
$password = "";
$dbname = "lab_management";

// Connect to the database
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check for errors
if (mysqli_connect_errno()) {
    die("Failed to connect to the database: " . mysqli_connect_error());
}

// Create the database if it does not exist
if (!mysqli_select_db($conn, $dbname)) {
    $sql = "CREATE DATABASE $dbname";
    if (mysqli_query($conn, $sql)) {
        mysqli_select_db($conn, $dbname);
    } else {
        die("Failed to create the database: " . mysqli_error($conn));
    }
}

// Create the laboratories table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS laboratories (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        location VARCHAR(50) NOT NULL,
        description VARCHAR(255),
        logo VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
if (!mysqli_query($conn, $sql)) {
    die("Failed to create the laboratories table: " . mysqli_error($conn));
}

// Create the computers table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS computers (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        laboratory_id INT(6) UNSIGNED NOT NULL,
        status VARCHAR(20) NOT NULL DEFAULT 'available',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (laboratory_id) REFERENCES laboratories(id) ON DELETE CASCADE
    )";
if (!mysqli_query($conn, $sql)) {
    die("Failed to create the computers table: " . mysqli_error($conn));
}

// Create uploads directory if it does not exist
if (!file_exists('uploads')) {
    mkdir('uploads');
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get the form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $logo = $_FILES['logo'];

    // Check if a logo was uploaded
    if ($logo['error'] === UPLOAD_ERR_OK) {


        // Save the logo file to the server
        $logo_filename = basename($logo['name']);
        move_uploaded_file($logo['tmp_name'], 'uploads/' . $logo_filename);

        // Generate a unique database name for the new laboratory
        $db_name = 'laboratory_' . strtolower(str_replace(' ', '_', $name));

        // Create a new database for the laboratory
        $sql = "CREATE DATABASE $db_name";
        if (mysqli_query($conn, $sql)) {
            // Connect to the new database
            $db_conn = mysqli_connect($host, $username, $password, $db_name);
            if (!$db_conn) {
                die("Failed to connect to the database: " . mysqli_connect_error());
            }

            // Create a new table for the computers
            $sql = "CREATE TABLE IF NOT EXISTS computers (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        laboratory_id INT(6) UNSIGNED NOT NULL,
        status VARCHAR(20) NOT NULL DEFAULT 'available',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (laboratory_id) REFERENCES laboratories(id) ON DELETE CASCADE
    )";

            // Add the new laboratory to the database
            $sql = "INSERT INTO laboratories (name, location, description, logo, db_name) 
              VALUES ('$name', '$location', '$description', '$logo_filename', '$db_name')";
            if (mysqli_query($conn, $sql)) {
                echo "";
            } else {
                echo "Error: " . mysqli_error($conn);
            }


            // Close the connection to the new database
            mysqli_close($db_conn);
        } else {
            echo "Error creating database: " . mysqli_error($conn);
        }
    } else {
        echo "Error uploading logo: " . $logo['error'];
    }
}
