<?php
// File: SignUp.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);
    $confirmPassword = $conn->real_escape_string($_POST['confirm_password']);

    if ($password !== $confirmPassword) {
        $error = "Passwords do not match!";
    } else {
        $_SESSION['temp_user'] = [
            'name' => $name,
            'username' => $username,
            'password' => $password
        ];
        header("Location: select_region.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
</head>
<body>
    <form method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
        <br>
        <button type="submit">Sign Up</button>
    </form>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
</body>
</html>

<?php
// File: select_region.php
if (!isset($_SESSION['temp_user'])) {
    header("Location: SignUp.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $region = $conn->real_escape_string($_POST['region']);
    $tempUser = $_SESSION['temp_user'];

    $stmt = $conn->prepare("INSERT INTO login_witcher (name, username, password, region) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $tempUser['name'], $tempUser['username'], $tempUser['password'], $region);

    if ($stmt->execute()) {
        unset($_SESSION['temp_user']);
        header("Location: success.php"); // Redirect to a success page
        exit();
    } else {
        $error = "Failed to register. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Select Region</title>
</head>
<body>
    <form method="POST">
        <label for="region">Select Region:</label>
        <select id="region" name="region" required>
            <option value="">-- Select --</option>
            <option value="North">North</option>
            <option value="South">South</option>
            <option value="East">East</option>
            <option value="West">West</option>
        </select>
        <br>
        <button type="submit">Submit</button>
    </form>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
</body>
</html>
