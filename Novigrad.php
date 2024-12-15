<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: Sign-in.php");
    exit();
}

$username = $_SESSION['username'];

// Koneksi ke database
$config = include 'TheWildHunt3_Backend/ConnectionDatabase/Config.php';
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

// Ambil region pengguna menggunakan bind_result()
$sql = "SELECT region FROM login_witcher WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();

// Variabel untuk menyimpan hasil
$stmt->bind_result($region);

// Jika ada hasil, ambil region
if ($stmt->fetch()) {
    $region = htmlspecialchars($region);  // Menangani XSS
} else {
    $region = 'default_region'; // Nilai default jika region tidak ditemukan
}

$stmt->close();

// Daftar username admin
$adminUsers = ['AdminDeef', 'AdminPaun', 'AdminQif'];

// Tentukan apakah user adalah admin
$isAdmin = in_array($username, $adminUsers);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Witcher: Chapter II</title>
    <link rel="stylesheet" href="Novigrad.css">
    <link rel="shotcut icon" href="assets/Sign Up/Logo.svg">
</head>
<body>
    <header>
        <div class="header-content">
            <a href="Novigrad.php">
                <img src="assets/Prologue/Logo.svg" alt="The Witcher Logo" class="logo">
            </a>
            <button class="profile" onclick="window.location.href='<?= $isAdmin ? 'settingAdmin.php' : 'settingUser.php' ?>'">
            <img class="region" src="assets/Choose Region/<?= htmlspecialchars($region) ?>.svg" alt="">
                <div class="welcome">
                    <p>Welcome,</p> 
                    <p class="user"><?php echo htmlspecialchars($username); ?></p>
                </div>
            </button>
        </div>
    </header>

    <section id="quote-section">
        <div class="quote-sect">
            <img src="assets/Chapter2/Dandelion.svg" alt="Vesemir" class="icon">
            <div class="quote">
                <p class="qt">"Novigrad is a city of opportunities, my friend. If you don't mind risking your neck, that is."</p>
                <span class="qt-who">- Dandelion</span>
                <p class="quote-desc">This quote reflects Dandelion's perspective on Novigrad's complex and dangerous nature. As a free city, Novigrad is a melting pot of culture, trade, and power struggles, attracting all manner of people from wealthy merchants to outlaws.</p>
            </div>
        </div>
    </section>

    <section class="prologue">
        <h1 class="judul">Chapter II</h1> 
        <h3 class="subjudul">Novigrad</h3>
        <div class="content">
            <div class="img">
                <img src="assets/Chapter2/pic 0.svg" alt="Prologue Scene">
            </div>
            <div class="text">
                <p class="para1">In the city of Novigrad, the influence of the Church of the Eternal Fire grows, leading to the persecution of anyone deemed "other," such as non-humans, mages, and witchers. Geralt navigates this hostile environment while searching for clues about Ciri and his old friend, Triss Merigold, who is in hiding and struggling to make ends meet. After helping Triss out of a difficult situation, she directs Geralt to Corinne Tilly, a dream seer, who reveals that Ciri had been in contact with Dandelion.</p>
                <p class="para2">With the information from Corinne, Geralt enlists the help of old friends like Zoltan Chivay and Sigismund Dijkstra, now a crime boss in Novigrad's underworld. Their search leads Geralt across the city, with Triss playing a key role in locating Dandelion, who is being held under the Eternal Fire's main temple. The investigation uncovers a web of intrigue, setting the stage for a deeper dive into the dark secrets of Novigrad.</p>
            </div>
        </div>
    </section>
    <div class="compass-left"></div>
    <section class="events-section">
        <img class="dots3" src="assets/Chapter2/3 dot.svg">
        <div class="events">
            <div class="event">
                <h3>Dudu's Help and Dandelion's Release</h3>
                <p>To free Dandelion, Geralt enlists the help of his old friend, Dudu Biberveldt, a doppler. Dudu disguises himself as Caleb Menge, the commander of the temple guard, whom Triss killed after being tortured. With the aid of Zoltan, Geralt successfully frees Dandelion. However, Dandelion has little new information about Ciri, except that she was trying to decipher a curse using a phylactery. Dandelion reveals that Ciri had been in contact with Whoreson Junior, a notorious crime boss, and ran from his men after an encounter with witch hunters and Hierarch Hemmelfart. When Ciri teleported to escape, Dandelion was captured and imprisoned.</p>
            </div>
            <div class="event">
                <h3>Geralt's Tasks in Novigrad</h3>
                <p>In Novigrad, Geralt reunites with Vernon Roche, now fighting to free Temeria. Roche introduces him to King Radovid V, who asks Geralt to find Philippa Eilhart. Meanwhile, Geralt helps Triss Merigold smuggle mages out and can rekindle their romance before she leaves for Kovir. He also assists Dandelion in starting a cabaret business, but despite these efforts, the search for Ciri stalls.</p>
            </div>
            <div class="event">
                <h3>Ciri's Trail Leads to Skellige</h3>
                <p>Despite the distractions in Novigrad, Geralt's search for Ciri comes to a dead end. His investigation in Velen led him to Novigrad, and now in the city, the clues stop with Dandelion’s capture. With no more leads in Novigrad, Geralt concludes that the only remaining place to search for his lost daughter is the Isles of Skellige, the next destination in his quest.</p>
            </div>
        </div>
    </section>
    <div class="compass-right"></div>
    <section class="scene">
        <img class="line" src="assets/Chapter2/line.svg">
        <div class="gallery">
            <div class="card">
                <img src="assets/Chapter2/pic 1.svg" alt="Geralt of Rivia killed the griffin" />
                <p>Dandelion talking with Geralt of Rivian</p>
            </div>
            <div class="card">
                <img src="assets/Chapter2/pic 2.svg" alt="Yennefer manage to escape from the Wild Hunt" />
                <p>Vernon Roche and Geralt of Rivia</p>
            </div>
            <div class="card">
                <img src="assets/Chapter2/pic 3.svg" alt="First look of Ciri's teenage version" />
                <p>Ciri talking with Dudu</p>
            </div>
        </div>
        <img class="line-re" src="assets/Prologue/line.svg">
    </section>
    <section class="choices">
        <h2>Choose Phase</h2>
        <div class="choices-box">
            <div class="choice">
                <p class="left">“Kill him, Roche. I don't want any trouble”</p>
                <video controls>
                    <source src="assets/Chapter2/kill roche.mp4" type="video/webm" />
                    Browsermu tidak mendukung tag ini, upgrade donk!
                </video>
                <p class="left btm">If Geralt sides with Roche and chooses to kill Nilfgaardian soldiers, this can strengthen their bond, as Roche shares Geralt's hostility toward Nilfgaard. This decision is influenced by Roche's personal vendetta against Nilfgaardians, given the destruction of his homeland, Temeria.</p>
            </div>
            <div class="verti-line"></div>
            <div class="choice">
                <p class="right">“Hard to argue with that”</p>
                <video controls>
                    <source src="assets/Chapter2/hard to argue.mp4" type="video/webm" />
                    Browsermu tidak mendukung tag ini, upgrade donk!
                </video>
                <p class="right btm">Alternatively, Geralt can decide to show mercy and spare the Nilfgaardian soldiers. This decision often creates tension between Geralt and Roche, as it signals a more diplomatic or pragmatic stance that contrasts with Roche's more vengeful attitude.</p>
            </div>
        </div>
    </section>
    <footer>
        <p class="end">End of Chapter.</p>
        <a class="backtop" href="#quote-section">Back to Top</a> 
    </footer>
    <div class="bottom-background"></div>
    <script src="Novigrad.js"></script>
</body>
</html>
