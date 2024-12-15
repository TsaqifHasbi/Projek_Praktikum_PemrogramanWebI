<?php
session_start();

$config = include 'TheWildHunt3_Backend/ConnectionDatabase/Config.php';
$conn = new mysqli(
    $config['host'],
    $config['username'],
    $config['password'],
    $config['database']
);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

$error = ""; 
$success = false; 
$region = ""; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $conn->real_escape_string(trim($_POST['username']));
    $password = $conn->real_escape_string(trim($_POST['password']));

    if (empty($username) || empty($password)) {
        $error = "All fields are required!";
    } else {
        $stmt = $conn->prepare("SELECT region FROM login_witcher WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();

        // Menggunakan bind_result untuk memetakan hasil query ke variabel
        $stmt->bind_result($region);

        // Mengecek apakah ada hasil
        if ($stmt->fetch()) {
            $_SESSION['username'] = $username;
            $_SESSION['region'] = $region; 

            // Menandai login berhasil
            $success = true;
        } else {
            $error = "The Wild Hunt Has not Heard of You. Make sure your name and password are correct!";
        }
        $stmt->close();
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
<<<<<<< HEAD
    <link rel="shortcut icon" href="assets/Sign Up/Logo.svg">
=======
    <link rel="shotcut icon" href="assets/Sign In/Logo.svg">
>>>>>>> 56ed5ff404ae9ba4c06c97c3eee17f7a9c56a843
</head>
<body>
    <div class="background">
        <img src="assets/Sign In/Background.png" alt="The Witcher Background" class="bg-image">
    </div>
    <div class="form-container">
        <div class="form-content">
            <img class="logo" src="assets/Sign In/Logo.svg" alt="The Witcher Logo">
            <form id="signinForm" method="POST" action="Sign-in.php">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Username" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password" required>

                <button type="submit" class="btn">Sign In</button>
            </form>
            <a href="Sign-up.php"><p class="footer-text">BE A WITCHER?</p></a>
        </div>
    </div>

    <!-- Popup Error -->
    <div id="errorPopup" class="popup <?= empty($error) ? 'hidden' : 'visible' ?>">
        <div class="popup-content">
            <h2>Oops!</h2>
            <p><?= htmlspecialchars($error) ?></p>
            <button class="btn" id="closeErrorPopup">Close</button>
        </div>
    </div>

    <!-- Popup Success -->
    <div id="popup" class="popup <?= $success ? 'visible' : 'hidden' ?>">
        <div class="popup-content">
            <h2>Sign In Successful!</h2>
            <p>Welcome to The Witcher Universe!</p>
            <button class="btn" id="closePopup">Close</button>
        </div>
    </div>

    <script src="Sign-in.js"></script>
    <script>
        // Jika login berhasil, redirect setelah popup ditutup
        <?php if ($success): ?>
            document.getElementById('popup').classList.add('visible');
            document.getElementById('closePopup').onclick = function () {
                // Redirect berdasarkan region setelah popup ditutup
                let region = "<?php echo $region; ?>";
                switch (region) {
                    case 'Vizima':
                        window.location.href = 'Vizima.php';
                        break;
                    case 'Velen':
                        window.location.href = 'Velen.php';
                        break;
                    case 'Novigrad':
                        window.location.href = 'Novigrad.php';
                        break;
                    case 'Skellige':
                        window.location.href = 'Skellige.php';
                        break;
                    case 'Kaer Morhen':
                        window.location.href = 'KaerMorhen.php';
                        break;
                    default:
                        window.location.href = 'Sign-up.php';
                        break;
                }
            };
        <?php endif; ?>

        // Menutup error popup jika ada error
        <?php if (!empty($error)): ?>
            document.getElementById('errorPopup').classList.add('visible');
            document.getElementById('closeErrorPopup').onclick = function () {
                document.getElementById('errorPopup').classList.remove('visible');
            };
        <?php endif; ?>
    </script>
</body>
</html>
