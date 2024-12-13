<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Settings - User Admin</title>
        <link rel="stylesheet" href="settingUser.css">
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
                    <a href="settingUser.php"><h1 class="nav">Settings</h1></a>
                </div>
                <hr>
                <!-- User Form -->
                <div class="content">
                    <form>
                        <table>
                            <tr class="form-group">
                                <td><label for="name">Name:</label></td>
                                <td><input type="text" id="name" name="name" placeholder="Name"></td>
                            </tr>

                            <tr class="form-group">
                                <td><label for="username">Username:</label></td>
                                <td><input type="text" id="username" name="username" placeholder="Username"></td>
                            </tr>

                            <tr class="form-group">
                                <td><label for="password">Password:</label></td>
                                <td><input type="password" id="password" name="password" placeholder="Password"></td>
                            </tr>

                            <tr class="form-group">
                                <td><label for="region">Region:</label></td>
                                <td><select id="region" name="region">
                                    <option value="Vizima">Vizima</option>
                                    <option value="Velen">Velen</option>
                                    <option value="Novigrad">Novigrad</option>
                                    <option value="Skellige">Skellige</option>
                                    <option value="Kaer Morhen">Kaer Morhen</option>
                                </select></td>
                            </tr>

                            <tr class="form-buttons">
                                <td></td>
                                <td><button type="submit" class="save">Edit User</button></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>