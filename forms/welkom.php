<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welkom</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $naam = $_POST["name"] ?? "";
    $email = $_POST["email"] ?? "";
} else {
    $naam = $_GET["name"] ?? "";
    $email = $_GET["email"] ?? "";
}

$naam = htmlspecialchars($naam, ENT_QUOTES, "UTF-8");
$email = htmlspecialchars($email, ENT_QUOTES, "UTF-8");

echo "<h1>De ingevulde gegevens zijn:</h1>";
echo "Naam: " . $naam . "<br>";
echo "Email: " . $email . "<br>";
?>

</body>
</html>