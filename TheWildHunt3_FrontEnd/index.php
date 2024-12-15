<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Witcher Wild Hunt</title>
    <link rel="stylesheet" href="index.css">
    <link rel="shotcut icon" href="../assets/Sign Up/Logo.svg">
</head>
<body>
    <div class="container">
        <div class="background">
            <img src="../assets/First_Page/Background.png" alt="Background" class="bg-image">
        </div>
        <div class="content">
            <img class="logo" src="../assets/First_Page/Logo.svg" alt="">
            <p class="subtitle">ONE OF THE MOST ACCLAIMED RPG OF ALL TIME</p>
            <div class="buttons">
                <form id="signupForm" action="Sign-up.php" method="POST">
                    <input type="hidden" name="action" value="sign-up">
                    <button type="submit" class="btn" id="signupBtn">Sign Up</button>
                </form>
                <form id="signinForm" action="Sign-in.php" method="POST">
                    <input type="hidden" name="action" value="sign-in">
                    <button type="submit" class="btn" id="signinBtn">Sign In</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Popup Loading -->
    <div id="loadingPopup" class="loading-popup">
        <div class="popup-content">
            <p>Loading...</p>
            <div class="spinner"></div>
        </div>
    </div>

    <script src="index.js"></script>
</body>
</html>
