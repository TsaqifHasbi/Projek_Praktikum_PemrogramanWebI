<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: Sign-in.php");
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Witcher: Chapter III</title>
    <link rel="stylesheet" href="KaerMorhen.css">
    <link rel="shotcut icon" href="../assets/Sign Up/Logo.svg">
</head>
<body>
    <header>
        <div class="header-content">
            <img src="../assets/Prologue/LOGO.svg" alt="The Witcher Logo" class="logo">
            <button class="profile">
                <img class="region" src="../assets/Choose Region/Kaer Morhen.svg" alt="">
                <div class="welcome">
                    <p>Welcome,</p> 
                    <p class="user"><?php echo htmlspecialchars($username); ?></p>
                </div>
            </button>
        </div>
    </header>

    <section id="quote-section">
        <img src="../assets/Chapter4/Geralt.svg" alt="Vesemir" class="icon">
        <div class="quote">
            <p class="qt">"We fight. We survive. And we make sure that monsters like them don't take what's ours."</p>
            <span class="qt-who">- GERALT OF RIVIA</span>
            <p class="quote-desc">At this moment, Geralt is rallying his companions, emphasizing the need to fight and protect what's important to them, especially Ciri. Despite the overwhelming threat, Geralt's words reflect his determination and the witchers' resolve to survive and defend their home from the Wild Hunt's destructive force. It's a reminder of their mission to protect what they hold dear, no matter the odds.</p>
        </div>
    </section>

    <section class="prologue">
        <h1 class="judul">Chapter IV</h1> 
        <h3 class="subjudul">Kaer Morhen</h3>
        <div class="content">
            <div class="img">
                <img src="../assets/Chapter4/pic 0.svg" alt="Prologue Scene">
            </div>
            <div class="text">
                <p class="para1">Geralt arrives at Kaer Morhen to find Yennefer leading efforts to lift the curse on Uma, with the help of Eskel, Lambert, and Vesemir. Yennefer's plan involves subjecting Uma to the initial stages of the Trial of the Grasses, a dangerous and painful procedure long abandoned by the witchers. Despite their doubts, her method succeeds, and Uma's true identity is revealed as Avallac'h, an elf with a history with Geralt. Avallac'h reveals that Ciri is hidden on the Isle of Mists and warns that removing her will alert the Wild Hunt, who seek her Elder Blood to open a permanent gate between worlds.</p>
                <p class="para2">With this revelation, Kaer Morhen prepares for a siege as the Wild Hunt closes in. Geralt has the opportunity to travel the world and recruit allies for the battle, provided he has made the right choices and forged strong relationships. Allies like Zoltan, Triss, Dijkstra, the an Craites, Vernon Roche, Keira Metz, Ermion, and even Letho can join the defense. The stage is set for a climactic confrontation, with Kaer Morhen serving as the battleground for their stand against the Wild Hunt.</p>
            </div>
        </div>
    </section>

    <section class="events-section">
        <img class="dots3" src="../assets/Chapter4/3 dot.svg">
        <div class="events">
            <div class="event">
                <h3>Reunion on the Isle of Mists</h3>
                <p>Guided by a magical light from Avallac'h, Geralt navigates the mists of the Isle of Mists and finds a group of stranded dwarves, who lead him to Ciri. Initially appearing lifeless, Ciri is revived by the light, reuniting with Geralt. She explains her journey, revealing how Avallac'h taught her to control her Elder Blood and hid her from Eredin, the King of the Wild Hunt, who seeks her powers to save his dying world. Ciri recounts her escape to Velen, her encounters with the Bloody Baron and the Crones, her desperate search for Geralt and Yennefer, and the challenges she faced in Novigrad and Skellige. She also speaks of haunting dreams about Geralt, Yennefer, and a mysterious tower.</p>
            </div>
            <div class="event">
                <h3>The Battle of Kaer Morhen</h3>
                <p>With little time to prepare, Geralt, Ciri, and their allies brace for the Wild Hunt's assault at Kaer Morhen. Traps are set, potions brewed, and spells cast as the defenders face overwhelming odds. When Eredin arrives with the White Frost and his lieutenants, Imlerith and Caranthir, the battle becomes a desperate struggle. Vesemir fights valiantly but is captured by Imlerith. To protect Ciri, Vesemir sacrifices himself in a final attack, triggering Ciri's uncontrollable magical rage. Her outburst forces the Wild Hunt to retreat but leaves the group devastated by Vesemir's death.</p>
            </div>
            <div class="event">
                <h3>Aftermath and Resolve</h3>
                <p>At Vesemir's funeral, the allies honor his legacy as one of the Continent’s greatest witchers. Ciri, overcome with guilt, blames herself for his death but finds new resolve. Determined to stop running and face the Wild Hunt, she takes Vesemir’s medallion from the funeral pyre, marking her decision to fight back. This moment becomes a turning point for Ciri, setting the stage for the final confrontation with Eredin and the Wild Hunt.</p>
            </div>
        </div>
    </section>
    <div class="bg-compas"></div>
    <section class="scene">
        <img class="dots3" src="../assets/Chapter4/line.svg">
        <div class="gallery">
            <div class="card">
                <img src="../assets/Chapter4/pic 1.svg" alt="Geralt of Rivia killed the griffin" />
                <p>Geralt of RIvia talks to Ciri</p>
            </div>
            <div class="card">
                <img src="../assets/Chapter4/pic 2.svg" alt="Yennefer manage to escape from the Wild Hunt" />
                <p>Ciri's uncontrollable magical rage</p>
            </div>
            <div class="card">
                <img src="../assets/Chapter4/pic 3.svg" alt="First look of Ciri's teenage version" />
                <p>Geralt of Rivia fighting against Eredin Bréacc Glas</p>
            </div>
        </div>
        <img class="dots3re" src="../assets/Chapter4
        /line.svg">
    </section>
    <section class="choices">
        <h2>Choose Phase</h2>
        <div class="choices-box">
            <div class="choice">
                <p class="left">“Calm down”</p>
                <video controls>
                    <source src="../assets/Chapter4/calm down.mp4" type="video/webm" />
                    Browsermu tidak mendukung tag ini, upgrade donk!
                </video>
                <p class="left btm">This will weaken Ciri's resolve, earning a negative mark towards her ending.</p>
            </div>
            <div class="verti-line"></div>
            <div class="choice">
                <p class="right">"Go for it"</p>
                <video controls>
                    <source src="../assets/Chapter4/go for it.mp4" type="video/webm" />
                    Browsermu tidak mendukung tag ini, upgrade donk!
                </video>
                <p class="right btm">Geralt and Ciri will have fun wrecking the place, strengthening Ciri's resolve. This will count as a positive mark towards her ending.</p>
            </div>
        </div>
    </section>
    <footer>
        <p class="end">End of Chapter.</p>
        <a class="backtop" href="#quote-section">Back to Top</a> 
    </footer>
    <div class="bottom-background"></div>
    <script src="KaerMorhen.js"></script>
</body>
</html>
