<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: Sign-in.php");
    exit();
}

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

// Ambil semua data pengguna dari database
$query = $conn->query("SELECT name, username, region, password FROM login_witcher");
$users = [];
while ($row = $query->fetch_assoc()) {
    $users[] = $row;
}
$query->close();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete_username'])) {
        $username_to_delete = $conn->real_escape_string($_POST['delete_username']);
        $delete_query = $conn->prepare("DELETE FROM login_witcher WHERE username = ?");
        $delete_query->bind_param("s", $username_to_delete);

        if ($delete_query->execute()) {
            $success = true;
            header("Location: userAdmin.php");
            exit();
        } else {
            $error = "Failed to delete user. Please try again!";
        }
        $delete_query->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management - Admin</title>
    <link rel="stylesheet" href="userAdmin.css">
    <link rel="shortcut icon" href="../assets/Sign Up/Logo.svg">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <header>
        <div class="header-content">
            <a href="<?= htmlspecialchars($_SESSION['region']) ?>.php">
                <img src="../assets/Sign In/Logo.svg" alt="The Witcher Logo" class="logo">
            </a>
            <button class="profile">
                <img class="region" src="../assets/Choose Region/<?= htmlspecialchars($_SESSION['region']) ?>.svg" alt="">
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
                <?php if (!empty($error)): ?>
                    <div class="error-message"><?= htmlspecialchars($error) ?></div>
                <?php elseif ($success): ?>
                    <div class="success-message">User deleted successfully!</div>
                <?php endif; ?>
                <div class="scroll">
                    <table class="user-table">
                        <thead>
                            <tr>
                                <th class="small-col">No</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Region</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach ($users as $user): ?>
                                <tr>
                                    <td class="small-col"><?= $no++ ?></td>
                                    <td><?= htmlspecialchars($user['name']) ?></td>
                                    <td><?= htmlspecialchars($user['username']) ?></td>
                                    <td><?= htmlspecialchars($user['password']) ?></td>
                                    <td><?= htmlspecialchars($user['region']) ?></td>
                                    <td>
                                        <form method="POST" action="settingAdmin.php" style="display:inline-block;">
                                            <input type="hidden" name="username_to_edit" value="<?= htmlspecialchars($user['username']) ?>">
                                            <input type="hidden" name="name_to_edit" value="<?= htmlspecialchars($user['name']) ?>">
                                            <input type="hidden" name="password_to_edit" value="<?= htmlspecialchars($user['password']) ?>">
                                            <input type="hidden" name="region_to_edit" value="<?= htmlspecialchars($user['region']) ?>">
                                            <button type="submit" class="btn"><i class='bx bxs-edit-alt'></i></button>
                                        </form>
                                        <form method="POST" class="button" style="display:inline-block;">
                                            <input type="hidden" class="btn" name="delete_username" value="<?= htmlspecialchars($user['username']) ?>"> | 
                                            <button type="submit" class="btn" onclick="return confirm('Are you sure you want to delete this user?');"><i class='bx bxs-trash' ></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
