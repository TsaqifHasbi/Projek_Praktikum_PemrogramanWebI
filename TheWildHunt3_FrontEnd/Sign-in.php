<?php
session_start(); // Mulai sesi

// Koneksi ke database
$config = include 'ConnectionDatabase/Config.php';
$conn = new mysqli(
    $config['host'],
    $config['username'],
    $config['password'],
    $config['database']
);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    // Query untuk mendapatkan user berdasarkan username dan password
    $stmt = $conn->prepare("SELECT region FROM login_witcher WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $region = $row['region']; // Ambil region dari hasil query

        // Simpan username di session
        $_SESSION['username'] = $username;

        // Redirect berdasarkan region
        switch ($region) {
            case 'Vizima':
                header("Location: Vizima.php");
                break;
            case 'Velen':
                header("Location: Velen.php");
                break;
            case 'Novigrad':
                header("Location: Novigrad.php");
                break;
            case 'Skellige':
                header("Location: Skellige.php");
                break;
            case 'Kaer Morhen':
                header("Location: KaerMorhen.php");
                break;
            default:
                // Jika region tidak sesuai, arahkan ke halaman default
                header("Location: DefaultRegion.php");
                break;
        }
        exit();
    } else {
        // Jika login gagal
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - The Witcher</title>
    <link rel="stylesheet" href="Sign-in.css">
</head>
<body>
    <div class="background">
        <img src="../assets/Sign Up/Background.png" alt="The Witcher Background" class="bg-image">
    </div>
    <div class="form-container">
        <div class="form-content">
        <img class="logo" src="../assets/Sign In/Logo.svg" alt="">
        <form id="signinForm" method="POST">

            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Username" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Password" required>

            <button type="submit" class="btn">Sign In</button>
        </form>
        <a href="Sign-up.php"><p class="footer-text">BE A WITCHER?</p></a>
        </div>
    </div>

    <!-- Popup Confirmation -->
    <div id="popup" class="popup hidden">
        <div class="popup-content">
        <h2>Sign In Successful!</h2>
        <p>Welcome to The Witcher Universe!</p>
        <button class="btn" id="closePopup">Close</button>
        </div>
    </div>

    <script src="Sign-in.js"></script>
</body>
</html>
