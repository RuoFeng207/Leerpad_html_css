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
    $wens = $persoon = $getal = $voorwerp = $positieve_eigenschap = $negatieve_eigenschap = $vervelendste = $hobby = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $wens = htmlspecialchars($_POST["wens"]);
        $persoon = htmlspecialchars($_POST["persoon"]);
        $getal = htmlspecialchars($_POST["getal"]);
        $voorwerp = htmlspecialchars($_POST["voorwerp"]);
        $positieve_eigenschap = htmlspecialchars($_POST["positieve_eigenschap"]);
        $negatieve_eigenschap = htmlspecialchars($_POST["negatieve_eigenschap"]);
        $vervelendste = htmlspecialchars($_POST["vervelendste"]);
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
                <h2>Onkunde</h2>

                <p>
                    Er zijn veel mensen die niet kunnen <strong><?= $wens ?></strong>. Neem nou <strong><?= $persoon ?></strong>. Zelfs met de hulp
                    van een <strong><?= $voorwerp ?></strong> of zelfs <strong><?= $getal ?></strong> kan <strong><?= $persoon ?></strong> niet <strong><?= $wens ?></strong>. Dat heeft niet te maken met
                    een gebrek aan <strong><?= $positieve_eigenschap ?></strong>, maar met een te veel aan <strong><?= $negatieve_eigenschap ?></strong>. Te veel <strong><?= $negatieve_eigenschap ?></strong>
                    leidt tot <strong><?= $vervelendste ?></strong> en dat is niet goed als je wilt <strong><?= $wens ?></strong>. Helaas voor <strong><?= $persoon ?></strong>.
                </p>
            <?php } else { ?>
                <form action="" method="post">

                    <h2>Onkunde</h2>

                    <div class="form-row">
                        <label class="required" for="wens">Wat zou je graag willen kunnen?</label>
                        <input type="text" name="wens" id="wens" required>
                    </div>

                    <div class="form-row">
                        <label class="required" for="persoon">Met welke persoon kun je goed opschieten?</label>
                        <input type="text" name="persoon" id="persoon" required>
                    </div>

                    <div class="form-row">
                        <label class="required" for="getal">Wat is je favoriete getal?</label>
                        <input type="text" name="getal" id="getal" required>
                    </div>

                    <div class="form-row">
                        <label class="required" for="voorwerp">Wat heb je altijd bij je als je op vakantie gaat?</label>
                        <input type="text" name="voorwerp" id="voorwerp" required>
                    </div>

                    <div class="form-row">
                        <label class="required" for="positieve_eigenschap">Wat is je beste persoonlijke eigenschap?</label>
                        <input type="text" name="positieve_eigenschap" id="positieve_eigenschap" required>
                    </div>

                    <div class="form-row">
                        <label class="required" for="negatieve_eigenschap">Wat is je slechtste persoonlijke eigenschap?</label>
                        <input type="text" name="negatieve_eigenschap" id="negatieve_eigenschap" required>
                    </div>

                    <div class="form-row">
                        <label class="required" for="vervelendste">Wat is het ergste dat je kan overkomen?</label>
                        <input type="text" name="vervelendste" id="vervelendste" required>
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