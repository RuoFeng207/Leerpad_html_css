<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="forms.css">
    <title>paniekerige onkunde</title>
</head>

<body>
    <?php
    $huisdier = $persoon = $land = $verveel = $speelgoed = $docent = $geld = $hobby = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $huisdier = htmlspecialchars($_POST["huisdier"]);
        $persoon = htmlspecialchars($_POST["persoon"]);
        $land = htmlspecialchars($_POST["land"]);
        $verveel = htmlspecialchars($_POST["verveel"]);
        $speelgoed = htmlspecialchars($_POST["speelgoed"]);
        $docent = htmlspecialchars($_POST["docent"]);
        $geld = htmlspecialchars($_POST["geld"]);
        $hobby = htmlspecialchars($_POST["hobby"]);
    }
    ?>

    <div class="container">
        <h1>Mad Libs</h1>
        <nav>
            <a href="paniek.php">Paniek</a>
            <a href="onkunde.php">Onkunde</a>
        </nav>

        <div class="content">

            <?php if ($_SERVER["REQUEST_METHOD"] === "POST") { ?>
                <h2>Er heerst paniek...</h2>

                <p>
                    Er heerst paniek in het koninkrijk <strong><?= $land ?></strong>. Koning <strong><?= $docent ?></strong> is ten einde raad en als koning
                    <strong><?= $docent ?></strong> ten einde raad is, dan roept hij zijn ten-einde-raadsheer <strong><?= $persoon ?></strong>.

                    "<strong><?= $persoon ?></strong>! Het is een ramp! Het is een schande!"
                    "Sire, Majesteit, Uwe Luidruchtigheid, wat is er aan de hand?"
                    "Mijn <strong><?= $huisdier ?></strong> is verdwenen! Zo maar, zonder waarschuwing. En ik had net <strong><?= $speelgoed ?></strong> voor hem
                    gekocht!"

                    "Majesteit, uw <strong><?= $huisdier ?></strong> komt vast vanzelf weer terug?"
                    "Ja, da's leuk en aardig, maar hoe moet ik in de tussentijd <strong><?= $hobby ?></strong> leren?"
                    "Maar Sire, daar kunt u toch uw <strong><?= $geld ?></strong> voor gebruiken."
                    "<strong><?= $persoon ?></strong>, je hebt helemaal gelijk! Wat zou ik doen als ik jou niet had."
                    "Mij <strong><?= $verveel ?></strong>, Sire."
                </p>

            <?php } else { ?>
                <form action="" method="post">

                    <h2>Paniek</h2>

                    <div class="form-row">
                        <label class="required" for="huisdier">Welk dier zou je nooit als huisdier willen?</label>
                        <input type="text" name="huisdier" id="huisdier" required>
                    </div>

                    <div class="form-row">
                        <label class="required" for="persoon">Wie is de belangrijkste persoon in je leven?</label>
                        <input type="text" name="persoon" id="persoon" required>
                    </div>

                    <div class="form-row">
                        <label class="required" for="land">Welk land wil je graag wonen?</label>
                        <input type="text" name="land" id="land" required>
                    </div>

                    <div class="form-row">
                        <label class="required" for="verveel">Wat doe je als je je verveelt?</label>
                        <input type="text" name="verveel" id="verveel" required>
                    </div>

                    <div class="form-row">
                        <label class="required" for="speelgoed">Met welk speelgoed speelde je als kind het meest?</label>
                        <input type="text" name="speelgoed" id="speelgoed" required>
                    </div>

                    <div class="form-row">
                        <label class="required" for="docent">Bij welke docent spijbel je het liefst?</label>
                        <input type="text" name="docent" id="docent" required>
                    </div>

                    <div class="form-row">
                        <label class="required" for="geld">Als je €100.000 had, wat zou je dan kopen?</label>
                        <input type="text" name="geld" id="geld" required>
                    </div>

                    <div class="form-row">
                        <label class="required" for="hobby">Wat is je favoriete bezigheid?</label>
                        <input type="text" name="hobby" id="hobby" required>
                    </div>

                    <input class="submit-btn" type="submit" value="Submit">

                </form>

            <?php } ?>
        </div>
        <footer>
            © gemaakt door Ruo Feng Somers 2026
        </footer>
    </div>
</body>


</html>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        const inputs = document.querySelectorAll("input[required]");

        inputs.forEach(input => {

            input.addEventListener("invalid", function() {
                this.setCustomValidity("Deze vraag is verplicht");
            });

            input.addEventListener("input", function() {
                this.setCustomValidity("");
            });

        });

    });
</script>