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
        <img class="logo" src="../assets/Sign Up/Logo.svg" alt="">
        <form id="signupForm">
            <label for="name">Name</label>
            <input type="text" id="name" placeholder="Name" required>

            <label for="username">Username</label>
            <input type="text" id="username" placeholder="Username" required>

            <label for="password">Password</label>
            <input type="password" id="password" placeholder="Password" required>

            <label for="confirm-password">Confirm Password</label>
            <input type="password" id="confirm-password" placeholder="Confirm Password" required>

            <button type="submit" class="btn">Sign Up</button>
        </form>
        <a href="Sign-in.php" class="td"><p class="footer-text">ARE YOU A WITCHER?</p></a>
        </div>
    </div>

    <!-- Popup Confirmation -->
    <div id="popup" class="popup hidden">
        <div class="popup-content">
        <h2>Sign Up Successful!</h2>
        <p>Welcome to The Witcher Universe!</p>
        <button class="btn" id="closePopup">Close</button>
        </div>
    </div>

    <script src="Sign-up.js"></script>
</body>
</html>
