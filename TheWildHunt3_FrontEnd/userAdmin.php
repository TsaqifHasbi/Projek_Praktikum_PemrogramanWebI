<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Settings - User Admin</title>
        <link rel="stylesheet" href="userAdmin.css">
        <link rel="shotcut icon" href="../assets/Sign Up/Logo.svg">
    </head>
    <body>
        <header>
            <div class="header-content">
                <img src="../assets/Sign In/Logo.svg" alt="The Witcher Logo" class="logo">
                <button class="profile">
                    <img class="region" src="../assets/Choose Region/Vizima.svg" alt="">
                    <div class="welcome">
                        <p>Welcome,</p> 
                        <p class="user">John Doe</p>
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
                <!-- User Form -->
                <div class="content">
                    <table>
                        <tr class="th">
                            <td class="small-col">No.</td>
                            <td>Name</td>
                            <td>Username</td>
                            <td>Password</td>
                            <td>Region</td>
                            <td>Action</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>