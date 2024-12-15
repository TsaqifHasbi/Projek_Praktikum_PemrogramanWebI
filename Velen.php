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
    <title>The Witcher: Chapter I</title>
    <link rel="stylesheet" href="Velen.css">
    <link rel="shotcut icon" href="assets/Sign Up/Logo.svg">
</head>
<body>
    <header>
        <div class="header-content">
            <a href="Velen.php">
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
            <img src="assets/Chapter1/The Bloody Baron.svg" alt="Velen" class="icon">
            <div class="quote">
                <p class="qt">"We all got to die someday. Sooner or later. Makes no difference when, but as long as it happens with dignity."</p>
                <span class="qt-who">- The Bloody Baron</span>
                <p class="quote-desc">This quote reflects his hardened perspective shaped by war and personal failures. It underscores his fatalistic yet honor-driven mindset as he seeks redemption for his past mistakes. This idea aligns with the Baron's role in Velen, the line also hints at the themes of mortality and accountability that run through his story, especially regarding his interactions with his family.</p>
            </div>
        </div>
    </section>
    <section class="prologue">
        <h1 class="judul">Chapter I</h1> 
        <h3 class="subjudul">Velen</h3>
        <div class="content">
            <img src="assets/Chapter1/pic 0.svg" alt="Prologue Scene">
            <div class="text">
                <p class="para1">Geralt travels to Velen, a war-torn land known as No Man's Land, in search of clues about Ciri's whereabouts. The region has been devastated by the ongoing conflict between the Nilfgaardian Empire and the Northern Kingdoms, leaving it desolate and dangerous. Acting on Emperor Emhyr's orders, Geralt tracks down his spy, Hendrik, who is stationed in the village of Heatherton.</p>
                <p class="para2">When Geralt arrives, he finds Heatherton in ruins, with signs of a supernatural attack that go beyond the destruction caused by war. Hendrik is discovered dead, but Geralt manages to uncover two important leads about Ciri from the spy's notes, setting him on the next steps of his journey. The events in Heatherton reveal the lurking presence of darker forces that threaten the already dire state of Velen.</p>
            </div>
        </div>
    </section>
    <div class="compass-left"></div>
    <section class="events-section">
        <img class="dots3" src="assets/Prologue/3 dot.svg">
        <div class="events">
            <div class="event">
                <h3>Clues from the Witch and the Elven Mage</h3>
                <p>Geralt learns from Hendrik's notes that Ciri quarreled with a "witch." Velen's superstitious locals offer little clarity, as witches could range from simple healers to powerful sorceresses. Geralt's search initially leads him to Keira Metz, an old friend and sorceress living in Midcopse. She claims to have encountered an elven mage who might have aided Ciri. Together, they investigate the mage's underground lair, but the Wild Hunt reaches it first. Despite a fierce struggle, the pair uncovers no definitive information about Ciri.</p>
            </div>
            <div class="event">
                <h3>The Crones of Crookback Bog</h3>
                <p>Keira suggests Geralt investigate Crookback Bog, home to the enigmatic Crones, who might be the witches Ciri encountered. Geralt ventures into the bog and meets the sinister trio, discovering connections between their schemes and the Bloody Baron's search for his family. The investigation reveals an epic conflict between the Crones and a trapped spirit whose fate could decide the lives of many in Velen.</p>
            </div>
            <div class="event">
                <h3>A New Lead in Novigrad</h3>
                <p>The Baron shares what he learned from Ciri during her time at his estate: she was being hunted by the Wild Hunt and planned to ride to Novigrad for refuge. With this lead, Geralt departs Velen to continue his investigation in the bustling city of Novigrad, hoping to pick up Ciri's trail once more.</p>
            </div>
        </div>
    </section>
    <div class="compass-right"></div>
    <section class="scene">
        <img class="line" src="assets/Prologue/line.svg">
        <div class="gallery">
            <div class="card">
                <img src="assets/Chapter1/pic 1.svg" alt="Geralt of Rivia killed the griffin" />
                <p>Geralt of Rivia with Keira Metz</p>
            </div>
            <div class="card">
                <img src="assets/Chapter1/pic 2.svg" alt="Yennefer manage to escape from the Wild Hunt" />
                <p>The Bloody Baron holding his child</p>
            </div>
            <div class="card">
                <img src="assets/Chapter1/pic 3.svg" alt="First look of Ciri's teenage version" />
                <p>Ciri against her enemies</p>
            </div>
        </div>
        <img class="line-re" src="assets/Chapter1/line.svg">
    </section>
    <section class="choices">
        <h2>Choose Phase</h2>
        <div class="choices-box">
            <div class="choice">
                <p class="left">“Go to Kaer Morhen”</p>
                <video controls>
                    <source src="assets/Chapter1/kaer morhen.mp4" type="video/webm" />
                </video>
                <p class="left btm">At Kaer Morhen, Keira saves Lambert from being killed in The Battle of Kaer Morhen quest. It is worth noting that taking the notes from Keira after making the choice to send her to Kaer Morhen, is of no consequence. Also, it is still possible to save Lambert during the battle even if Keira is not present, though Keira's presence guarantees Lambert's survival.</p>
            </div>
            <div class="verti-line"></div>
            <div class="choice">
                <p class="right">"Farewell"</p>
                <video controls>
                    <source src="assets/Chapter1/farewell.mp4" type="video/webm" />
                </video>
                <p class="right btm">Later, Geralt finds out from Triss that Radovid ordered Keira to be captured and then impaled. This triggers the quest A Final Kindness which is otherwise unavailable.</p>
            </div>
        </div>
    </section>
    <footer>
        <p class="end">End of Chapter.</p>
        <a class="backtop" href="#quote-section">Back to Top</a> 
    </footer>
    <div class="bottom-background"></div>
    <script src="Vizima.js"></script>
</body>
</html>
