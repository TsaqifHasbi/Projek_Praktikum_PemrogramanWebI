<?php
session_start();

$config = include 'ConnectionDatabase/Config.php';
$conn = new mysqli(
    $config['host'],
    $config['username'],
    $config['password'],
    $config['database']
);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error = "";
$success = false;

// Ambil data pengguna dari database
$username = $_SESSION['username'];
$query = $conn->prepare("SELECT name, username, region, password FROM login_witcher WHERE username = ?");
$query->bind_param("s", $username);
$query->execute();
$query->bind_result($name, $current_username, $region, $current_password);
$query->fetch();
$query->close();

// Ambil region yang tersedia dari database
$region_query = $conn->query("SELECT DISTINCT region FROM login_witcher");
$available_regions = [];
while ($row = $region_query->fetch_assoc()) {
    $available_regions[] = $row['region'];
}
$region_query->close();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_name = $conn->real_escape_string(trim($_POST['name']));
    $new_username = $conn->real_escape_string(trim($_POST['username']));
    $input_password = trim($_POST['password']); // Hapus spasi tambahan
    $new_region = $conn->real_escape_string(trim($_POST['region']));


    if (empty($new_name) || empty($new_username) || empty($input_password) || empty($new_region)) {
        $error = "All fields are required!";
    } else {
        // Verifikasi password secara langsung (tanpa hashing)
        if ($input_password !== $current_password) {
            $error = "Invalid password!"; // Validasi password gagal
        } else {
            // Jika password valid, lanjutkan dengan update data pengguna
            $sql = "UPDATE login_witcher SET name = ?, username = ?, region = ? WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $new_name, $new_username, $new_region, $current_username);

            if ($stmt->execute()) {
                $success = true;

                // Update session dan redirect
                $_SESSION['username'] = $new_username;
                echo "<script>alert('Data updated successfully!'); window.location.href = '".str_replace(" ", "", $new_region).".php';</script>";
                exit();
            } else {
                $error = "Failed to update data. Please try again!";
            }
            $stmt->close();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - User</title>
    <link rel="stylesheet" href="settingUser.css">
    <link rel="shortcut icon" href="../assets/Sign Up/Logo.svg">
</head>
<body>
    <header>
        <div class="header-content">
            <a href="<?= htmlspecialchars($_SESSION['region']) ?>.php">
                <img src="../assets/Sign In/Logo.svg" alt="The Witcher Logo" class="logo">
            </a>
            <button class="profile">
                <img class="region" src="../assets/Choose Region/<?= htmlspecialchars($region) ?>.svg" alt="">
                <div class="welcome">
                    <p>Welcome,</p> 
                    <p class="user"><?= htmlspecialchars($username) ?></p>
                </div>
            </button>
        </div>
    </header>
    <div class="contain">
        <div class="container">
            <div class="header">
                <a href="settingUser.php"><h1 class="nav">Settings</h1></a>
            </div>
            <hr>
            <div class="content">
                <?php if (!empty($error)): ?>
                    <div class="error-message"><?= htmlspecialchars($error) ?></div>
                <?php elseif ($success): ?>
                    <div class="success-message">User data updated successfully!</div>
                <?php endif; ?>
                <form method="POST">
                    <table>
                        <tr class="form-group">
                            <td><label for="name">Name:</label></td>
                            <td><input type="text" id="name" name="name" value="<?= htmlspecialchars($name) ?>" placeholder="Name"></td>
                        </tr>
                        <tr class="form-group">
                            <td><label for="username">Username:</label></td>
                            <td><input type="text" id="username" name="username" value="<?= htmlspecialchars($username) ?>" placeholder="Username"></td>
                        </tr>
                        <tr class="form-group">
                            <td><label for="password">Password:</label></td>
                            <td><input type="password" id="password" name="password" placeholder="Enter password"></td>
                        </tr>
                        <tr class="form-group">
                            <td><label for="region">Region:</label></td>
                            <td>
                                <select id="region" name="region">
                                    <?php foreach ($available_regions as $available_region): ?>
                                        <option value="<?= htmlspecialchars($available_region) ?>" <?= $region === $available_region ? "selected" : "" ?>>
                                            <?= htmlspecialchars($available_region) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr class="form-buttons">
                            <td></td>
                            <td><button type="submit" class="save">Save</button></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
