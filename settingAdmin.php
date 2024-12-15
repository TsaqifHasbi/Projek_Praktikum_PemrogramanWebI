<?php
session_start();


$allowed_users = ['AdminDeef', 'AdminPaun', 'AdminQif'];
if (!isset($_SESSION['username']) || !in_array($_SESSION['username'], $allowed_users)) {
}

$$config = include 'TheWildHunt3_Backend/ConnectionDatabase/Config.php';
$conn = new mysqli($config['host'], $config['username'], $config['password'], $config['database']);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error = "";
$success = false;
$name = $current_username = $region = $current_password = "";


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username_to_edit'], $_POST['name_to_edit'], $_POST['password_to_edit'], $_POST['region_to_edit'])) {
    $current_username = $_POST['username_to_edit'];
    $name = $_POST['name_to_edit'];
    $current_password = $_POST['password_to_edit'];
    $region = $_POST['region_to_edit'];
}

// Proses update data setelah form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['current_username'])) {
    $new_name = !empty($_POST['name']) ? $conn->real_escape_string(trim($_POST['name'])) : $name;
    $new_username = !empty($_POST['username']) ? $conn->real_escape_string(trim($_POST['username'])) : $current_username;
    $input_password = !empty($_POST['password']) ? trim($_POST['password']) : $current_password;
    $new_region = !empty($_POST['region']) ? $conn->real_escape_string(trim($_POST['region'])) : $region;
    $current_username = $conn->real_escape_string(trim($_POST['current_username']));

    if (empty($new_name) || empty($new_username) || empty($input_password) || empty($new_region)) {
        $_SESSION['error'] = "All fields are required!";
    } else {
        // Proses update ke database
        $sql = "UPDATE login_witcher SET name = ?, username = ?, region = ?, password = ? WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $new_name, $new_username, $new_region, $input_password, $current_username);

        if ($stmt->execute()) {
            $success = true;
            error_log("Data updated successfully for user: $new_username"); 
            header("Location: userAdmin.php");
            exit();
        } else {
            $_SESSION['error'] = "Failed to update data. Please try again!";
            error_log("Failed to update data for user: $new_username - " . $stmt->error); // Tambahkan log ini
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
    <title>Settings - User Admin</title>
    <link rel="stylesheet" href="settingAdmin.css">
    <link rel="shortcut icon" href="assets/Sign Up/Logo.svg">
</head>
<body>
    <header>
        <div class="header-content">
            <a href="<?= htmlspecialchars(str_replace(' ', '', $_SESSION['region'])) ?>.php">
                <img src="assets/Sign In/Logo.svg" alt="The Witcher Logo" class="logo">
            </a>
            <button class="profile <?= strtolower(str_replace(' ', '-', htmlspecialchars($_SESSION['region']))) ?>">
                <img class="region" src="assets/Choose Region/<?= htmlspecialchars($_SESSION['region']) ?>.svg" alt="">
                <div class="welcome">
                    <p>Welcome,</p>
                    <p class="user"><?= htmlspecialchars($_SESSION['username']) ?></p>
                </div>
            </button>
        </div>
    </header>

    <div class="contain">
        <div class="container">
            <div class="header">
                <a href="settingAdmin.php"><h1 class="nav">Settings</h1></a>
                <a href="userAdmin.php"><h1 class="nav">User</h1></a>
            </div>
            <hr>
            <div class="content">
                <?php if (!empty($_SESSION['error'])): ?>
                    <div class="error-message"><?= htmlspecialchars($_SESSION['error']) ?></div>
                    <?php unset($_SESSION['error']); ?>
                <?php elseif ($success): ?>
                    <div class="success-message">User data updated successfully!</div>
                <?php endif; ?>
                <form method="POST">
                    <input type="hidden" name="current_username" value="<?= htmlspecialchars($current_username) ?>">
                    <table>
                        <tr class="form-group">
                            <td><label for="name">Name:</label></td>
                            <td><input type="text" id="name" name="name" value="<?= htmlspecialchars($name) ?>" placeholder="Name"></td>
                        </tr>

                        <tr class="form-group">
                            <td><label for="username">Username:</label></td>
                            <td><input type="text" id="username" name="username" value="<?= htmlspecialchars($current_username) ?>" placeholder="Username"></td>
                        </tr>

                        <tr class="form-group">
                            <td><label for="password">Password:</label></td>
                            <td><input type="password" id="password" name="password" value="<?= htmlspecialchars($current_password) ?>" placeholder="Password"></td>
                        </tr>

                        <tr class="form-group">
                            <td><label for="region">Region:</label></td>
                            <td><select id="region" name="region">
                                <option value="Vizima" <?= $region === 'Vizima' ? 'selected' : '' ?>>Vizima</option>
                                <option value="Velen" <?= $region === 'Velen' ? 'selected' : '' ?>>Velen</option>
                                <option value="Novigrad" <?= $region === 'Novigrad' ? 'selected' : '' ?>>Novigrad</option>
                                <option value="Skellige" <?= $region === 'Skellige' ? 'selected' : '' ?>>Skellige</option>
                                <option value="Kaer Morhen" <?= $region === 'Kaer Morhen' ? 'selected' : '' ?>>Kaer Morhen</option>
                            </select></td>
                        </tr>

                        <tr class="form-buttons">
                            <td></td>
                            <td>
                                <div class="button-container">
                                    <button type="submit" class="save">Edit User</button>
                                    <button type="button" class="save" onclick="window.location.href='LogOut.php';">Sign Out</button>
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
