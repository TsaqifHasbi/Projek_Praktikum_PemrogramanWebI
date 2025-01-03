<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        echo json_encode(['status' => 'error', 'message' => 'Password tidak cocok']);
        exit();
    }

    $_SESSION['signup_data'] = [
        'name' => $name,
        'username' => $username,
        'password' => $password
    ];

    echo json_encode(['status' => 'success', 'redirect' => 'ChooseRegion.php']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - The Witcher</title>
    <link rel="stylesheet" href="Sign-up.css">
    <link rel="shotcut icon" href="assets/Sign Up/Logo.svg">
</head>
<body>
    <div class="background">
        <img src="assets/Sign Up/Background.png" alt="The Witcher Background" class="bg-image">
    </div>
    <div class="form-container">
        <div class="form-content">
            <img class="logo" src="assets/Sign Up/Logo.svg" alt="The Witcher Logo">
            <form id="signupForm" method="POST" action="Sign-up.php">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Name" required>

                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Username" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password" required>

                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirm Password" required>

                <button type="submit" class="btn">Sign Up</button>
            </form>
            <a href="Sign-in.php" class="td"><p class="footer-text">ARE YOU A WITCHER?</p></a>
        </div>
    </div>

    <!-- Popup Confirmation -->
    <div id="popup" class="popup hidden">
        <div class="popup-content">
            <h2>Sign Up Successful!</h2>
            <p>The time has come, Witcher. Choose your region and step into a world of beasts, sorcery, and untold dangers!</p>
            <button class="btn" id="closePopup">Close</button>
        </div>
    </div>

    <!-- Popup Validasi Password Tidak Sesuai -->
    <div id="validationPopup" class="popup hidden">
        <div class="popup-content">
            <h2>Oops!</h2>
            <p>Not Every Contract Is Fulfilled. Your Passwords Don't Match!</p>
            <button class="btn" id="closeValidationPopup">Close</button>
        </div>
    </div>

    <script src="Sign-up.js"></script>
</body>
</html>
