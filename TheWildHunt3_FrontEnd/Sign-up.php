<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validasi apakah password dan confirm password sesuai
    if ($password !== $confirm_password) {
        echo "Password dan konfirmasi password tidak sesuai!";
        exit();
    }

    // Menyimpan data ke dalam session
    $_SESSION['signup_data'] = [
        'name' => $name,
        'username' => $username,
        'password' => $password
    ];

    // Redirect ke halaman Sign-up
    header('Location: ChooseRegion.php');
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
</head>
<body>
    <div class="background">
        <img src="../assets/Sign Up/Background.png" alt="The Witcher Background" class="bg-image">
    </div>
    <div class="form-container">
        <div class="form-content">
        <img class="logo" src="../assets/Sign Up/Logo.svg" alt="The Witcher Logo">
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
    
</body>
</html>
