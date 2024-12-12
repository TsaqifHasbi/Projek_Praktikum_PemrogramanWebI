
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Region - The Witcher</title>
    <link rel="stylesheet" href="ChooseRegion.css">
</head>
<body>
    <div class="background">
        <img src="../assets/Choose Region/Background.png" alt="The Witcher Background" class="bg-image">
    </div>
    <div class="region-container">
        <h1 class="region-title">WHERE ARE YOU FROM, <span>WITCHER?</span></h1>
        <form method="POST" id="regionForm">
            <div class="region-grid">
                <div class="region-card" onclick="selectRegion('Vizima')">
                    <img src="../assets/Choose Region/Vizima.svg" alt="Vizima">
                    <p>Vizima</p>
                </div>
                <div class="region-card" onclick="selectRegion('Velen')">
                    <img src="../assets/Choose Region/Velen.svg" alt="Velen">
                    <p>Velen</p>
                </div>
                <div class="region-card" onclick="selectRegion('Novigrad')">
                    <img src="../assets/Choose Region/Novigrad.svg" alt="Novigrad">
                    <p>Novigrad</p>
                </div>
                <div class="region-card" onclick="selectRegion('Skellige')">
                    <img src="../assets/Choose Region/Skellige.svg" alt="Skellige">
                    <p>Skellige</p>
                </div>
                <div class="region-card" onclick="selectRegion('Kaer Morhen')">
                    <img src="../assets/Choose Region/Kaer Morhen.svg" alt="Kaer Morhen">
                    <p>Kaer Morhen</p>
                </div>
            </div>
            <input type="hidden" name="region" id="selectedRegion" value="">
        </form>
        <p class="region-quote">"This world doesn't need a hero. It needs a professional."</p>
    </div>

    <script>
        function selectRegion(region) {
            document.getElementById('selectedRegion').value = region;
            const cards = document.querySelectorAll('.region-card');
            cards.forEach(card => card.classList.remove('selected'));
            event.currentTarget.classList.add('selected');

            // Submit form after selecting region
            document.getElementById('regionForm').submit();
        }
    </script>
</body>
</html>