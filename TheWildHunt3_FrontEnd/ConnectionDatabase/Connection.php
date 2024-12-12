<?php
// File: connection.php
$config = include 'Config.php';

// Create connection
$conn = new mysqli(
    $config['host'], 
    $config['username'], 
    $config['password'], 
    $config['database']
);

// Check connection
if ($conn->connect_error) {
    error_log("Database connection failed: " . $conn->connect_error);
    die("Database connection failed!");
} else {
    // If connection successful
    echo "Successfully connected to database";
}


?>
