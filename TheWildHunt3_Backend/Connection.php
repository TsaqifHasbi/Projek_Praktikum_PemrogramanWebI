<?php
// Konfigurasi database
$host = 'localhost'; 
$username = 'root'; 
$password = ''; 
$database = 'thewitcher3_wildhunt'; 

// Connection To Database
$conn = new mysqli($host, $username, $password, $database);

// Check Connection
if ($conn->connect_error) {
    die("Failed to connect database!: " . $conn->connect_error);
} else {
    echo "Successfully connected to database";
}
?>
