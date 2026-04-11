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

        <form action="story.php" method="post">
            <h2>Paniek</h2>

            <div class="form-row">
                <label class="required" for="huisdier">Welk dier zou je nooit als huisdier willen?</label>
                <input type="text" name="huisdier" id="huisdier">
            </div>

            <div class="form-row">
                <label class="required" for="persoon">Wie is de belangrijkste persoon in je leven?</label>
                <input type="text" name="persoon" id="persoon">
            </div>

            <div class="form-row">
                <label class="required" for="land">Welk land wil je graag wonen?</label>
                <input type="text" name="land" id="land">
            </div>

            <div class="form-row">
                <label class="required" for="verveel">Wat doe je als je je verveelt?</label>
                <input type="text" name="verveel" id="verveel">
            </div>

            <div class="form-row">
                <label class="required" for="speelgoed">Met welk speelgoed speelde je als kind het meest?</label>
                <input type="text" name="speelgoed" id="speelgoed">
            </div>

            <div class="form-row">
                <label class="required" for="docent">Bij welke docent spijbel je het liefst?</label>
                <input type="text" name="docent" id="docent">
            </div>

            <div class="form-row">
                <label class="required" for="geld">Als je €100.000 had, wat zou je dan kopen?</label>
                <input type="text" name="geld" id="geld">
            </div>

            <div class="form-row">
                <label class="required" for="hobby">Wat is je favoriete bezigheid?</label>
                <input type="text" name="hobby" id="hobby">
            </div>

            <input class="submit-btn" type="submit" value="Submit">
        </form>
    </div>
</body>

</html>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const requiredFields = document.querySelectorAll("input[required]");

    requiredFields.forEach(field => {
        field.addEventListener("invalid", function () {
            this.setCustomValidity("Deze vraag is verplicht");
        });

        field.addEventListener("input", function () {
            this.setCustomValidity("");
        });
    });
});
</script>