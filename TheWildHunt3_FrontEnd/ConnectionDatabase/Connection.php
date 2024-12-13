<?php
$config = include 'Config.php';

$conn = new mysqli(
    $config['host'], 
    $config['username'], 
    $config['password'], 
    $config['database']
);

if ($conn->connect_error) {
    error_log("Database connection failed: " . $conn->connect_error);
    die("Database connection failed!");
} else {
    echo "Successfully connected to database";
}


?>
