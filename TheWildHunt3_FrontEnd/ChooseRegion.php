<?php
session_start();

if (!isset($_SESSION['signup_data'])) {
    header('Location: Sign-up.php');
    exit();
}

$signup_data = $_SESSION['signup_data'];
$config = include 'ConnectionDatabase/Config.php';

if (!$config) {
    die("Gagal memuat konfigurasi database.");
}

$conn = new mysqli(
    $config['host'], 
    $config['username'], 
    $config['password'], 
    $config['database']
);

if ($conn->connect_error) {
    error_log("Database connection failed: " . $conn->connect_error);
    die("Koneksi ke database gagal!");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $region = $_POST['region'] ?? '';
    $valid_regions = ['Vizima', 'Velen', 'Novigrad', 'Skellige', 'Kaer Morhen'];

    if (!in_array($region, $valid_regions)) {
        echo "Region tidak valid!";
        exit();
    }

    $name = $signup_data['name'];
    $username = $signup_data['username'];
    $password = $signup_data['password'];

    $stmt = $conn->prepare("INSERT INTO login_witcher (name, username, password, region) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $username, $password, $region);

    if ($stmt->execute()) {
        unset($_SESSION['signup_data']);
        header('Location: Sign-in.php');
        exit();
    } else {
        echo "Terjadi kesalahan: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Region - The Witcher</title>
    <link rel="stylesheet" href="ChooseRegion.css">
    <link rel="shotcut icon" href="../assets/Sign Up/Logo.svg">
</head>
<body>
    <div class="background">
        <img src="../assets/Choose Region/Background.png" alt="The Witcher Background" class="bg-image">
    </div>
    <div class="region-container">
        <h1 class="region-title">WHERE ARE YOU FROM, <span>WITCHER?</span></h1>
        <form method="POST" id="regionForm">
            <div class="region-grid">
                <div class="region-card" onclick="selectRegion('Vizima',event)">
                    <img src="../assets/Choose Region/Vizima.svg" alt="Vizima">
                    <p>Vizima</p>
                </div>
                <div class="region-card" onclick="selectRegion('Velen',event)">
                    <img src="../assets/Choose Region/Velen.svg" alt="Velen">
                    <p>Velen</p>
                </div>
                <div class="region-card" onclick="selectRegion('Novigrad',event)">
                    <img src="../assets/Choose Region/Novigrad.svg" alt="Novigrad">
                    <p>Novigrad</p>
                </div>
                <div class="region-card" onclick="selectRegion('Skellige', event)">
                    <img src="../assets/Choose Region/Skellige.svg" alt="Skellige">
                    <p>Skellige</p>
                </div>
                <div class="region-card" onclick="selectRegion('Kaer Morhen', event)">
                    <img src="../assets/Choose Region/Kaer Morhen.svg" alt="Kaer Morhen">
                    <p>Kaer Morhen</p>
                </div>
            </div>
            <input type="hidden" name="region" id="selectedRegion" value="">
        </form>
        <p class="region-quote">"This world doesn't need a hero. It needs a professional."</p>
    </div>

    <script>
    function selectRegion(region, event) {
        document.getElementById('selectedRegion').value = region;
        const cards = document.querySelectorAll('.region-card');
        cards.forEach(card => card.classList.remove('selected'));
        event.currentTarget.classList.add('selected');
        document.getElementById('regionForm').submit();
    }

    </script>
</body>
</html>