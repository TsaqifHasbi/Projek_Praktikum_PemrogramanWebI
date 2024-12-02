<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - The Witcher</title>
    <link rel="stylesheet" href="Sign-in.css">
</head>
<body>
    <div class="background">
        <img src="../assets/Sign Up/Background.png" alt="The Witcher Background" class="bg-image">
    </div>
    <div class="form-container">
        <div class="form-content">
        <img class="logo" src="../assets/Sign In/Logo.svg" alt="">
        <form id="signinForm">

            <label for="username">Username</label>
            <input type="text" id="username" placeholder="Username" required>

            <label for="password">Password</label>
            <input type="password" id="password" placeholder="Password" required>

            <button type="submit" class="btn">Sign In</button>
        </form>
        <p class="footer-text">BE A WITCHER?</p>
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

    <script src="Sign-in.js"></script>
</body>
</html>
